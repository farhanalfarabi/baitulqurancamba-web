<?php

namespace Tests\Feature;

use App\Models\Pendaftaran;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSantriTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    /**
     * Test admin santri page can be rendered with table and drawer elements.
     */
    public function test_admin_santri_page_can_be_rendered(): void
    {
        Santri::create([
            'registration_number' => 'STR-2026-001',
            'nama_santri' => 'Ahmad Santri Uji',
            'jenis_kelamin' => 'Putra',
            'jenjang' => 'MTs',
            'nama_ayah' => 'Bapak Uji',
            'no_hp_ayah' => '081234567890',
            'status_santri' => 'aktif',
        ]);

        $response = $this->get('/admin/santri');

        $response->assertStatus(200);
        $response->assertSee('Data Santri Mukim');
        $response->assertSee('Database Induk');
        $response->assertSee('Ahmad Santri Uji');
        $response->assertSee('STR-2026-001');
        $response->assertSee('Status Keaktifan');
        $response->assertSee('santriEditView');
        $response->assertSee('switchSantriDrawerMode');
        $response->assertSee('renderSantriDetailStatusButtons');
        $response->assertSee('btnQuickAktif');
        $response->assertSee('saveEditedSantri');
    }

    /**
     * Test creating a new santri manually from admin.
     */
    public function test_can_create_santri_manually(): void
    {
        $payload = [
            'nama_santri' => 'Muhammad Bilal Baru',
            'jenis_kelamin' => 'Putra',
            'jenjang' => 'MA',
            'tempat_lahir' => 'Maros',
            'tanggal_lahir' => '2010-08-15',
            'alamat_lengkap' => 'Jl. Poros Camba No. 12',
            'asal_sekolah' => 'MTs Camba',
            'email' => 'bilal.baru@example.com',
            'no_hp_santri' => '081298765432',
            'tinggal_bersama' => 'Asrama Pondok',
            'nama_ayah' => 'H. Umar',
            'no_hp_ayah' => '081122334455',
            'pekerjaan_ayah' => 'Pedagang',
            'penghasilan_ayah' => 'Rp 5.000.000 ke atas',
            'nama_ibu' => 'Hj. Aminah',
            'no_hp_ibu' => '081122334456',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'penghasilan_ibu' => 'Rp 1.000.000 - Rp 2.000.000',
            'status_santri' => 'aktif',
        ];

        $response = $this->postJson('/admin/santri', $payload);

        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Data santri berhasil ditambahkan.',
        ]);

        $this->assertDatabaseHas('santris', [
            'nama_santri' => 'Muhammad Bilal Baru',
            'email' => 'bilal.baru@example.com',
            'status_santri' => 'aktif',
            'jenjang' => 'MA',
        ]);
    }

    /**
     * Test updating santri and changing status to 'izin'.
     */
    public function test_can_update_santri_and_change_status_to_izin(): void
    {
        $santri = Santri::create([
            'registration_number' => 'STR-2026-002',
            'nama_santri' => 'Fatimah Az-Zahra',
            'jenis_kelamin' => 'Putri',
            'jenjang' => 'MTs',
            'nama_ayah' => 'Ayah Fatimah',
            'no_hp_ayah' => '081234567891',
            'status_santri' => 'aktif',
        ]);

        $response = $this->putJson("/admin/santri/{$santri->id}", [
            'status_santri' => 'izin',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Data santri berhasil diperbarui.',
        ]);

        $this->assertDatabaseHas('santris', [
            'id' => $santri->id,
            'status_santri' => 'izin',
        ]);
    }

    /**
     * Test updating santri with full form data.
     */
    public function test_can_update_santri_full_data(): void
    {
        $santri = Santri::create([
            'registration_number' => 'STR-2026-003',
            'nama_santri' => 'Santri Awal',
            'jenis_kelamin' => 'Putra',
            'jenjang' => 'MTs',
            'nama_ayah' => 'Ayah Awal',
            'no_hp_ayah' => '081200000000',
            'status_santri' => 'aktif',
        ]);

        $response = $this->putJson("/admin/santri/{$santri->id}", [
            'nama_santri' => 'Santri Diperbarui',
            'jenis_kelamin' => 'Putra',
            'jenjang' => 'MA',
            'status_santri' => 'alumni',
            'asal_sekolah' => 'SMPN 1 Maros',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('santris', [
            'id' => $santri->id,
            'nama_santri' => 'Santri Diperbarui',
            'jenjang' => 'MA',
            'status_santri' => 'alumni',
            'asal_sekolah' => 'SMPN 1 Maros',
        ]);
    }

    /**
     * Test deleting a santri.
     */
    public function test_can_delete_santri(): void
    {
        $santri = Santri::create([
            'registration_number' => 'STR-2026-004',
            'nama_santri' => 'Santri Akan Dihapus',
            'jenis_kelamin' => 'Putra',
            'jenjang' => 'MTs',
            'nama_ayah' => 'Ayah',
            'no_hp_ayah' => '081200000001',
            'status_santri' => 'keluar',
        ]);

        $response = $this->deleteJson("/admin/santri/{$santri->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Data santri berhasil dihapus.',
        ]);

        $this->assertDatabaseMissing('santris', [
            'id' => $santri->id,
        ]);
    }

    /**
     * Test exporting santri data as CSV.
     */
    public function test_can_export_santri_csv(): void
    {
        Santri::create([
            'registration_number' => 'STR-2026-005',
            'nama_santri' => 'Santri Ekspor CSV',
            'jenis_kelamin' => 'Putri',
            'jenjang' => 'MA',
            'nama_ayah' => 'Ayah Ekspor',
            'no_hp_ayah' => '081299998888',
            'status_santri' => 'aktif',
        ]);

        $response = $this->get('/admin/santri/export');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
        $this->assertStringContainsString('rekap_data_santri_pondok_camba', $response->headers->get('content-disposition'));
    }

    /**
     * Test accepting a prospective student (status 'diterima') automatically creates a santri record.
     */
    public function test_pendaftaran_diterima_automatically_creates_santri_record(): void
    {
        $pendaftaran = Pendaftaran::create([
            'registration_number' => 'PSB-2027-991',
            'nama_santri' => 'Calon Santri Otomatis',
            'jenis_kelamin' => 'Putra',
            'jenjang' => 'MTs',
            'status' => 'pending',
            'nama_ayah' => 'Ayah Calon',
            'no_hp_ayah' => '081234567890',
        ]);

        $this->assertDatabaseMissing('santris', [
            'pendaftaran_id' => $pendaftaran->id,
        ]);

        // Admin updates status to 'diterima'
        $response = $this->putJson("/admin/pendaftaran/{$pendaftaran->id}", [
            'status' => 'diterima',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('santris', [
            'pendaftaran_id' => $pendaftaran->id,
            'nama_santri' => 'Calon Santri Otomatis',
            'registration_number' => 'PSB-2027-991',
            'status_santri' => 'aktif',
        ]);
    }

    /**
     * Test reverting status from 'diterima' to 'pending' automatically removes the santri record.
     */
    public function test_pendaftaran_reverted_from_diterima_deletes_santri_record(): void
    {
        $pendaftaran = Pendaftaran::create([
            'registration_number' => 'PSB-2027-992',
            'nama_santri' => 'Santri Batal Diterima',
            'jenis_kelamin' => 'Putri',
            'jenjang' => 'MA',
            'status' => 'diterima',
            'nama_ayah' => 'Ayah',
            'no_hp_ayah' => '081234567890',
        ]);

        $this->assertDatabaseHas('santris', [
            'pendaftaran_id' => $pendaftaran->id,
            'nama_santri' => 'Santri Batal Diterima',
        ]);

        // Admin changes status back to 'pending'
        $response = $this->putJson("/admin/pendaftaran/{$pendaftaran->id}", [
            'status' => 'pending',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('santris', [
            'pendaftaran_id' => $pendaftaran->id,
        ]);
    }

    /**
     * Test deleting a pendaftaran record removes the associated santri.
     */
    public function test_deleting_pendaftaran_deletes_associated_santri(): void
    {
        $pendaftaran = Pendaftaran::create([
            'registration_number' => 'PSB-2027-993',
            'nama_santri' => 'Santri Akan Terhapus Bersama Pendaftaran',
            'jenis_kelamin' => 'Putra',
            'jenjang' => 'MTs',
            'status' => 'diterima',
            'nama_ayah' => 'Ayah',
            'no_hp_ayah' => '081234567890',
        ]);

        $this->assertDatabaseHas('santris', [
            'pendaftaran_id' => $pendaftaran->id,
        ]);

        $response = $this->deleteJson("/admin/pendaftaran/{$pendaftaran->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('santris', [
            'pendaftaran_id' => $pendaftaran->id,
        ]);
    }

    /**
     * Test accepting a prospective student (status 'diterima') automatically creates a santri record.
     */
    public function test_pendaftaran_diterima_automatically_creates_santri_record(): void
    {
        $pendaftaran = \App\Models\Pendaftaran::create([
            'registration_number' => 'PSB-2027-991',
            'nama_santri' => 'Calon Santri Otomatis',
            'jenis_kelamin' => 'Putra',
            'jenjang' => 'MTs',
            'status' => 'pending',
            'nama_ayah' => 'Ayah Calon',
            'no_hp_ayah' => '081234567890',
        ]);

        $this->assertDatabaseMissing('santris', [
            'pendaftaran_id' => $pendaftaran->id,
        ]);

        // Admin updates status to 'diterima'
        $response = $this->putJson("/admin/pendaftaran/{$pendaftaran->id}", [
            'status' => 'diterima',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('santris', [
            'pendaftaran_id' => $pendaftaran->id,
            'nama_santri' => 'Calon Santri Otomatis',
            'registration_number' => 'PSB-2027-991',
            'status_santri' => 'aktif',
        ]);
    }

    /**
     * Test reverting status from 'diterima' to 'pending' automatically removes the santri record.
     */
    public function test_pendaftaran_reverted_from_diterima_deletes_santri_record(): void
    {
        $pendaftaran = \App\Models\Pendaftaran::create([
            'registration_number' => 'PSB-2027-992',
            'nama_santri' => 'Santri Batal Diterima',
            'jenis_kelamin' => 'Putri',
            'jenjang' => 'MA',
            'status' => 'diterima',
            'nama_ayah' => 'Ayah',
            'no_hp_ayah' => '081234567890',
        ]);

        $this->assertDatabaseHas('santris', [
            'pendaftaran_id' => $pendaftaran->id,
            'nama_santri' => 'Santri Batal Diterima',
        ]);

        // Admin changes status back to 'pending'
        $response = $this->putJson("/admin/pendaftaran/{$pendaftaran->id}", [
            'status' => 'pending',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('santris', [
            'pendaftaran_id' => $pendaftaran->id,
        ]);
    }

    /**
     * Test deleting a pendaftaran record removes the associated santri.
     */
    public function test_deleting_pendaftaran_deletes_associated_santri(): void
    {
        $pendaftaran = \App\Models\Pendaftaran::create([
            'registration_number' => 'PSB-2027-993',
            'nama_santri' => 'Santri Akan Terhapus Bersama Pendaftaran',
            'jenis_kelamin' => 'Putra',
            'jenjang' => 'MTs',
            'status' => 'diterima',
            'nama_ayah' => 'Ayah',
            'no_hp_ayah' => '081234567890',
        ]);

        $this->assertDatabaseHas('santris', [
            'pendaftaran_id' => $pendaftaran->id,
        ]);

        $response = $this->deleteJson("/admin/pendaftaran/{$pendaftaran->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('santris', [
            'pendaftaran_id' => $pendaftaran->id,
        ]);
    }
}
