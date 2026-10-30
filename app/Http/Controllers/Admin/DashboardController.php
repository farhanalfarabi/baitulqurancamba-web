<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Pendaftaran;
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
                'image' => '/assets/images/pondok/halaqah-tahfidz.jpg',
                'status' => 'Aktif di Beranda',
                'date' => 'Oktober 2026',
            ],
            [
                'title' => 'Latihan Pidato Tiga Bahasa (Muhadharah)',
                'category' => 'Kepemimpinan & Bahasa',
                'image' => '/assets/images/pondok/pidato-3-bahasa.jpg',
                'status' => 'Aktif di Beranda',
                'date' => 'September 2026',
            ],
            [
                'title' => 'Kajian Kitab Kuning & Fiqih Turats',
                'category' => 'Dirasah Islamiyah',
                'image' => '/assets/images/pondok/taklim-kitab-kuning.jpg',
                'status' => 'Aktif di Beranda',
                'date' => 'Agustus 2026',
            ],
            [
                'title' => 'Pembinaan Tarbiyah Santri Mandiri',
                'category' => 'Karakter & Disiplin',
                'image' => '/assets/images/pondok/tarbiah.jpg',
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
            'jenjang' => ['required', 'string', 'in:MTs,MA'],
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
        ]);

        $year = date('Y');
        $nextNumber = (Pendaftaran::max('id') ?? 0) + 1;
        $validated['registration_number'] = 'PSB-'.($year + 1).'-'.str_pad((string) $nextNumber, 3, '0', STR_PAD_LEFT);
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
    public function santriIndex(): View
    {
        $sampleSantris = [
            (object) [
                'id' => 1,
                'nis' => '2024.08.012',
                'nisn' => '0081234567',
                'nama_santri' => 'Abdullah Dzaki M.',
                'jenis_kelamin' => 'Putra',
                'jenjang' => 'Wustha (SMP)',
                'kelas' => 'Kelas 8',
                'kamar_asrama' => 'Kamar Umar bin Khattab',
                'capaian_hafalan' => '18 Juz Mutqin',
                'halaqah_tahfizh' => 'Ust. Syahrir, S.Pd.I',
                'tempat_lahir' => 'Makassar',
                'tanggal_lahir' => '2012-05-14',
                'alamat_lengkap' => 'Jl. Poros Maros-Camba KM 12, Kel. Cempaniga, Kec. Camba, Kab. Maros',
                'asal_sekolah' => 'SDIT Al-Fityan Gowa',
                'no_hp_santri' => '081234567891',
                'tinggal_bersama' => 'Asrama Pondok',
                'foto_kk_path' => 'dokumen/kk_dzaki.pdf',
                'foto_raport_path' => 'dokumen/raport_dzaki.pdf',
                'nama_ayah' => 'H. Muhammad Arifin',
                'no_hp_ayah' => '08114422331',
                'pekerjaan_ayah' => 'Wiraswasta Perdagangan',
                'penghasilan_ayah' => 'Rp 5.000.000 ke atas',
                'nama_ibu' => 'Hj. Nur Asma, S.Pd.',
                'no_hp_ibu' => '08114422332',
                'pekerjaan_ibu' => 'Guru Madrasah',
                'penghasilan_ibu' => 'Rp 3.000.000 - Rp 4.000.000',
                'status_santri' => 'aktif',
                'tahun_masuk' => 2024,
            ],
            (object) [
                'id' => 2,
                'nis' => '2023.07.004',
                'nisn' => '0078912345',
                'nama_santri' => 'Fariq Al-Mubarak',
                'jenis_kelamin' => 'Putra',
                'jenjang' => 'Ulya (SMA)',
                'kelas' => 'Kelas 11',
                'kamar_asrama' => 'Kamar Abu Bakar Ash-Shiddiq',
                'capaian_hafalan' => '30 Juz (Khatam Bersanad)',
                'halaqah_tahfizh' => 'Ust. Syahrir, S.Pd.I',
                'tempat_lahir' => 'Maros',
                'tanggal_lahir' => '2009-08-20',
                'alamat_lengkap' => 'Kec. Camba, Kab. Maros, Sulawesi Selatan',
                'asal_sekolah' => 'SMP Negeri 1 Camba',
                'no_hp_santri' => '085299887766',
                'tinggal_bersama' => 'Asrama Pondok',
                'foto_kk_path' => 'dokumen/kk_raihan.pdf',
                'foto_raport_path' => 'dokumen/raport_raihan.pdf',
                'nama_ayah' => 'H. Mansyur Bahar',
                'no_hp_ayah' => '085211223344',
                'pekerjaan_ayah' => 'PNS / ASN Kemenag',
                'penghasilan_ayah' => 'Rp 4.000.000 - Rp 5.000.000',
                'nama_ibu' => 'Hj. Sitti Maryam',
                'no_hp_ibu' => '085211223345',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'penghasilan_ibu' => 'Rp 1.000.000 - Rp 2.000.000',
                'status_santri' => 'aktif',
                'tahun_masuk' => 2023,
            ],
            (object) [
                'id' => 3,
                'nis' => '2025.08.031',
                'nisn' => '0091234567',
                'nama_santri' => 'Hasan Al-Banna',
                'jenis_kelamin' => 'Putra',
                'jenjang' => 'Wustha (SMP)',
                'kelas' => 'Kelas 7',
                'kamar_asrama' => 'Kamar Utsman bin Affan',
                'capaian_hafalan' => '7 Juz Mutqin',
                'halaqah_tahfizh' => 'Ust. Mansyur, Lc.',
                'tempat_lahir' => 'Gowa',
                'tanggal_lahir' => '2013-11-05',
                'alamat_lengkap' => 'Jl. Sultan Hasanuddin No. 45, Sungguminasa, Somba Opu, Gowa',
                'asal_sekolah' => 'MI Al-Ikhlas Gowa',
                'no_hp_santri' => '082155443322',
                'tinggal_bersama' => 'Asrama Pondok',
                'foto_kk_path' => 'dokumen/kk_hasan.pdf',
                'foto_raport_path' => 'dokumen/raport_hasan.pdf',
                'nama_ayah' => 'Drs. H. Bachtiar',
                'no_hp_ayah' => '081233445566',
                'pekerjaan_ayah' => 'Dosen UIN Alauddin',
                'penghasilan_ayah' => 'Rp 5.000.000 ke atas',
                'nama_ibu' => 'Dra. Hj. Fatimah',
                'no_hp_ibu' => '081233445567',
                'pekerjaan_ibu' => 'PNS Dinas Pendidikan',
                'penghasilan_ibu' => 'Rp 4.000.000 - Rp 5.000.000',
                'status_santri' => 'aktif',
                'tahun_masuk' => 2025,
            ],
            (object) [
                'id' => 4,
                'nis' => '2024.08.088',
                'nisn' => '0085566778',
                'nama_santri' => 'Aisyah Putri Humaira',
                'jenis_kelamin' => 'Putri',
                'jenjang' => 'Wustha (SMP)',
                'kelas' => 'Kelas 8',
                'kamar_asrama' => 'Asrama Khadijah (Kampus 2 Putri)',
                'capaian_hafalan' => '14 Juz Mutqin',
                'halaqah_tahfizh' => 'Ustadzah Nurjannah, S.Th.I',
                'tempat_lahir' => 'Makassar',
                'tanggal_lahir' => '2012-07-15',
                'alamat_lengkap' => 'Komp. Antang Permai Blok C No. 12, Manggala, Makassar',
                'asal_sekolah' => 'SDIT Wahdah Islamiyah 01',
                'no_hp_santri' => '082188776655',
                'tinggal_bersama' => 'Asrama Pondok',
                'foto_kk_path' => 'dokumen/kk_aisyah.pdf',
                'foto_raport_path' => 'dokumen/raport_aisyah.pdf',
                'nama_ayah' => 'Ir. Muhammad Ridwan',
                'no_hp_ayah' => '082199881122',
                'pekerjaan_ayah' => 'Konsultan Pertanian',
                'penghasilan_ayah' => 'Rp 5.000.000 ke atas',
                'nama_ibu' => 'dr. Nurlaila, Sp.A',
                'no_hp_ibu' => '082199881123',
                'pekerjaan_ibu' => 'Dokter Spesialis Anak',
                'penghasilan_ibu' => 'Rp 5.000.000 ke atas',
                'status_santri' => 'aktif',
                'tahun_masuk' => 2024,
            ],
            (object) [
                'id' => 5,
                'nis' => '2023.07.019',
                'nisn' => '0071122334',
                'nama_santri' => 'Maryam Az-Zahra',
                'jenis_kelamin' => 'Putri',
                'jenjang' => 'Ulya (SMA)',
                'kelas' => 'Kelas 12 (Alumni)',
                'kamar_asrama' => 'Asrama Aisyah (Kampus 2 Putri)',
                'capaian_hafalan' => '30 Juz (Khatam Bersanad)',
                'halaqah_tahfizh' => 'Ustadzah Nurjannah, S.Th.I',
                'tempat_lahir' => 'Bone',
                'tanggal_lahir' => '2008-04-10',
                'alamat_lengkap' => 'Jl. Ahmad Yani No. 10, Tanete Riattang, Watampone, Bone',
                'asal_sekolah' => 'MTs Negeri 1 Bone',
                'no_hp_santri' => '085311224455',
                'tinggal_bersama' => 'Asrama Pondok',
                'foto_kk_path' => 'dokumen/kk_maryam.pdf',
                'foto_raport_path' => 'dokumen/raport_maryam.pdf',
                'nama_ayah' => 'H. Syamsuddin',
                'no_hp_ayah' => '085233669900',
                'pekerjaan_ayah' => 'Pedagang Hasil Bumi',
                'penghasilan_ayah' => 'Rp 5.000.000 ke atas',
                'nama_ibu' => 'Hj. Sitti Halimah',
                'no_hp_ibu' => '085233669901',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'penghasilan_ibu' => 'Rp 2.000.000 - Rp 3.000.000',
                'status_santri' => 'alumni',
                'tahun_masuk' => 2023,
            ],
            (object) [
                'id' => 6,
                'nis' => '2024.08.045',
                'nisn' => '0089988771',
                'nama_santri' => 'Muhammad Farhan Kamil',
                'jenis_kelamin' => 'Putra',
                'jenjang' => 'Wustha (SMP)',
                'kelas' => 'Kelas 8',
                'kamar_asrama' => 'Kamar Ali bin Abi Thalib',
                'capaian_hafalan' => '11 Juz Mutqin',
                'halaqah_tahfizh' => 'Ust. Syahrir, S.Pd.I',
                'tempat_lahir' => 'Maros',
                'tanggal_lahir' => '2012-03-25',
                'alamat_lengkap' => 'Desa Samangki, Kec. Simbang, Kab. Maros',
                'asal_sekolah' => 'SD Inpres Samangki',
                'no_hp_santri' => '085799112233',
                'tinggal_bersama' => 'Orang Tua (Izin Cuti Medis)',
                'foto_kk_path' => 'dokumen/kk_farhan.pdf',
                'foto_raport_path' => 'dokumen/raport_farhan.pdf',
                'nama_ayah' => 'Usman Jaya',
                'no_hp_ayah' => '085244556677',
                'pekerjaan_ayah' => 'Petani Modern',
                'penghasilan_ayah' => 'Rp 3.000.000 - Rp 4.000.000',
                'nama_ibu' => 'Hasnah',
                'no_hp_ibu' => '085244556678',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'penghasilan_ibu' => 'Rp 1.000.000 - Rp 2.000.000',
                'status_santri' => 'cuti',
                'tahun_masuk' => 2024,
            ],
            (object) [
                'id' => 7,
                'nis' => '2023.07.032',
                'nisn' => '0076655443',
                'nama_santri' => 'Zaid Abdul Malik',
                'jenis_kelamin' => 'Putra',
                'jenjang' => 'Ulya (SMA)',
                'kelas' => 'Kelas 11',
                'kamar_asrama' => 'Kamar Abu Bakar Ash-Shiddiq',
                'capaian_hafalan' => '20 Juz Mutqin',
                'halaqah_tahfizh' => 'Ust. Mansyur, Lc.',
                'tempat_lahir' => 'Barru',
                'tanggal_lahir' => '2009-12-01',
                'alamat_lengkap' => 'Jl. Poros Parepare-Makassar, Tanete Rilau, Barru',
                'asal_sekolah' => 'SMP Negeri 2 Barru',
                'no_hp_santri' => '081399887711',
                'tinggal_bersama' => 'Asrama Pondok',
                'foto_kk_path' => 'dokumen/kk_zaid.pdf',
                'foto_raport_path' => 'dokumen/raport_zaid.pdf',
                'nama_ayah' => 'H. Abdul Malik, S.Ag.',
                'no_hp_ayah' => '081244558899',
                'pekerjaan_ayah' => 'Guru PAI Kemenag',
                'penghasilan_ayah' => 'Rp 4.000.000 - Rp 5.000.000',
                'nama_ibu' => 'Hj. Aminah',
                'no_hp_ibu' => '081244558898',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'penghasilan_ibu' => 'Rp 1.000.000 - Rp 2.000.000',
                'status_santri' => 'aktif',
                'tahun_masuk' => 2023,
            ],
            (object) [
                'id' => 8,
                'nis' => '2025.08.092',
                'nisn' => '0097788991',
                'nama_santri' => 'Khadijah Al-Kubro',
                'jenis_kelamin' => 'Putri',
                'jenjang' => 'Wustha (SMP)',
                'kelas' => 'Kelas 7',
                'kamar_asrama' => 'Asrama Hafshah (Kampus 2 Putri)',
                'capaian_hafalan' => '6 Juz Mutqin',
                'halaqah_tahfizh' => 'Ustadzah Nurjannah, S.Th.I',
                'tempat_lahir' => 'Pangkep',
                'tanggal_lahir' => '2013-09-18',
                'alamat_lengkap' => 'Komp. Perumahan Tonasa 1, Bungoro, Kab. Pangkep',
                'asal_sekolah' => 'SD Semen Tonasa 1',
                'no_hp_santri' => '085211993344',
                'tinggal_bersama' => 'Asrama Pondok',
                'foto_kk_path' => 'dokumen/kk_khadijah.pdf',
                'foto_raport_path' => 'dokumen/raport_khadijah.pdf',
                'nama_ayah' => 'Ir. Hamzah Tahir',
                'no_hp_ayah' => '081377889900',
                'pekerjaan_ayah' => 'Karyawan Semen Tonasa',
                'penghasilan_ayah' => 'Rp 5.000.000 ke atas',
                'nama_ibu' => 'Nurhaedah, S.Pd.',
                'no_hp_ibu' => '081377889901',
                'pekerjaan_ibu' => 'Guru SMPN 1 Bungoro',
                'penghasilan_ibu' => 'Rp 3.000.000 - Rp 4.000.000',
                'status_santri' => 'aktif',
                'tahun_masuk' => 2025,
            ],
            (object) [
                'id' => 9,
                'nis' => '2024.08.067',
                'nisn' => '0082233445',
                'nama_santri' => 'Salman Al-Farisi',
                'jenis_kelamin' => 'Putra',
                'jenjang' => 'Tahfizh Khusus',
                'kelas' => 'Program Mulazamah 30 Juz',
                'kamar_asrama' => 'Kamar Umar bin Khattab',
                'capaian_hafalan' => '25 Juz Mutqin',
                'halaqah_tahfizh' => 'Ust. Syahrir, S.Pd.I',
                'tempat_lahir' => 'Sinjai',
                'tanggal_lahir' => '2010-06-11',
                'alamat_lengkap' => 'Jl. Persatuan Raya, Biringere, Sinjai Utara, Sinjai',
                'asal_sekolah' => 'Pesantren Darul Huffazh Sinjai',
                'no_hp_santri' => '082255667788',
                'tinggal_bersama' => 'Asrama Pondok',
                'foto_kk_path' => 'dokumen/kk_salman.pdf',
                'foto_raport_path' => 'dokumen/raport_salman.pdf',
                'nama_ayah' => 'H. Muhammad Ilyas',
                'no_hp_ayah' => '082188442211',
                'pekerjaan_ayah' => 'Tokoh Agama / Pengusaha',
                'penghasilan_ayah' => 'Rp 5.000.000 ke atas',
                'nama_ibu' => 'Hj. Sitti Rahmah',
                'no_hp_ibu' => '082188442212',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'penghasilan_ibu' => 'Rp 2.000.000 - Rp 3.000.000',
                'status_santri' => 'aktif',
                'tahun_masuk' => 2024,
            ],
            (object) [
                'id' => 10,
                'nis' => '2023.07.051',
                'nisn' => '0073344556',
                'nama_santri' => 'Reyhan Pratama',
                'jenis_kelamin' => 'Putra',
                'jenjang' => 'Wustha (SMP)',
                'kelas' => 'Kelas 9 (Mutasi)',
                'kamar_asrama' => 'Kamar Ali bin Abi Thalib',
                'capaian_hafalan' => '10 Juz Mutqin',
                'halaqah_tahfizh' => 'Ust. Mansyur, Lc.',
                'tempat_lahir' => 'Makassar',
                'tanggal_lahir' => '2011-01-30',
                'alamat_lengkap' => 'Jl. Hertasning Baru No. 88, Rappocini, Makassar',
                'asal_sekolah' => 'SD Islam Athirah Makassar',
                'no_hp_santri' => '081299001122',
                'tinggal_bersama' => 'Orang Tua (Pindah Tugas Jakarta)',
                'foto_kk_path' => 'dokumen/kk_reyhan.pdf',
                'foto_raport_path' => 'dokumen/raport_reyhan.pdf',
                'nama_ayah' => 'Hendra Pratama, S.E.',
                'no_hp_ayah' => '081277665544',
                'pekerjaan_ayah' => 'Karyawan Bank Swasta',
                'penghasilan_ayah' => 'Rp 5.000.000 ke atas',
                'nama_ibu' => 'Maya Sartika, S.E.',
                'no_hp_ibu' => '081277665545',
                'pekerjaan_ibu' => 'Wiraswasta Kuliner',
                'penghasilan_ibu' => 'Rp 4.000.000 - Rp 5.000.000',
                'status_santri' => 'mutasi',
                'tahun_masuk' => 2023,
            ],
        ];

        $santriStats = [
            'total_santri' => 148,
            'santri_aktif' => 142,
            'santri_putra' => 88,
            'santri_putri' => 54,
            'santri_wustha' => 84,
            'santri_ulya' => 58,
            'santri_tahfizh_khusus' => 6,
            'santri_alumni' => 4,
            'santri_cuti' => 1,
            'santri_mutasi' => 1,
        ];

        return view('admin.santri.index', [
            'santris' => collect($sampleSantris),
            'stats' => $santriStats,
        ]);
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
