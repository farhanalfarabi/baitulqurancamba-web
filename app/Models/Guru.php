<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'boolean',
        'tahun_bergabung' => 'integer',
    ];

    protected $appends = [
        'kategori_label',
        'initials',
    ];

    /**
     * Label representatif untuk kategori keilmuan.
     */
    public function getKategoriLabelAttribute(): string
    {
        return match (strtolower((string) $this->kategori)) {
            'tahfizh' => "Tahfizh Al-Qur'an",
            'diniyah' => 'Dirasah Islamiyah & Kitab',
            'formal' => 'Pendidikan Formal & Sains',
            'pengasuhan' => 'Tahfizh & Pengasuhan',
            default => ucwords((string) $this->kategori),
        };
    }

    /**
     * Inisial nama untuk avatar kartu.
     */
    public function getInitialsAttribute(): string
    {
        $cleanName = trim(preg_replace('/^(Ust\.|Ustadzah|Drs\.|Dr\.|H\.|Hj\.)\s+/i', '', (string) $this->nama));
        $words = preg_split('/\s+/', $cleanName);

        if (! empty($words) && count($words) > 1) {
            return strtoupper(substr($words[0], 0, 1).substr($words[1], 0, 1));
        }

        return strtoupper(substr($cleanName, 0, 2));
    }

    /**
     * Scope guru aktif.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope berdasarkan jenis kelamin / panggilan.
     */
    public function scopeGender(Builder $query, ?string $gender): Builder
    {
        if (! $gender || $gender === 'all') {
            return $query;
        }

        return $query->where('jenis_kelamin', $gender);
    }

    /**
     * Scope berdasarkan kategori keilmuan.
     */
    public function scopeKategori(Builder $query, ?string $kategori): Builder
    {
        if (! $kategori || $kategori === 'all') {
            return $query;
        }

        return $query->where('kategori', $kategori);
    }

    /**
     * Scope filter pencarian teks.
     */
    public function scopeSearch(Builder $query, ?string $keyword): Builder
    {
        if (! $keyword) {
            return $query;
        }

        return $query->where(function (Builder $q) use ($keyword) {
            $q->where('nama', 'like', "%{$keyword}%")
                ->orWhere('jabatan', 'like', "%{$keyword}%")
                ->orWhere('spesialisasi', 'like', "%{$keyword}%")
                ->orWhere('almamater', 'like', "%{$keyword}%")
                ->orWhere('tanggung_jawab', 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%");
        });
    }
}
