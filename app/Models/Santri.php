<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Santri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'umur' => 'integer',
    ];

    /**
     * Relasi ke pendaftaran (jika santri berasal dari jalur pendaftaran online).
     */
    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    /**
     * Bootstrap the model and its events.
     */
    protected static function booted(): void
    {
        static::saving(function (Santri $santri) {
            if ($santri->tanggal_lahir) {
                $santri->umur = Carbon::parse($santri->tanggal_lahir)->age;
            } else {
                $santri->umur = null;
            }
        });
    }
}
