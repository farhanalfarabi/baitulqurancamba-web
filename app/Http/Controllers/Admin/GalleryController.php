<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Tampilkan halaman manajemen galeri di panel admin.
     */
    public function index(Request $request): View|JsonResponse
    {
        $selectedYear = $request->query('year', 'all');

        $query = Gallery::query();

        if ($selectedYear !== 'all' && is_numeric($selectedYear)) {
            $query->where('year', (int) $selectedYear);
        }

        $photos = $query
            ->orderBy('year', 'desc')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $allYears = Gallery::query()
            ->select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        // Pastikan tahun sekarang dan tahun depan ada di opsi jika galeri masih baru
        $currentYear = (int) date('Y');
        if (! in_array($currentYear, $allYears, true)) {
            array_unshift($allYears, $currentYear);
            rsort($allYears);
        }

        $stats = [
            'total' => Gallery::count(),
            'per_year' => Gallery::query()
                ->selectRaw('year, count(*) as count')
                ->groupBy('year')
                ->pluck('count', 'year')
                ->toArray(),
        ];

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $photos,
                'years' => $allYears,
                'selected_year' => $selectedYear,
                'stats' => $stats,
            ]);
        }

        return view('admin.gallery.index', [
            'photos' => $photos,
            'years' => $allYears,
            'selectedYear' => $selectedYear,
            'stats' => $stats,
        ]);
    }

    /**
     * Simpan foto baru (mendukung single upload maupun multiple upload).
     */
    public function store(Request $request): JsonResponse
    {
        $currentYear = (int) date('Y');

        $request->validate([
            'year' => ['required', 'integer', 'min:2000', 'max:'.($currentYear + 2)],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:10240'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['image', 'mimes:jpeg,png,jpg,webp,gif', 'max:10240'],
        ]);

        $year = (int) $request->input('year', $currentYear);

        $uploadedPhotos = [];

        // 1. Tangani upload banyak foto sekaligus (multiple)
        if ($request->hasFile('photos')) {
            /** @var array<UploadedFile> $files */
            $files = $request->file('photos');
            foreach ($files as $file) {
                $path = $this->processAndStoreImage($file);
                $gallery = Gallery::create([
                    'image_path' => $path,
                    'year' => $year,
                    'sort_order' => 0,
                ]);
                $uploadedPhotos[] = $gallery;
            }
        }

        // 2. Tangani upload single foto
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $this->processAndStoreImage($file);
            $gallery = Gallery::create([
                'image_path' => $path,
                'year' => $year,
                'sort_order' => 0,
            ]);
            $uploadedPhotos[] = $gallery;
        }

        if (empty($uploadedPhotos)) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan pilih setidaknya satu file foto untuk diunggah.',
            ], 422);
        }

        $count = count($uploadedPhotos);
        $message = $count > 1
            ? "Berhasil mengunggah {$count} foto untuk tahun {$year}."
            : "Foto berhasil diunggah untuk tahun {$year}.";

        return response()->json([
            'success' => true,
            'message' => $message,
            'count' => $count,
            'data' => $uploadedPhotos,
            'total_count' => Gallery::count(),
        ], 201);
    }

    /**
     * Perbarui foto yang ada (ganti file atau ubah tahun/keterangan).
     */
    public function update(Request $request, int|string $id): JsonResponse
    {
        $gallery = Gallery::findOrFail($id);

        $currentYear = (int) date('Y');

        $validated = $request->validate([
            'year' => ['nullable', 'integer', 'min:2000', 'max:'.($currentYear + 2)],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:10240'],
        ]);

        if (isset($validated['year'])) {
            $gallery->year = (int) $validated['year'];
        }

        // Jika ada pergantian file foto
        if ($request->hasFile('photo')) {
            // Hapus file lama jika tersimpan di disk public storage
            if (str_starts_with($gallery->image_path, '/storage/')) {
                $oldRelative = str_replace('/storage/', '', $gallery->image_path);
                Storage::disk('public')->delete($oldRelative);
            }

            $gallery->image_path = $this->processAndStoreImage($request->file('photo'));
        }

        $gallery->save();

        return response()->json([
            'success' => true,
            'message' => 'Foto galeri berhasil diperbarui.',
            'data' => $gallery,
        ]);
    }

    /**
     * Hapus foto dari galeri.
     */
    public function destroy(int|string $id): JsonResponse
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus file fisik jika tersimpan di storage/public
        if (str_starts_with($gallery->image_path, '/storage/')) {
            $oldRelative = str_replace('/storage/', '', $gallery->image_path);
            Storage::disk('public')->delete($oldRelative);
        }

        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Foto telah berhasil dihapus dari galeri.',
            'total_count' => Gallery::count(),
        ]);
    }

    /**
     * Kompres, resize (jika perlu), dan konversi file foto ke format WebP sebelum disimpan.
     */
    protected function processAndStoreImage(UploadedFile $file): string
    {
        $filename = Str::random(40).'.webp';
        $destinationPath = 'gallery/'.$filename;

        // Jika GD dan fungsi imagewebp tersedia, lakukan konversi dan kompresi otomatis
        if (function_exists('imagewebp') && function_exists('imagecreatefromstring')) {
            try {
                $fileContent = file_get_contents($file->getRealPath());
                $image = @imagecreatefromstring($fileContent);

                if ($image !== false) {
                    // 1. Periksa dan tangani rotasi orientasi EXIF (dari kamera smartphone)
                    if (function_exists('exif_read_data')) {
                        $exif = @exif_read_data($file->getRealPath());
                        if (! empty($exif['Orientation'])) {
                            switch ($exif['Orientation']) {
                                case 3:
                                    $image = imagerotate($image, 180, 0);
                                    break;
                                case 6:
                                    $image = imagerotate($image, -90, 0);
                                    break;
                                case 8:
                                    $image = imagerotate($image, 90, 0);
                                    break;
                            }
                        }
                    }

                    $origWidth = imagesx($image);
                    $origHeight = imagesy($image);
                    $maxDimension = 1920;

                    // 2. Resize proporsional jika resolusi melebihi batas Full HD (1920px)
                    if ($origWidth > $maxDimension || $origHeight > $maxDimension) {
                        if ($origWidth >= $origHeight) {
                            $targetWidth = $maxDimension;
                            $targetHeight = (int) round(($origHeight / $origWidth) * $maxDimension);
                        } else {
                            $targetHeight = $maxDimension;
                            $targetWidth = (int) round(($origWidth / $origHeight) * $maxDimension);
                        }

                        $targetCanvas = imagecreatetruecolor($targetWidth, $targetHeight);
                        imagealphablending($targetCanvas, false);
                        imagesavealpha($targetCanvas, true);

                        imagecopyresampled(
                            $targetCanvas,
                            $image,
                            0, 0, 0, 0,
                            $targetWidth, $targetHeight,
                            $origWidth, $origHeight
                        );

                        ob_start();
                        imagewebp($targetCanvas, null, 82);
                        $webpData = ob_get_clean();

                        imagedestroy($targetCanvas);
                        imagedestroy($image);
                    } else {
                        // Langsung konversi ke WebP kualitas 82%
                        imagealphablending($image, false);
                        imagesavealpha($image, true);

                        ob_start();
                        imagewebp($image, null, 82);
                        $webpData = ob_get_clean();

                        imagedestroy($image);
                    }

                    if (! empty($webpData)) {
                        Storage::disk('public')->put($destinationPath, $webpData);

                        return '/storage/'.$destinationPath;
                    }
                }
            } catch (\Throwable $e) {
                // Fallback aman jika terjadi kegagalan pemrosesan gambar
            }
        }

        // Fallback standar jika ekstensi GD tidak tersedia
        return '/storage/'.$file->store('gallery', 'public');
    }
}
