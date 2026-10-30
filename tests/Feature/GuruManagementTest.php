<?php

namespace Tests\Feature;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GuruManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    /**
     * Test admin guru page can be rendered with dynamic stats from database.
     */
    public function test_admin_guru_page_can_be_rendered(): void
    {
        Guru::create([
            'nama' => 'Ust. Syahrir, S.Pd.I, M.Ag.',
            'jenis_kelamin' => 'Ustadz',
            'jabatan' => 'Kepala Bidang Tahfizh',
            'kategori' => 'tahfizh',
            'tanggung_jawab' => '4 Halaqah Fajar & Maghrib',
            'status_kepegawaian' => 'Mukim (Tetap)',
            'almamater' => 'PTIQ Jakarta',
        ]);

        $response = $this->get('/admin/guru');

        $response->assertStatus(200);
        $response->assertSee('Dewan Asatidz');
        $response->assertSee('Ust. Syahrir, S.Pd.I, M.Ag.');
        $response->assertSee('Tanggung Jawab');
        $response->assertSee('4 Halaqah Fajar & Maghrib');
    }

    /**
     * Test admin guru json list endpoint.
     */
    public function test_admin_guru_json_response(): void
    {
        Guru::create([
            'nama' => 'Ustadzah Nurjannah, S.Th.I',
            'jenis_kelamin' => 'Ustadzah',
            'jabatan' => 'Koordinator Tahfizh Putri',
            'kategori' => 'tahfizh',
            'tanggung_jawab' => '3 Halaqah Santriwati',
            'status_kepegawaian' => 'Mukim (Tetap)',
        ]);

        $response = $this->getJson('/admin/guru');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'stats' => [
                    'total_guru' => 1,
                    'guru_tahfizh' => 1,
                    'guru_akhwat' => 1,
                ],
            ]);
    }

    /**
     * Test admin can create new asatidz via POST endpoint.
     */
    public function test_admin_can_store_new_guru(): void
    {
        $payload = [
            'nama' => 'Ust. Muhammad Zaid, Lc.',
            'jenis_kelamin' => 'Ustadz',
            'jabatan' => 'Pengajar Ushul Fiqih & Bahasa Arab',
            'kategori' => 'diniyah',
            'tanggung_jawab' => '2 Halaqah & Kelas Ulya',
            'spesialisasi' => 'Fiqih Syafi\'i & Sanad Matan Al-Jurumiyah',
            'almamater' => 'Al-Azhar Kairo Mesir',
            'status_kepegawaian' => 'Mukim (Tetap)',
            'no_hp' => '081234567899',
            'email' => 'zaid@baitulquran.sch.id',
            'alamat' => 'Komp. Asrama Asatidz Camba',
            'tahun_bergabung' => 2024,
        ];

        $response = $this->postJson('/admin/guru', $payload);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'nama' => 'Ust. Muhammad Zaid, Lc.',
                    'jenis_kelamin' => 'Ustadz',
                    'tanggung_jawab' => '2 Halaqah & Kelas Ulya',
                ],
            ]);

        $this->assertDatabaseHas('gurus', [
            'nama' => 'Ust. Muhammad Zaid, Lc.',
            'kategori' => 'diniyah',
            'tanggung_jawab' => '2 Halaqah & Kelas Ulya',
            'status_kepegawaian' => 'Mukim (Tetap)',
        ]);
    }

    /**
     * Test admin can update guru data via PUT endpoint.
     */
    public function test_admin_can_update_guru(): void
    {
        $guru = Guru::create([
            'nama' => 'Ust. Farhan',
            'jenis_kelamin' => 'Ustadz',
            'jabatan' => 'Musyrif',
            'kategori' => 'pengasuhan',
            'tanggung_jawab' => '1 Halaqah',
            'status_kepegawaian' => 'Guru Pengajar',
        ]);

        $updatePayload = [
            'nama' => 'Ust. Farhan Rahmatullah, S.Pd.',
            'jenis_kelamin' => 'Ustadz',
            'jabatan' => 'Kepala Pengasuhan Asrama',
            'kategori' => 'pengasuhan',
            'tanggung_jawab' => '3 Halaqah & Asrama Umar',
            'status_kepegawaian' => 'Mukim (Tetap)',
            'spesialisasi' => 'Tarbiyah Karakter Santri',
            'almamater' => 'Universitas Negeri Makassar',
            'no_hp' => '081234567800',
            'email' => 'farhan@baitulquran.sch.id',
            'alamat' => 'Asrama Camba',
            'tahun_bergabung' => 2021,
        ];

        $response = $this->putJson("/admin/guru/{$guru->id}", $updatePayload);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $guru->id,
                    'nama' => 'Ust. Farhan Rahmatullah, S.Pd.',
                    'jabatan' => 'Kepala Pengasuhan Asrama',
                    'tanggung_jawab' => '3 Halaqah & Asrama Umar',
                ],
            ]);

        $this->assertDatabaseHas('gurus', [
            'id' => $guru->id,
            'nama' => 'Ust. Farhan Rahmatullah, S.Pd.',
            'tanggung_jawab' => '3 Halaqah & Asrama Umar',
            'status_kepegawaian' => 'Mukim (Tetap)',
        ]);
    }

    /**
     * Test admin can delete guru via DELETE endpoint.
     */
    public function test_admin_can_delete_guru(): void
    {
        $guru = Guru::create([
            'nama' => 'Ust. Ahmad Temporary',
            'jenis_kelamin' => 'Ustadz',
            'jabatan' => 'Guru Pengganti',
            'kategori' => 'formal',
            'tanggung_jawab' => 'Kelas 7',
            'status_kepegawaian' => 'Guru Pengajar',
        ]);

        $response = $this->deleteJson("/admin/guru/{$guru->id}");

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseMissing('gurus', [
            'id' => $guru->id,
        ]);
    }

    /**
     * Test admin can upload photo for guru.
     */
    public function test_admin_can_upload_photo_for_guru(): void
    {
        Storage::fake('public');

        $photo = UploadedFile::fake()->image('ustadz.jpg', 400, 500);

        $payload = [
            'nama' => 'Ust. Foto Test, S.Pd.',
            'jenis_kelamin' => 'Ustadz',
            'jabatan' => 'Guru Formal',
            'kategori' => 'formal',
            'tanggung_jawab' => 'Kelas 8',
            'status_kepegawaian' => 'Guru Tetap',
            'foto' => $photo,
        ];

        $response = $this->postJson('/admin/guru', $payload);

        $response->assertStatus(201);
        $guru = Guru::where('nama', 'Ust. Foto Test, S.Pd.')->first();
        $this->assertNotNull($guru);
        $this->assertStringContainsString('/storage/guru/', $guru->foto_path);
    }
}
