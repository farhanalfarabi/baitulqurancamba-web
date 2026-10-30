<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'umur' => 'integer',
    ];

    /**
     * Relasi ke data santri (jika calon santri telah diterima).
     */
    public function santri(): HasOne
    {
        return $this->hasOne(Santri::class);
    }

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

        static::saved(function (Pendaftaran $pendaftaran) {
            if ($pendaftaran->status === 'diterima') {
                $existingSantri = Santri::where('pendaftaran_id', $pendaftaran->id)->first();
                $statusSantri = $existingSantri ? $existingSantri->status_santri : 'aktif';

                Santri::updateOrCreate(
                    ['pendaftaran_id' => $pendaftaran->id],
                    [
                        'registration_number' => $pendaftaran->registration_number,
                        'jenjang' => $pendaftaran->jenjang,
                        'nama_santri' => $pendaftaran->nama_santri,
                        'jenis_kelamin' => $pendaftaran->jenis_kelamin,
                        'tempat_lahir' => $pendaftaran->tempat_lahir,
                        'tanggal_lahir' => $pendaftaran->tanggal_lahir,
                        'umur' => $pendaftaran->umur,
                        'alamat_lengkap' => $pendaftaran->alamat_lengkap,
                        'asal_sekolah' => $pendaftaran->asal_sekolah,
                        'email' => $pendaftaran->email,
                        'no_hp_santri' => $pendaftaran->no_hp_santri,
                        'tinggal_bersama' => $pendaftaran->tinggal_bersama,
                        'pas_foto_path' => $pendaftaran->pas_foto_path,
                        'foto_kk_path' => $pendaftaran->foto_kk_path,
                        'foto_raport_path' => $pendaftaran->foto_raport_path,
                        'nama_ayah' => $pendaftaran->nama_ayah,
                        'no_hp_ayah' => $pendaftaran->no_hp_ayah,
                        'pekerjaan_ayah' => $pendaftaran->pekerjaan_ayah,
                        'penghasilan_ayah' => $pendaftaran->penghasilan_ayah,
                        'nama_ibu' => $pendaftaran->nama_ibu,
                        'no_hp_ibu' => $pendaftaran->no_hp_ibu,
                        'pekerjaan_ibu' => $pendaftaran->pekerjaan_ibu,
                        'penghasilan_ibu' => $pendaftaran->penghasilan_ibu,
                        'status_santri' => $statusSantri,
                    ]
                );
            } else {
                // Jika status diubah keluar dari 'diterima', batalkan data santri
                Santri::where('pendaftaran_id', $pendaftaran->id)->delete();
            }
        });

        static::deleted(function (Pendaftaran $pendaftaran) {
            Santri::where('pendaftaran_id', $pendaftaran->id)->delete();
        });
    }
}
