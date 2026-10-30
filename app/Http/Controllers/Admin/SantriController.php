<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SantriController extends Controller
{
    /**
     * Tampilkan halaman data induk santri mukim.
     */
    public function index(Request $request): View|JsonResponse
    {
        $santris = Santri::latest()->paginate(10);
        $totalSantri = Santri::count();
        $totalPutra = Santri::where('jenis_kelamin', 'Putra')->count();
        $totalPutri = Santri::where('jenis_kelamin', 'Putri')->count();
        $totalAktif = Santri::where('status_santri', 'aktif')->count();
        $totalIzin = Santri::where('status_santri', 'izin')->count();
        $totalAlumni = Santri::where('status_santri', 'alumni')->count();
        $totalKeluar = Santri::where('status_santri', 'keluar')->count();

        $stats = [
            'total_santri' => $totalSantri,
            'santri_putra' => $totalPutra,
            'santri_putri' => $totalPutri,
            'santri_aktif' => $totalAktif,
            'santri_izin' => $totalIzin,
            'santri_alumni' => $totalAlumni,
            'santri_keluar' => $totalKeluar,
        ];

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $santris,
                'stats' => $stats,
            ]);
        }

        return view('admin.santri.index', compact(
            'santris',
            'stats',
            'totalSantri',
            'totalPutra',
            'totalPutri',
            'totalAktif',
            'totalIzin',
            'totalAlumni',
            'totalKeluar'
        ));
    }

    /**
     * Simpan data santri baru secara manual dari admin.
     */
    public function store(Request $request): JsonResponse
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
            'status_santri' => ['nullable', 'string', 'in:aktif,izin,alumni,keluar'],
            'pas_foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'foto_kk' => ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'],
            'foto_raport' => ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'],
        ]);

        $year = date('Y');
        $nextNumber = (Santri::max('id') ?? 0) + 1;
        $validated['registration_number'] = 'STR-'.$year.'-'.str_pad((string) $nextNumber, 3, '0', STR_PAD_LEFT);
        $validated['status_santri'] = $validated['status_santri'] ?? 'aktif';

        if ($request->hasFile('pas_foto')) {
            $validated['pas_foto_path'] = $request->file('pas_foto')->store('santri', 'public');
        }
        if ($request->hasFile('foto_kk')) {
            $validated['foto_kk_path'] = $request->file('foto_kk')->store('santri', 'public');
        }
        if ($request->hasFile('foto_raport')) {
            $validated['foto_raport_path'] = $request->file('foto_raport')->store('santri', 'public');
        }

        $santri = Santri::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data santri berhasil ditambahkan.',
            'data' => $santri,
        ], 201);
    }

    /**
     * Perbarui data santri mukim.
     */
    public function update(Request $request, int|string $id): JsonResponse
    {
        $santri = Santri::findOrFail($id);

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
            'status_santri' => ['sometimes', 'required', 'string', 'in:aktif,izin,alumni,keluar'],
            'pas_foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'foto_kk' => ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'],
            'foto_raport' => ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'],
        ]);

        if ($request->hasFile('pas_foto')) {
            $validated['pas_foto_path'] = $request->file('pas_foto')->store('santri', 'public');
        }
        if ($request->hasFile('foto_kk')) {
            $validated['foto_kk_path'] = $request->file('foto_kk')->store('santri', 'public');
        }
        if ($request->hasFile('foto_raport')) {
            $validated['foto_raport_path'] = $request->file('foto_raport')->store('santri', 'public');
        }

        $santri->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data santri berhasil diperbarui.',
            'data' => $santri,
        ]);
    }

    /**
     * Hapus data santri mukim.
     */
    public function destroy(int|string $id): JsonResponse
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data santri berhasil dihapus.',
        ]);
    }

    /**
     * Ekspor data santri ke format CSV (Excel compatible).
     */
    public function export(): StreamedResponse
    {
        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');
            fwrite($handle, "\xEF\xBB\xBF");
            fputcsv($handle, [
                'No',
                'No Registrasi / Induk',
                'Nama Santri',
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
                'Status Keaktifan Santri',
                'Waktu Terdaftar',
            ]);

            $no = 1;
            Santri::latest()->chunk(200, function ($santris) use ($handle, &$no) {
                foreach ($santris as $s) {
                    $statusLabel = match ($s->status_santri) {
                        'aktif' => 'Aktif',
                        'izin' => 'Izin',
                        'alumni' => 'Alumni / Lulus',
                        'keluar' => 'Non-Aktif / Keluar',
                        default => ucfirst($s->status_santri ?? 'Aktif'),
                    };

                    fputcsv($handle, [
                        $no++,
                        $s->registration_number,
                        $s->nama_santri,
                        $s->jenis_kelamin,
                        $s->jenjang,
                        $s->email ?? '-',
                        $s->no_hp_santri ?? '-',
                        $s->tempat_lahir ?? '-',
                        $s->tanggal_lahir ? $s->tanggal_lahir->format('d/m/Y') : '-',
                        $s->umur !== null ? $s->umur.' Tahun' : ($s->tanggal_lahir ? $s->tanggal_lahir->age.' Tahun' : '-'),
                        $s->alamat_lengkap ?? '-',
                        $s->asal_sekolah ?? '-',
                        $s->tinggal_bersama ?? '-',
                        $s->nama_ayah ?? '-',
                        $s->no_hp_ayah ?? '-',
                        $s->pekerjaan_ayah ?? '-',
                        $s->penghasilan_ayah ?? '-',
                        $s->nama_ibu ?? '-',
                        $s->no_hp_ibu ?? '-',
                        $s->pekerjaan_ibu ?? '-',
                        $s->penghasilan_ibu ?? '-',
                        $statusLabel,
                        $s->created_at ? $s->created_at->format('d/m/Y H:i') : '-',
                    ]);
                }
            });

            fclose($handle);
        }, 'rekap_data_santri_pondok_camba_'.date('Ymd_His').'.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
