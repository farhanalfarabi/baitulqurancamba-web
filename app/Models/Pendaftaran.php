<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'umur' => 'integer',
    ];

    /**
     * Bootstrap the model and its events.
     */
    protected static function booted(): void
    {
        static::saving(function (Pendaftaran $pendaftaran) {
            if ($pendaftaran->tanggal_lahir) {
                $pendaftaran->umur = Carbon::parse($pendaftaran->tanggal_lahir)->age;
            } else {
                $pendaftaran->umur = null;
            }
        });
    }
}
