<?php

namespace Tests\Feature;

use App\Rules\Turnstile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PendaftaranTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_pendaftaran_dapat_diakses(): void
    {
        $response = $this->get(route('pendaftaran'));

        $response->assertStatus(200);
        $response->assertSee('Formulir Pendaftaran');
        $response->assertSee('Wustho');
        $response->assertSee('Ulya');
        $response->assertSee('Email Aktif');
        $response->assertSee('Pas Foto Santri');
    }

    public function test_calon_santri_dapat_mendaftar_jenjang_wustho(): void
    {
        Storage::fake('public');
        Mail::fake();

        $payload = [
            'jenjang' => 'Wustho',
            'santri_nama' => 'Muhammad Thoriq Al-Fath',
            'santri_gender' => 'Putra',
            'santri_tempat_lahir' => 'Maros',
            'santri_tanggal_lahir' => '2014-07-10',
            'santri_alamat' => 'Jl. Poros Camba Km 50',
            'santri_asal_sekolah' => 'SD IT Tahfizh Camba',
            'santri_email' => 'thoriq.fath@gmail.com',
            'santri_hp' => '081234567811',
            'santri_tinggal_bersama' => 'Orang Tua',
            'file_pas_foto' => UploadedFile::fake()->image('pas_foto_thoriq.jpg', 300, 400),
            'file_kk' => UploadedFile::fake()->create('kk_thoriq.pdf', 500, 'application/pdf'),
            'file_raport' => UploadedFile::fake()->image('raport_thoriq.jpg'),
            'ayah_nama' => 'Ir. Hamdan',
            'ayah_hp' => '081122334477',
            'ayah_pekerjaan' => 'PNS / ASN',
            'ayah_penghasilan' => '4.000.000-5.000.000',
            'ibu_nama' => 'Siti Maryam',
            'ibu_hp' => '081122334488',
            'ibu_pekerjaan' => 'Ibu Rumah Tangga',
            'ibu_penghasilan' => '1.000.000-2.000.000',
        ];

        $response = $this->postJson(route('pendaftaran.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'nama_santri' => 'Muhammad Thoriq Al-Fath',
                'jenjang' => 'Wustho',
            ],
        ]);

        $this->assertDatabaseHas('pendaftarans', [
            'nama_santri' => 'Muhammad Thoriq Al-Fath',
            'jenjang' => 'Wustho',
        ]);
    }

    public function test_calon_santri_dapat_mendaftar_jenjang_ulya(): void
    {
        Storage::fake('public');
        Mail::fake();

        $payload = [
            'jenjang' => 'Ulya',
            'santri_nama' => 'Maryam Hasanah',
            'santri_gender' => 'Putri',
            'santri_tempat_lahir' => 'Makassar',
            'santri_tanggal_lahir' => '2011-05-18',
            'santri_alamat' => 'Jl. Urip Sumoharjo Makassar',
            'santri_asal_sekolah' => 'SMP IT Wahdah Islamiyah',
            'santri_email' => 'maryam.hasanah@gmail.com',
            'santri_hp' => '085299882233',
            'santri_tinggal_bersama' => 'Orang Tua',
            'file_pas_foto' => UploadedFile::fake()->image('pas_foto_maryam.png', 300, 400),
            'file_kk' => UploadedFile::fake()->create('kk_maryam.pdf', 300, 'application/pdf'),
            'file_raport' => UploadedFile::fake()->create('raport_maryam.pdf', 400, 'application/pdf'),
            'ayah_nama' => 'H. Hasanuddin',
            'ayah_hp' => '081299883344',
            'ayah_pekerjaan' => 'Wiraswasta',
            'ayah_penghasilan' => '5.000.000-keatas',
            'ibu_nama' => 'Hj. Aminah',
            'ibu_hp' => '081299883355',
            'ibu_pekerjaan' => 'Guru',
            'ibu_penghasilan' => '3.000.000-4.000.000',
        ];

        $response = $this->postJson(route('pendaftaran.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'nama_santri' => 'Maryam Hasanah',
                'jenjang' => 'Ulya',
            ],
        ]);

        $this->assertDatabaseHas('pendaftarans', [
            'nama_santri' => 'Maryam Hasanah',
            'jenjang' => 'Ulya',
        ]);
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
            'jenjang' => 'Wustho',
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

    public function test_validasi_menolak_nama_dengan_tag_html_dan_link_spam(): void
    {
        Storage::fake('public');

        $payload = [
            'jenjang' => 'Ulya',
            'santri_nama' => '* * * <a href="https://myxa.cc/">message 2</a> * * *',
            'santri_gender' => 'Putri',
            'santri_tempat_lahir' => 'Maros',
            'santri_tanggal_lahir' => '2011-05-18',
            'santri_alamat' => 'Alamat santri dengan link https://myxa.cc/',
            'santri_asal_sekolah' => 'Sekolah <script>alert(1)</script>',
            'santri_email' => 'spam@test.com',
            'santri_hp' => 'bukan-nomor-telepon',
            'santri_tinggal_bersama' => 'Orang Tua',
            'file_pas_foto' => UploadedFile::fake()->image('pas_foto.jpg'),
            'file_kk' => UploadedFile::fake()->create('kk.pdf', 300, 'application/pdf'),
            'file_raport' => UploadedFile::fake()->create('raport.pdf', 400, 'application/pdf'),
            'ayah_nama' => 's0h56n', // Mengandung angka acak
            'ayah_hp' => 'abc12345',
            'ayah_pekerjaan' => 'Wiraswasta',
            'ayah_penghasilan' => '5.000.000-keatas',
            'ibu_nama' => 'Ibu',
            'ibu_hp' => '08123456780',
            'ibu_pekerjaan' => 'Ibu Rumah Tangga',
            'ibu_penghasilan' => '1.000.000-2.000.000',
        ];

        $response = $this->postJson(route('pendaftaran.store'), $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            'santri_nama',
            'santri_alamat',
            'santri_asal_sekolah',
            'santri_hp',
            'ayah_nama',
            'ayah_hp',
        ]);
    }

    public function test_calon_santri_dapat_mendaftar_dengan_berkas_besar_hingga_batas_maksimal(): void
    {
        Storage::fake('public');
        Mail::fake();

        $payload = [
            'jenjang' => 'Wustho',
            'santri_nama' => 'Santri Berkas Maksimal',
            'santri_gender' => 'Putra',
            'santri_tempat_lahir' => 'Maros',
            'santri_tanggal_lahir' => '2014-07-10',
            'santri_alamat' => 'Jl. Poros Camba Km 50',
            'santri_asal_sekolah' => 'SD IT Tahfizh Camba',
            'santri_email' => 'berkas.maksimal@gmail.com',
            'santri_hp' => '081234567811',
            'santri_tinggal_bersama' => 'Orang Tua',
            'file_pas_foto' => UploadedFile::fake()->create('pas_foto_5mb.jpg', 5100, 'image/jpeg'),
            'file_kk' => UploadedFile::fake()->create('kk_9mb.pdf', 9500, 'application/pdf'),
            'file_raport' => UploadedFile::fake()->create('raport_9mb.pdf', 9500, 'application/pdf'),
            'ayah_nama' => 'Ayah',
            'ayah_hp' => '081122334477',
            'ayah_pekerjaan' => 'PNS / ASN',
            'ayah_penghasilan' => '4.000.000-5.000.000',
            'ibu_nama' => 'Ibu',
            'ibu_hp' => '081122334488',
            'ibu_pekerjaan' => 'Ibu Rumah Tangga',
            'ibu_penghasilan' => '1.000.000-2.000.000',
        ];

        $response = $this->postJson(route('pendaftaran.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'nama_santri' => 'Santri Berkas Maksimal',
                'jenjang' => 'Wustho',
            ],
        ]);
    }

    public function test_halaman_pendaftaran_memiliki_field_honeypot_website(): void
    {
        $response = $this->get(route('pendaftaran'));

        $response->assertStatus(200);
        $response->assertSee('name="website"', false);
    }

    public function test_honeypot_menggagalkan_bot_spam_tanpa_menyimpan_ke_database(): void
    {
        Storage::fake('public');
        Mail::fake();

        // Bot mengisi payload termasuk field jebakan honeypot 'website'
        $botPayload = [
            'website' => 'https://myxa.cc/',
            'santri_nama' => '* * * <a href="https://myxa.cc/">message 2</a> * * *',
            'jenjang' => 'Ulya',
            'santri_gender' => 'Putri',
            'santri_email' => 'spambot@example.com',
            'ayah_nama' => 's0h56n',
            'ayah_hp' => '520421327585',
        ];

        $response = $this->postJson(route('pendaftaran.store'), $botPayload);

        // Respon memberikan status 200 dan success agar bot tidak curiga
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        // Tidak ada data yang tersimpan di database
        $this->assertDatabaseMissing('pendaftarans', [
            'email' => 'spambot@example.com',
        ]);
        $this->assertDatabaseCount('pendaftarans', 0);

        // Tidak ada email yang dikirim
        Mail::assertNothingSent();
    }

    public function test_rate_limiting_membatasi_maksimal_5_kali_request_per_menit(): void
    {
        // Lakukan 5 request pertama
        for ($i = 0; $i < 5; $i++) {
            $this->postJson(route('pendaftaran.store'), []);
        }

        // Request ke-6 harus ditolak oleh Rate Limiter dengan HTTP 429
        $response = $this->postJson(route('pendaftaran.store'), []);

        $response->assertStatus(429);
        $response->assertJson([
            'success' => false,
        ]);
        $response->assertJsonFragment([
            'success' => false,
        ]);
        $this->assertStringContainsString('Terlalu banyak permintaan pendaftaran', $response->json('message'));
    }

    public function test_halaman_pendaftaran_memuat_script_dan_widget_turnstile(): void
    {
        config(['services.turnstile.site_key' => '0x4AAAAAAGGZ46px58-LOmXD']);

        $response = $this->get(route('pendaftaran'));

        $response->assertStatus(200);
        $response->assertSee('challenges.cloudflare.com/turnstile/v0/api.js');
        $response->assertSee('class="cf-turnstile"', false);
        $response->assertSee('data-sitekey="0x4AAAAAAGGZ46px58-LOmXD"', false);
    }

    public function test_turnstile_rule_memvalidasi_token_dengan_sukses(): void
    {
        config(['services.turnstile.secret_key' => 'test-secret-key']);

        Http::fake([
            'challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
                'success' => true,
            ], 200),
        ]);

        $validator = Validator::make([
            'cf-turnstile-response' => 'valid-dummy-token',
        ], [
            'cf-turnstile-response' => [new Turnstile],
        ]);

        $this->assertTrue($validator->passes());
    }

    public function test_turnstile_rule_menolak_token_yang_tidak_valid(): void
    {
        config(['services.turnstile.secret_key' => 'test-secret-key']);

        Http::fake([
            'challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
                'success' => false,
                'error-codes' => ['invalid-input-response'],
            ], 200),
        ]);

        $validator = Validator::make([
            'cf-turnstile-response' => 'invalid-dummy-token',
        ], [
            'cf-turnstile-response' => [new Turnstile],
        ]);

        $this->assertFalse($validator->passes());
        $this->assertStringContainsString('CAPTCHA', $validator->errors()->first('cf-turnstile-response'));
    }
}
