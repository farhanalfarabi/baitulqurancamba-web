<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePendaftaranRequest;
use App\Mail\BuktiPendaftaranMail;
use App\Models\Pendaftaran;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PendaftaranController extends Controller
{
    /**
     * Tampilkan formulir pendaftaran santri baru.
     */
    public function index(): View
    {
        return view('pendaftaran');
    }

    /**
     * Simpan data pendaftaran santri baru beserta berkas dokumen dan kirim email bukti pendaftaran.
     */
    public function store(StorePendaftaranRequest $request): JsonResponse|RedirectResponse
    {
        try {
            $validated = $request->validated();

            $pendaftaran = DB::transaction(function () use ($request, $validated) {
                // 1. Simpan berkas dokumen ke storage/app/public/pendaftaran
                $pasFotoPath = $request->file('file_pas_foto')->store('pendaftaran/pas_foto', 'public');
                $kkPath = $request->file('file_kk')->store('pendaftaran/kk', 'public');
                $raportPath = $request->file('file_raport')->store('pendaftaran/raport', 'public');

                // 2. Generate Nomor Registrasi Unik (contoh: PSB-2027-001)
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

                $registrationNumber = sprintf('%s%03d', $prefix, $nextSequence);

                // 3. Simpan ke database
                return Pendaftaran::create([
                    'registration_number' => $registrationNumber,
                    'jenjang' => $validated['jenjang'],
                    'nama_santri' => $validated['santri_nama'],
                    'jenis_kelamin' => $validated['santri_gender'],
                    'tempat_lahir' => $validated['santri_tempat_lahir'],
                    'tanggal_lahir' => $validated['santri_tanggal_lahir'],
                    'alamat_lengkap' => $validated['santri_alamat'],
                    'asal_sekolah' => $validated['santri_asal_sekolah'],
                    'email' => $validated['santri_email'],
                    'no_hp_santri' => $validated['santri_hp'] ?? null,
                    'tinggal_bersama' => $validated['santri_tinggal_bersama'],
                    'pas_foto_path' => $pasFotoPath,
                    'foto_kk_path' => $kkPath,
                    'foto_raport_path' => $raportPath,
                    'nama_ayah' => $validated['ayah_nama'],
                    'no_hp_ayah' => $validated['ayah_hp'],
                    'pekerjaan_ayah' => $validated['ayah_pekerjaan'],
                    'penghasilan_ayah' => $validated['ayah_penghasilan'],
                    'nama_ibu' => $validated['ibu_nama'],
                    'no_hp_ibu' => $validated['ibu_hp'],
                    'pekerjaan_ibu' => $validated['ibu_pekerjaan'],
                    'penghasilan_ibu' => $validated['ibu_penghasilan'],
                    'status' => 'pending',
                ]);
            });

            // 4. Kirim email bukti pendaftaran resmi ke email pendaftar
            try {
                Mail::to($pendaftaran->email)->send(new BuktiPendaftaranMail($pendaftaran));
            } catch (\Throwable $mailError) {
                Log::warning('Email bukti pendaftaran gagal terkirim ke '.$pendaftaran->email.': '.$mailError->getMessage());
            }

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Alhamdulillah, formulir pendaftaran calon santri baru berhasil disimpan. Bukti pendaftaran telah dikirim ke email Anda.',
                    'registration_number' => $pendaftaran->registration_number,
                    'data' => [
                        'nama_santri' => $pendaftaran->nama_santri,
                        'jenjang' => $pendaftaran->jenjang,
                        'jenis_kelamin' => $pendaftaran->jenis_kelamin,
                        'tempat_lahir' => $pendaftaran->tempat_lahir,
                        'tanggal_lahir' => $pendaftaran->tanggal_lahir?->format('d/m/Y') ?? (string) $pendaftaran->tanggal_lahir,
                        'asal_sekolah' => $pendaftaran->asal_sekolah,
                        'email' => $pendaftaran->email,
                        'no_hp_ayah' => $pendaftaran->no_hp_ayah,
                        'no_hp_ibu' => $pendaftaran->no_hp_ibu,
                    ],
                ]);
            }

            return redirect()->route('pendaftaran')->with(
                'success',
                "Alhamdulillah, formulir pendaftaran santri baru berhasil terkirim. Nomor Registrasi Anda: {$pendaftaran->registration_number}. Bukti pendaftaran telah dikirim ke email {$pendaftaran->email}."
            );
        } catch (\Throwable $e) {
            Log::error('Gagal menyimpan pendaftaran santri: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kendala teknis saat memproses pendaftaran. Silakan coba beberapa saat lagi atau hubungi panitia via WhatsApp.',
                ], 500);
            }

            return back()->withInput()->with('error', 'Terjadi kendala saat memproses pendaftaran. Silakan coba kembali.');
        }
    }
}
