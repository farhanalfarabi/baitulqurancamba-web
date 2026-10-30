<?php

namespace Tests\Feature;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GalleryFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    /**
     * Test public gallery page displays database photos and filters by year dynamically.
     */
    public function test_public_gallery_page_renders_with_dynamic_years_and_photos(): void
    {
        Gallery::create([
            'image_path' => '/assets/images/pondok/halaqah-tahfidz.jpg',
            'year' => 2026,
        ]);

        Gallery::create([
            'image_path' => '/assets/images/pondok/asrama.jpg',
            'year' => 2025,
        ]);

        $response = $this->get('/gallery');

        $response->assertStatus(200);
        $response->assertSee('Tahun 2026');
        $response->assertSee('Tahun 2025');
        $response->assertSee('halaqah-tahfidz.jpg');
        $response->assertSee('asrama.jpg');
    }

    /**
     * Test admin gallery page can be rendered.
     */
    public function test_admin_gallery_page_can_be_rendered(): void
    {
        Gallery::create([
            'image_path' => '/assets/images/pondok/halaqah-tahfidz.jpg',
            'year' => 2026,
        ]);

        $response = $this->get('/admin/gallery');

        $response->assertStatus(200);
        $response->assertSee('Koleksi Foto');
        $response->assertSee('Tahun 2026');
    }

    /**
     * Test admin gallery JSON endpoint supports year filtering.
     */
    public function test_admin_gallery_json_response_with_year_filter(): void
    {
        Gallery::create([
            'image_path' => '/assets/images/pondok/halaqah-tahfidz.jpg',
            'year' => 2026,
        ]);

        Gallery::create([
            'image_path' => '/assets/images/pondok/asrama.jpg',
            'year' => 2025,
        ]);

        $response = $this->getJson('/admin/gallery?year=2026');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'selected_year' => '2026',
            ])
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['year' => 2026]);
    }

    /**
     * Test admin can upload single photo with selected year.
     */
    public function test_admin_can_upload_single_photo(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('test-photo.jpg');

        $response = $this->postJson('/admin/gallery', [
            'year' => 2026,
            'photo' => $file,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'count' => 1,
            ]);

        $this->assertDatabaseHas('galleries', [
            'year' => 2026,
        ]);

        $gallery = Gallery::where('year', 2026)->first();
        $this->assertNotNull($gallery);
        $this->assertStringStartsWith('/storage/gallery/', $gallery->image_path);

        $storedPath = str_replace('/storage/', '', $gallery->image_path);
        Storage::disk('public')->assertExists($storedPath);
    }

    /**
     * Test admin can upload multiple photos simultaneously with a selected year.
     */
    public function test_admin_can_upload_multiple_photos(): void
    {
        Storage::fake('public');

        $files = [
            UploadedFile::fake()->image('photo1.jpg'),
            UploadedFile::fake()->image('photo2.png'),
            UploadedFile::fake()->image('photo3.webp'),
        ];

        $response = $this->postJson('/admin/gallery', [
            'year' => 2027,
            'photos' => $files,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'count' => 3,
            ]);

        $this->assertDatabaseCount('galleries', 3);
        $this->assertEquals(3, Gallery::where('year', 2027)->count());
    }

    /**
     * Test admin can replace an existing photo.
     */
    public function test_admin_can_update_or_replace_photo(): void
    {
        Storage::fake('public');

        $originalFile = UploadedFile::fake()->image('old-pic.jpg');
        $oldPath = '/storage/'.$originalFile->store('gallery', 'public');

        $gallery = Gallery::create([
            'image_path' => $oldPath,
            'year' => 2025,
        ]);

        $newFile = UploadedFile::fake()->image('new-pic.jpg');

        $response = $this->postJson("/admin/gallery/{$gallery->id}", [
            'year' => 2026,
            'photo' => $newFile,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $gallery->refresh();
        $this->assertEquals(2026, $gallery->year);
        $this->assertNotEquals($oldPath, $gallery->image_path);

        // Old file deleted, new file exists
        Storage::disk('public')->assertMissing(str_replace('/storage/', '', $oldPath));
        Storage::disk('public')->assertExists(str_replace('/storage/', '', $gallery->image_path));
    }

    /**
     * Test admin can delete a photo.
     */
    public function test_admin_can_delete_photo(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('delete-me.jpg');
        $path = '/storage/'.$file->store('gallery', 'public');

        $gallery = Gallery::create([
            'image_path' => $path,
            'year' => 2026,
        ]);

        $response = $this->deleteJson("/admin/gallery/{$gallery->id}");

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseMissing('galleries', [
            'id' => $gallery->id,
        ]);

        Storage::disk('public')->assertMissing(str_replace('/storage/', '', $path));
    }
}
