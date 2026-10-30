<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
            'caption' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:10240'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['image', 'mimes:jpeg,png,jpg,webp,gif', 'max:10240'],
        ]);

        $year = (int) $request->input('year', $currentYear);
        $caption = $request->input('caption');

        $uploadedPhotos = [];

        // 1. Tangani upload banyak foto sekaligus (multiple)
        if ($request->hasFile('photos')) {
            /** @var array<UploadedFile> $files */
            $files = $request->file('photos');
            foreach ($files as $file) {
                $path = '/storage/'.$file->store('gallery', 'public');
                $gallery = Gallery::create([
                    'image_path' => $path,
                    'year' => $year,
                    'caption' => $caption,
                    'sort_order' => 0,
                ]);
                $uploadedPhotos[] = $gallery;
            }
        }

        // 2. Tangani upload single foto
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = '/storage/'.$file->store('gallery', 'public');
            $gallery = Gallery::create([
                'image_path' => $path,
                'year' => $year,
                'caption' => $caption,
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
            'caption' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:10240'],
        ]);

        if (isset($validated['year'])) {
            $gallery->year = (int) $validated['year'];
        }

        if (array_key_exists('caption', $validated)) {
            $gallery->caption = $validated['caption'];
        }

        // Jika ada pergantian file foto
        if ($request->hasFile('photo')) {
            // Hapus file lama jika tersimpan di disk public storage
            if (str_starts_with($gallery->image_path, '/storage/')) {
                $oldRelative = str_replace('/storage/', '', $gallery->image_path);
                Storage::disk('public')->delete($oldRelative);
            }

            $gallery->image_path = '/storage/'.$request->file('photo')->store('gallery', 'public');
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
}
