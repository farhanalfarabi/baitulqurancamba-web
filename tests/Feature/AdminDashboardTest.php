<?php

namespace Tests\Feature;

use App\Models\Pendaftaran;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test admin dashboard page loads successfully.
     */
    public function test_admin_dashboard_can_be_rendered(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
        $response->assertSee("Baitul Qur'an");
        $response->assertSee('Admin Portal');
        $response->assertSee('Pendaftar PSB');
        $response->assertSee('Santri Mukim Aktif');
        $response->assertSee('Dewan Asatidz');
    }

    /**
     * Test admin pendaftaran index loads successfully.
     */
    public function test_admin_pendaftaran_page_can_be_rendered(): void
    {
        $response = $this->get('/admin/pendaftaran');

        $response->assertStatus(200);
        $response->assertSee('Penerimaan Santri Baru');
        $response->assertSee('Edit Data Pendaftar');
        $response->assertSee('switchPendaftaranDrawerMode');
        $response->assertSee('pendaftaranEditView');
        $response->assertSee('saveEditedPendaftaran');
    }

    /**
     * Test admin pendaftaran record can be updated via PUT endpoint.
     */
    public function test_admin_pendaftaran_can_be_updated(): void
    {
        $pendaftaran = Pendaftaran::create([
            'registration_number' => 'PSB-TEST-001',
            'jenjang' => 'Wustha (SMP)',
            'nama_santri' => 'Santri Uji Coba',
            'jenis_kelamin' => 'Putra',
            'tempat_lahir' => 'Makassar',
            'tanggal_lahir' => '2014-01-01',
            'alamat_lengkap' => 'Jl. Test No. 123',
            'asal_sekolah' => 'SD Test',
            'no_hp_santri' => '08123456789',
            'tinggal_bersama' => 'Orang Tua',
            'foto_kk_path' => 'dokumen/kk.pdf',
            'foto_raport_path' => 'dokumen/raport.pdf',
            'nama_ayah' => 'Ayah Test',
            'no_hp_ayah' => '08129876543',
            'pekerjaan_ayah' => 'Wiraswasta',
            'penghasilan_ayah' => 'Rp 5.000.000 ke atas',
            'nama_ibu' => 'Ibu Test',
            'no_hp_ibu' => '08129876542',
            'pekerjaan_ibu' => 'Guru',
            'penghasilan_ibu' => 'Rp 3.000.000 - Rp 4.000.000',
            'status' => 'pending',
        ]);

        $updatePayload = [
            'nama_santri' => 'Santri Uji Coba Diperbarui',
            'jenis_kelamin' => 'Putri',
            'jenjang' => 'Ulya (SMA)',
            'tempat_lahir' => 'Maros',
            'tanggal_lahir' => '2013-02-02',
            'alamat_lengkap' => 'Jl. Poros Camba Baru',
            'asal_sekolah' => 'SMP Test Unggulan',
            'no_hp_santri' => '08999999999',
            'tinggal_bersama' => 'Asrama Pondok',
            'nama_ayah' => 'Ayah Baru',
            'no_hp_ayah' => '08777777777',
            'pekerjaan_ayah' => 'PNS',
            'penghasilan_ayah' => 'Rp 5.000.000 ke atas',
            'nama_ibu' => 'Ibu Baru',
            'no_hp_ibu' => '08666666666',
            'pekerjaan_ibu' => 'Dosen',
            'penghasilan_ibu' => 'Rp 5.000.000 ke atas',
            'status' => 'terverifikasi',
        ];

        $response = $this->putJson(route('admin.pendaftaran.update', $pendaftaran->id), $updatePayload);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $pendaftaran->id,
                    'nama_santri' => 'Santri Uji Coba Diperbarui',
                    'jenis_kelamin' => 'Putri',
                    'jenjang' => 'Ulya (SMA)',
                    'status' => 'terverifikasi',
                ],
            ]);

        $this->assertDatabaseHas('pendaftarans', [
            'id' => $pendaftaran->id,
            'nama_santri' => 'Santri Uji Coba Diperbarui',
            'jenis_kelamin' => 'Putri',
            'status' => 'terverifikasi',
        ]);
    }

    /**
     * Test admin santri index loads successfully with drawer edit features.
     */
    public function test_admin_santri_page_can_be_rendered(): void
    {
        $response = $this->get('/admin/santri');

        $response->assertStatus(200);
        $response->assertSee('Database Santri Mukim Aktif');
        $response->assertSee('Edit Data Santri');
        $response->assertSee('santriEditView');
        $response->assertSee('Simpan Perubahan');
        $response->assertSee('switchSantriDrawerMode');
        $response->assertSee('saveEditedSantri');
    }

    /**
     * Test admin guru index loads successfully.
     */
    public function test_admin_guru_page_can_be_rendered(): void
    {
        $response = $this->get('/admin/guru');

        $response->assertStatus(200);
        $response->assertSee('Dewan Asatidz');
    }

    /**
     * Test admin gallery index loads successfully.
     */
    public function test_admin_gallery_page_can_be_rendered(): void
    {
        $response = $this->get('/admin/gallery');

        $response->assertStatus(200);
        $response->assertSee('Koleksi Foto');
    }
}
