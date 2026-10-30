<?php

namespace Tests\Feature;

use App\Mail\BuktiPendaftaranMail;
use App\Models\Pendaftaran;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PendaftaranTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_pendaftaran_dapat_diakses(): void
    {
        $response = $this->get(route('pendaftaran'));

        $response->assertStatus(200);
        $response->assertSee('Formulir Pendaftaran');
        $response->assertSee('MTs');
        $response->assertSee('MA');
        $response->assertSee('Email Aktif');
        $response->assertSee('Pas Foto Santri');
    }

    public function test_calon_santri_dapat_mendaftar_jenjang_mts_dan_email_terkirim(): void
    {
        Storage::fake('public');
        Mail::fake();

        $payload = [
            'jenjang' => 'MTs',
            'santri_nama' => 'Muhammad Bilal Azzam',
            'santri_gender' => 'Putra',
            'santri_tempat_lahir' => 'Maros',
            'santri_tanggal_lahir' => '2014-06-15',
            'santri_alamat' => 'Jl. Poros Camba No. 12, Kel. Cempaniga, Kec. Camba',
            'santri_asal_sekolah' => 'SD Negeri 1 Camba',
            'santri_email' => 'bilal.azzam@gmail.com',
            'santri_hp' => '081234567899',
            'santri_tinggal_bersama' => 'Orang Tua',
            'file_pas_foto' => UploadedFile::fake()->image('pas_foto_bilal.jpg', 300, 400),
            'file_kk' => UploadedFile::fake()->create('kartu_keluarga.pdf', 500, 'application/pdf'),
            'file_raport' => UploadedFile::fake()->image('raport.jpg'),
            'ayah_nama' => 'Ahmad Bilal, S.T.',
            'ayah_hp' => '081122334455',
            'ayah_pekerjaan' => 'PNS / ASN',
            'ayah_penghasilan' => '4.000.000-5.000.000',
            'ibu_nama' => 'Fatimah Az-Zahra',
            'ibu_hp' => '081122334456',
            'ibu_pekerjaan' => 'Guru Madrasah',
            'ibu_penghasilan' => '3.000.000-4.000.000',
        ];

        $response = $this->postJson(route('pendaftaran.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'nama_santri' => 'Muhammad Bilal Azzam',
                'jenjang' => 'MTs',
                'jenis_kelamin' => 'Putra',
                'asal_sekolah' => 'SD Negeri 1 Camba',
                'email' => 'bilal.azzam@gmail.com',
            ],
        ]);

        $this->assertDatabaseHas('pendaftarans', [
            'nama_santri' => 'Muhammad Bilal Azzam',
            'jenjang' => 'MTs',
            'jenis_kelamin' => 'Putra',
            'asal_sekolah' => 'SD Negeri 1 Camba',
            'email' => 'bilal.azzam@gmail.com',
            'status' => 'pending',
        ]);

        $pendaftaran = Pendaftaran::where('nama_santri', 'Muhammad Bilal Azzam')->first();
        $this->assertNotNull($pendaftaran);
        $this->assertStringStartsWith('PSB-2027-', $pendaftaran->registration_number);
        Storage::disk('public')->assertExists($pendaftaran->pas_foto_path);
        Storage::disk('public')->assertExists($pendaftaran->foto_kk_path);
        Storage::disk('public')->assertExists($pendaftaran->foto_raport_path);

        Mail::assertSent(BuktiPendaftaranMail::class, function (BuktiPendaftaranMail $mail) use ($pendaftaran) {
            return $mail->hasTo('bilal.azzam@gmail.com')
                && $mail->pendaftaran->id === $pendaftaran->id;
        });
    }

    public function test_calon_santri_dapat_mendaftar_jenjang_ma(): void
    {
        Storage::fake('public');
        Mail::fake();

        $payload = [
            'jenjang' => 'MA',
            'santri_nama' => 'Aisyah Nurul Jannah',
            'santri_gender' => 'Putri',
            'santri_tempat_lahir' => 'Makassar',
            'santri_tanggal_lahir' => '2011-03-20',
            'santri_alamat' => 'Jl. Perintis Kemerdekaan KM 9, Makassar',
            'santri_asal_sekolah' => 'MTs Negeri 1 Makassar',
            'santri_email' => 'aisyah.jannah@gmail.com',
            'santri_hp' => '085299881122',
            'santri_tinggal_bersama' => 'Orang Tua',
            'file_pas_foto' => UploadedFile::fake()->image('pas_foto_aisyah.png', 300, 400),
            'file_kk' => UploadedFile::fake()->create('kk_aisyah.pdf', 300, 'application/pdf'),
            'file_raport' => UploadedFile::fake()->create('raport_aisyah.pdf', 400, 'application/pdf'),
            'ayah_nama' => 'H. Syamsul Bahri',
            'ayah_hp' => '081299887766',
            'ayah_pekerjaan' => 'Wiraswasta',
            'ayah_penghasilan' => '5.000.000-keatas',
            'ibu_nama' => 'Hj. Mardhiah',
            'ibu_hp' => '081299887767',
            'ibu_pekerjaan' => 'Ibu Rumah Tangga',
            'ibu_penghasilan' => '1.000.000-2.000.000',
        ];

        $response = $this->postJson(route('pendaftaran.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'nama_santri' => 'Aisyah Nurul Jannah',
                'jenjang' => 'MA',
                'jenis_kelamin' => 'Putri',
                'email' => 'aisyah.jannah@gmail.com',
            ],
        ]);

        $this->assertDatabaseHas('pendaftarans', [
            'nama_santri' => 'Aisyah Nurul Jannah',
            'jenjang' => 'MA',
            'jenis_kelamin' => 'Putri',
            'email' => 'aisyah.jannah@gmail.com',
        ]);

        Mail::assertSent(BuktiPendaftaranMail::class);
    }

    public function test_validasi_menolak_jenjang_yang_tidak_valid(): void
    {
        Storage::fake('public');

        $payload = [
            'jenjang' => 'Kuliah Tinggi', // Tidak valid
            'santri_nama' => 'Calon Santri',
            'santri_gender' => 'Putra',
            'santri_tempat_lahir' => 'Maros',
            'santri_tanggal_lahir' => '2014-06-15',
            'santri_alamat' => 'Alamat santri',
            'santri_asal_sekolah' => 'SD Asal',
            'santri_email' => 'santri@example.com',
            'santri_tinggal_bersama' => 'Orang Tua',
            'file_pas_foto' => UploadedFile::fake()->image('pas_foto.jpg'),
            'file_kk' => UploadedFile::fake()->image('kk.jpg'),
            'file_raport' => UploadedFile::fake()->image('raport.jpg'),
            'ayah_nama' => 'Ayah',
            'ayah_hp' => '08123456789',
            'ayah_pekerjaan' => 'Wiraswasta',
            'ayah_penghasilan' => '5.000.000-keatas',
            'ibu_nama' => 'Ibu',
            'ibu_hp' => '08123456780',
            'ibu_pekerjaan' => 'Ibu Rumah Tangga',
            'ibu_penghasilan' => '1.000.000-2.000.000',
        ];

        $response = $this->postJson(route('pendaftaran.store'), $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['jenjang']);
    }

    public function test_validasi_menolak_jika_berkas_dan_email_kosong(): void
    {
        $payload = [
            'jenjang' => 'MTs',
            'santri_nama' => 'Santri Tanpa Berkas',
            'santri_gender' => 'Putra',
            'santri_tempat_lahir' => 'Maros',
            'santri_tanggal_lahir' => '2014-06-15',
            'santri_alamat' => 'Alamat santri',
            'santri_asal_sekolah' => 'SD Asal',
            'santri_tinggal_bersama' => 'Orang Tua',
            'ayah_nama' => 'Ayah',
            'ayah_hp' => '08123456789',
            'ayah_pekerjaan' => 'Wiraswasta',
            'ayah_penghasilan' => '5.000.000-keatas',
            'ibu_nama' => 'Ibu',
            'ibu_hp' => '08123456780',
            'ibu_pekerjaan' => 'Ibu Rumah Tangga',
            'ibu_penghasilan' => '1.000.000-2.000.000',
        ];

        $response = $this->postJson(route('pendaftaran.store'), $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['santri_email', 'file_pas_foto', 'file_kk', 'file_raport']);
    }
}
