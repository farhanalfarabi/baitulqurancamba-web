<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('pendaftaran', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip())->response(function (Request $request, array $headers) {
                $seconds = $headers['Retry-After'] ?? 60;

                if ($request->expectsJson() || $request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Terlalu banyak permintaan pendaftaran dari perangkat Anda. Mohon tunggu '.$seconds.' detik sebelum mencoba kembali.',
                    ], 429, $headers);
                }

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Terlalu banyak permintaan pendaftaran. Mohon tunggu '.$seconds.' detik.');
            });
        });
    }
}
