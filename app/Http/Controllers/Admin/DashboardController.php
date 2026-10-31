<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Pendaftaran;
use App\Models\Santri;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DashboardController extends Controller
{
    /**
     * Display the admin portal main dashboard.
     */
    public function index(): View
    {
        $totalPendaftar = Pendaftaran::count();
        $pendaftarPending = Pendaftaran::where('status', 'pending')->count();
        $pendaftarVerified = Pendaftaran::where('status', 'terverifikasi')->count();
        $pendaftarAccepted = Pendaftaran::where('status', 'diterima')->count();

        // Ambil 6 pendaftaran terbaru
        $recentRegistrations = Pendaftaran::latest()->take(6)->get();

        // Statistik agregat
        $stats = [
            'total_pendaftar' => $totalPendaftar,
            'pendaftar_pending' => $pendaftarPending,
            'pendaftar_verified' => $pendaftarVerified,
            'pendaftar_accepted' => $pendaftarAccepted,
            'santri_aktif' => 148,
            'santri_mts' => 84,
            'santri_ma' => 64,
            'santri_wustha' => 84,
            'santri_ulya' => 64,
            'dewan_guru' => Guru::count(),
            'guru_tahfizh' => Guru::where('kategori', 'tahfizh')->count(),
            'guru_formal' => Guru::where('kategori', 'formal')->count(),
            'total_galeri' => 32,
            'galeri_coverflow' => 6,
            'kapasitas_asrama_persen' => 84,
            'asrama_terisi' => 151,
            'asrama_total' => 180,
            'rata_hafalan_juz' => 15.2,
        ];

        // Highlight galeri yang aktif di halaman depan
        $homepageGalleries = [
            [
                'title' => 'Halaqah Fajar Al-Qur\'an',
                'category' => 'Tahfizh 30 Juz',
                'image' => '/assets/images/pondok/halaqah-tahfidz.webp',
                'status' => 'Aktif di Beranda',
                'date' => 'Oktober 2026',
            ],
            [
                'title' => 'Latihan Pidato Tiga Bahasa (Muhadharah)',
                'category' => 'Kepemimpinan & Bahasa',
                'image' => '/assets/images/pondok/pidato-3-bahasa.webp',
                'status' => 'Aktif di Beranda',
                'date' => 'September 2026',
            ],
            [
                'title' => 'Kajian Kitab Kuning & Fiqih Turats',
                'category' => 'Dirasah Islamiyah',
                'image' => '/assets/images/pondok/taklim-kitab-kuning.webp',
                'status' => 'Aktif di Beranda',
                'date' => 'Agustus 2026',
            ],
            [
                'title' => 'Pembinaan Karakter & Kepemimpinan Santri',
                'category' => 'Karakter & Disiplin',
                'image' => '/assets/images/pondok/leadership.webp',
                'status' => 'Aktif di Beranda',
                'date' => 'Juli 2026',
            ],
        ];

        return view('admin.dashboard', compact('stats', 'recentRegistrations', 'homepageGalleries'));
    }

    /**
     * Halaman manajemen pendaftaran (placeholder / daftar santri baru).
     */
    public function pendaftaranIndex(): View
    {
        $pendaftarans = Pendaftaran::latest()->paginate(10);
        $totalPutra = Pendaftaran::where('jenis_kelamin', 'Putra')->count();
        $totalPutri = Pendaftaran::where('jenis_kelamin', 'Putri')->count();
        $totalPending = Pendaftaran::where('status', 'pending')->count();

        return view('admin.pendaftaran.index', compact('pendaftarans', 'totalPutra', 'totalPutri', 'totalPending'));
    }

    /**
     * Simpan data pendaftaran baru secara manual dari admin.
     */
    public function pendaftaranStore(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama_santri' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'in:Putra,Putri'],
            'jenjang' => ['required', 'string', 'in:Wustho,Ulya'],
            'tempat_lahir' => ['nullable', 'string', 'max:100'],
            'tanggal_lahir' => ['nullable', 'date'],
            'alamat_lengkap' => ['nullable', 'string'],
            'asal_sekolah' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'no_hp_santri' => ['nullable', 'string', 'max:30'],
            'tinggal_bersama' => ['nullable', 'string', 'max:100'],
            'nama_ayah' => ['required', 'string', 'max:255'],
            'no_hp_ayah' => ['required', 'string', 'max:30'],
            'pekerjaan_ayah' => ['nullable', 'string', 'max:100'],
            'penghasilan_ayah' => ['nullable', 'string', 'max:100'],
            'nama_ibu' => ['nullable', 'string', 'max:255'],
            'no_hp_ibu' => ['nullable', 'string', 'max:30'],
            'pekerjaan_ibu' => ['nullable', 'string', 'max:100'],
            'penghasilan_ibu' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'string', 'in:pending,terverifikasi,diterima,berkas_belum_lengkap'],
            'pas_foto' => ['nullable', 'file', 'mimes:jpeg,png,jpg', 'max:5120'],
            'foto_kk' => ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:10240'],
            'foto_raport' => ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:10240'],
        ]);

        if ($request->hasFile('pas_foto')) {
            $validated['pas_foto_path'] = $request->file('pas_foto')->store('pendaftaran/pas_foto', 'public');
        }
        if ($request->hasFile('foto_kk')) {
            $validated['foto_kk_path'] = $request->file('foto_kk')->store('pendaftaran/kk', 'public');
        }
        if ($request->hasFile('foto_raport')) {
            $validated['foto_raport_path'] = $request->file('foto_raport')->store('pendaftaran/raport', 'public');
        }

        $academicYear = 2027;
        $prefix = "PSB-{$academicYear}-";
        $lastRegistration = Pendaftaran::where('registration_number', 'LIKE', "{$prefix}%")
            ->lockForUpdate()
            ->orderByDesc('id')
            ->first();

        $nextSequence = 1;
        if ($lastRegistration && preg_match('/PSB-\d{4}-(\d+)/', $lastRegistration->registration_number, $matches)) {
            $nextSequence = ((int) $matches[1]) + 1;
        }

        $validated['registration_number'] = sprintf('%s%03d', $prefix, $nextSequence);
        $validated['status'] = $validated['status'] ?? 'pending';

        $pendaftaran = Pendaftaran::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data pendaftaran calon santri berhasil ditambahkan.',
            'data' => $pendaftaran,
        ], 201);
    }

    /**
     * Update data pendaftaran calon santri.
     */
    public function pendaftaranUpdate(Request $request, int|string $id): JsonResponse
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $validated = $request->validate([
            'nama_santri' => ['sometimes', 'required', 'string', 'max:255'],
            'jenis_kelamin' => ['sometimes', 'required', 'string', 'in:Putra,Putri'],
            'jenjang' => ['sometimes', 'required', 'string', 'max:100'],
            'tempat_lahir' => ['nullable', 'string', 'max:100'],
            'tanggal_lahir' => ['nullable', 'date'],
            'alamat_lengkap' => ['nullable', 'string'],
            'asal_sekolah' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'no_hp_santri' => ['nullable', 'string', 'max:30'],
            'tinggal_bersama' => ['nullable', 'string', 'max:100'],
            'nama_ayah' => ['nullable', 'string', 'max:255'],
            'no_hp_ayah' => ['nullable', 'string', 'max:30'],
            'pekerjaan_ayah' => ['nullable', 'string', 'max:100'],
            'penghasilan_ayah' => ['nullable', 'string', 'max:100'],
            'nama_ibu' => ['nullable', 'string', 'max:255'],
            'no_hp_ibu' => ['nullable', 'string', 'max:30'],
            'pekerjaan_ibu' => ['nullable', 'string', 'max:100'],
            'penghasilan_ibu' => ['nullable', 'string', 'max:100'],
            'status' => ['sometimes', 'required', 'string', 'in:pending,terverifikasi,diterima,berkas_belum_lengkap'],
            'pas_foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'foto_kk' => ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'],
            'foto_raport' => ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'],
        ]);

        if ($request->hasFile('pas_foto')) {
            $validated['pas_foto_path'] = $request->file('pas_foto')->store('pendaftaran', 'public');
        }
        if ($request->hasFile('foto_kk')) {
            $validated['foto_kk_path'] = $request->file('foto_kk')->store('pendaftaran', 'public');
        }
        if ($request->hasFile('foto_raport')) {
            $validated['foto_raport_path'] = $request->file('foto_raport')->store('pendaftaran', 'public');
        }

        $pendaftaran->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data pendaftaran calon santri berhasil diperbarui.',
            'data' => $pendaftaran,
        ]);
    }

    /**
     * Hapus data pendaftaran calon santri.
     */
    public function pendaftaranDestroy(int|string $id): JsonResponse
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pendaftaran calon santri berhasil dihapus.',
        ]);
    }

    /**
     * Ekspor data pendaftaran calon santri ke format CSV (Excel compatible).
     */
    public function pendaftaranExport(): StreamedResponse
    {
        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');
            fwrite($handle, "\xEF\xBB\xBF");
            fputcsv($handle, [
                'No',
                'No Registrasi',
                'Nama Calon Santri',
                'Jenis Kelamin',
                'Jenjang',
                'Email',
                'No HP Santri',
                'Tempat Lahir',
                'Tanggal Lahir',
                'Umur',
                'Alamat Lengkap',
                'Asal Sekolah',
                'Tinggal Bersama',
                'Nama Ayah',
                'No WA Ayah',
                'Pekerjaan Ayah',
                'Penghasilan Ayah',
                'Nama Ibu',
                'No WA Ibu',
                'Pekerjaan Ibu',
                'Penghasilan Ibu',
                'Status Pendaftaran',
                'Waktu Mendaftar',
            ]);

            $no = 1;
            Pendaftaran::latest()->chunk(200, function ($pendaftarans) use ($handle, &$no) {
                foreach ($pendaftarans as $p) {
                    fputcsv($handle, [
                        $no++,
                        $p->registration_number,
                        $p->nama_santri,
                        $p->jenis_kelamin,
                        $p->jenjang,
                        $p->email ?? '-',
                        $p->no_hp_santri ?? '-',
                        $p->tempat_lahir ?? '-',
                        $p->tanggal_lahir ? $p->tanggal_lahir->format('d/m/Y') : '-',
                        $p->umur !== null ? $p->umur.' Tahun' : ($p->tanggal_lahir ? $p->tanggal_lahir->age.' Tahun' : '-'),
                        $p->umur !== null ? $p->umur.' Tahun' : ($p->tanggal_lahir ? $p->tanggal_lahir->age.' Tahun' : '-'),
                        $p->alamat_lengkap ?? '-',
                        $p->asal_sekolah ?? '-',
                        $p->tinggal_bersama ?? '-',
                        $p->nama_ayah ?? '-',
                        $p->no_hp_ayah ?? '-',
                        $p->pekerjaan_ayah ?? '-',
                        $p->penghasilan_ayah ?? '-',
                        $p->nama_ibu ?? '-',
                        $p->no_hp_ibu ?? '-',
                        $p->pekerjaan_ibu ?? '-',
                        $p->penghasilan_ibu ?? '-',
                        $p->status,
                        $p->created_at ? $p->created_at->format('d/m/Y H:i') : '-',
                    ]);
                }
            });

            fclose($handle);
        }, 'rekap_pendaftaran_santri_psb_'.date('Ymd_His').'.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /**
     * Halaman data santri.
     */
    public function santriIndex(Request $request): View|JsonResponse
    {
        return app(SantriController::class)->index($request);
    }

    /**
     * Halaman data guru & asatidz.
     */
    public function guruIndex(Request $request): View|JsonResponse
    {
        return app(GuruController::class)->index($request);
    }

    /**
     * Halaman pengelolaan galeri.
     */
    public function galleryIndex(Request $request)
    {
        return app(GalleryController::class)->index($request);
    }
}
