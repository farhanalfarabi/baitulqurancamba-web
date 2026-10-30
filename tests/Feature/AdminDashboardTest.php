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
            'email' => 'santri.test@example.com',
            'no_hp_santri' => '08123456789',
            'tinggal_bersama' => 'Orang Tua',
            'pas_foto_path' => 'dokumen/pas_foto.jpg',
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
     * Test admin pendaftaran status can be updated partially (quick status change).
     */
    public function test_admin_pendaftaran_status_can_be_updated_partially(): void
    {
        $pendaftaran = Pendaftaran::create([
            'registration_number' => 'PSB-TEST-PARTIAL',
            'jenjang' => 'MTs',
            'nama_santri' => 'Santri Partial Status',
            'jenis_kelamin' => 'Putra',
            'nama_ayah' => 'Ayah Partial',
            'no_hp_ayah' => '08123456789',
            'status' => 'pending',
        ]);

        $response = $this->putJson(route('admin.pendaftaran.update', $pendaftaran->id), [
            'status' => 'diterima',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $pendaftaran->id,
                    'status' => 'diterima',
                ],
            ]);

        $this->assertDatabaseHas('pendaftarans', [
            'id' => $pendaftaran->id,
            'status' => 'diterima',
        ]);
    }

    /**
     * Test admin can create a new registration manually.
     */
    public function test_admin_pendaftaran_can_be_created_manually(): void
    {
        $payload = [
            'nama_santri' => 'Santri Manual Baru',
            'jenis_kelamin' => 'Putri',
            'jenjang' => 'MTs',
            'tempat_lahir' => 'Camba',
            'tanggal_lahir' => '2014-03-15',
            'nama_ayah' => 'Ayah Manual',
            'no_hp_ayah' => '081200001111',
            'asal_sekolah' => 'SD Negeri 1 Camba',
            'email' => 'manual.santri@gmail.com',
            'status' => 'pending',
        ];

        $response = $this->postJson(route('admin.pendaftaran.store'), $payload);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'nama_santri' => 'Santri Manual Baru',
                    'jenjang' => 'MTs',
                    'jenis_kelamin' => 'Putri',
                ],
            ]);

        $this->assertDatabaseHas('pendaftarans', [
            'nama_santri' => 'Santri Manual Baru',
            'email' => 'manual.santri@gmail.com',
        ]);
    }

    /**
     * Test admin can delete a registration.
     */
    public function test_admin_pendaftaran_can_be_deleted(): void
    {
        $pendaftaran = Pendaftaran::create([
            'registration_number' => 'PSB-TEST-DELETE',
            'jenjang' => 'MA',
            'nama_santri' => 'Santri Akan Dihapus',
            'jenis_kelamin' => 'Putra',
            'nama_ayah' => 'Ayah Delete',
            'no_hp_ayah' => '081299990000',
            'status' => 'pending',
        ]);

        $response = $this->deleteJson(route('admin.pendaftaran.destroy', $pendaftaran->id));

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseMissing('pendaftarans', [
            'id' => $pendaftaran->id,
        ]);
    }

    /**
     * Test admin can export pendaftarans to CSV.
     */
    public function test_admin_pendaftaran_can_be_exported_to_csv(): void
    {
        $birthDate = now()->subYears(13)->format('Y-m-d');
        Pendaftaran::create([
            'registration_number' => 'PSB-TEST-EXPORT',
            'jenjang' => 'MTs',
            'nama_santri' => 'Santri Export CSV',
            'jenis_kelamin' => 'Putra',
            'tanggal_lahir' => $birthDate,
            'nama_ayah' => 'Ayah Export',
            'no_hp_ayah' => '081255554444',
            'status' => 'terverifikasi',
        ]);

        $response = $this->get(route('admin.pendaftaran.export'));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
        $content = $response->streamedContent();
        $this->assertStringContainsString('Umur', $content);
        $this->assertStringContainsString('13 Tahun', $content);
    }

    /**
     * Test umur is calculated automatically from tanggal_lahir on save.
     */
    public function test_pendaftaran_umur_is_calculated_automatically_from_birth_date(): void
    {
        $tenYearsAgo = now()->subYears(10)->format('Y-m-d');

        $pendaftaran = Pendaftaran::create([
            'registration_number' => 'PSB-TEST-UMUR',
            'jenjang' => 'MTs',
            'nama_santri' => 'Santri Hitung Umur',
            'jenis_kelamin' => 'Putra',
            'tanggal_lahir' => $tenYearsAgo,
            'nama_ayah' => 'Ayah Umur',
            'no_hp_ayah' => '081234567890',
            'status' => 'pending',
        ]);

        $this->assertEquals(10, $pendaftaran->umur);
        $this->assertDatabaseHas('pendaftarans', [
            'id' => $pendaftaran->id,
            'umur' => 10,
        ]);

        // When updated with a new birth date
        $twelveYearsAgo = now()->subYears(12)->format('Y-m-d');
        $pendaftaran->update(['tanggal_lahir' => $twelveYearsAgo]);

        $this->assertEquals(12, $pendaftaran->fresh()->umur);
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
