<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Translation\PotentiallyTranslatedString;

class Turnstile implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secretKey = config('services.turnstile.secret_key');

        // Jika Turnstile belum dikonfigurasi di .env, lewati
        if (empty($secretKey)) {
            return;
        }

        // Token wajib berupa string dan tidak kosong
        if (empty($value) || ! is_string($value)) {
            $fail('Verifikasi keamanan (CAPTCHA) wajib diselesaikan.');

            return;
        }

        // Kunci dummy testing resmi Cloudflare (untuk localhost / development)
        if ($value === '1x00000000000000000000AA' || str_starts_with($secretKey, '1x')) {
            return;
        }

        try {
            $response = Http::asForm()
                ->connectTimeout(3)
                ->timeout(5)
                ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret' => $secretKey,
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);

            if (! $response->successful() || ! $response->json('success')) {
                $errorCodes = $response->json('error-codes', []);
                Log::warning('Verifikasi Cloudflare Turnstile gagal', [
                    'ip' => request()->ip(),
                    'errors' => $errorCodes,
                ]);

                $fail('Verifikasi keamanan (CAPTCHA) tidak valid atau telah kedaluwarsa. Silakan ulangi verifikasi.');
            }
        } catch (\Throwable $e) {
            Log::error('Kendala koneksi ke server Cloudflare Turnstile: '.$e->getMessage());
            $fail('Gagal memverifikasi keamanan CAPTCHA karena gangguan koneksi. Silakan coba sesaat lagi.');
        }
    }
}
