<?php

namespace App\Services;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramNotificationService
{
    /**
     * Kirim notifikasi pendaftaran santri baru ke chat atau grup Telegram admin.
     */
    public function sendPendaftaranBaru(Pendaftaran $pendaftaran): bool
    {
        $botToken = (string) config('services.telegram.bot_token');
        $chatId = (string) config('services.telegram.chat_id');

        if ($botToken === '' || $chatId === '') {
            return false;
        }

        try {
            $response = Http::connectTimeout(3)
                ->timeout(5)
                ->post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                    'chat_id' => $chatId,
                    'text' => $this->formatPendaftaranBaruMessage($pendaftaran),
                    'parse_mode' => 'HTML',
                    'link_preview_options' => [
                        'is_disabled' => true,
                    ],
                ]);

            if (! $response->successful() || ! $response->json('ok', false)) {
                Log::warning('Notifikasi Telegram pendaftaran gagal dikirim.', [
                    'registration_number' => $pendaftaran->registration_number,
                    'status' => $response->status(),
                    'description' => $response->json('description'),
                ]);

                return false;
            }

            return true;
        } catch (\Throwable $e) {
            Log::error('Gagal menghubungi API Telegram untuk notifikasi pendaftaran.', [
                'registration_number' => $pendaftaran->registration_number,
                'error' => str_replace($botToken, '***', $e->getMessage()),
            ]);

            return false;
        }
    }

    /**
     * Format pesan HTML ringkasan pendaftaran santri baru untuk Telegram.
     */
    private function formatPendaftaranBaruMessage(Pendaftaran $pendaftaran): string
    {
        $tanggalLahir = $pendaftaran->tanggal_lahir?->format('d/m/Y') ?? '-';
        $noHpSantri = filled($pendaftaran->no_hp_santri)
            ? $this->formatPhoneWithWhatsAppLink((string) $pendaftaran->no_hp_santri)
            : '-';

        $lines = [
            '🕌 <b>Pendaftaran Santri Baru Masuk</b>',
            '',
            '<b>No. Registrasi:</b> <code>'.e($pendaftaran->registration_number).'</code>',
            '<b>Jenjang:</b> '.e($pendaftaran->jenjang),
            '<b>Nama Santri:</b> '.e($pendaftaran->nama_santri),
            '<b>Jenis Kelamin:</b> '.e($pendaftaran->jenis_kelamin),
            '<b>TTL:</b> '.e($pendaftaran->tempat_lahir).', '.e($tanggalLahir),
            '<b>Asal Sekolah:</b> '.e($pendaftaran->asal_sekolah),
            '<b>Tinggal Bersama:</b> '.e($pendaftaran->tinggal_bersama),
            '<b>Alamat:</b> '.e($pendaftaran->alamat_lengkap),
            '<b>Email:</b> '.e($pendaftaran->email),
            '<b>No. HP Santri:</b> '.$noHpSantri,
            '',
            '👨‍👩‍👦 <b>Data Orang Tua</b>',
            '<b>Ayah:</b> '.e($pendaftaran->nama_ayah).' ('.e($pendaftaran->pekerjaan_ayah).' | '.e($pendaftaran->penghasilan_ayah).')',
            '<b>HP/WA Ayah:</b> '.$this->formatPhoneWithWhatsAppLink($pendaftaran->no_hp_ayah),
            '<b>Ibu:</b> '.e($pendaftaran->nama_ibu).' ('.e($pendaftaran->pekerjaan_ibu).' | '.e($pendaftaran->penghasilan_ibu).')',
            '<b>HP/WA Ibu:</b> '.$this->formatPhoneWithWhatsAppLink($pendaftaran->no_hp_ibu),
            '',
            '📎 <b>Berkas:</b> Pas Foto, KK, dan Raport telah diunggah.',
            '🔗 <a href="'.e(route('admin.pendaftaran.index')).'">Buka Panel Admin PSB</a>',
        ];

        return implode("\n", $lines);
    }

    /**
     * Format nomor telepon disertai tautan langsung ke WhatsApp.
     */
    private function formatPhoneWithWhatsAppLink(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone) ?? '';

        if ($digits === '' || strlen($digits) < 9) {
            return e($phone);
        }

        if (str_starts_with($digits, '0')) {
            $digits = '62'.substr($digits, 1);
        } elseif (str_starts_with($digits, '8')) {
            $digits = '62'.$digits;
        }

        return e($phone).' (<a href="https://wa.me/'.$digits.'">Chat WA</a>)';
    }
}
