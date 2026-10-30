<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login page renders successfully.
     */
    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Masuk ke Dashboard');
        $response->assertSee('Portal Khusus Pengelola & Asatidz', false);
        $response->assertSee('admin@baitulquran.id');
        $response->assertSee("Baitul Qur'an Camba", false);
    }

    /**
     * Test /admin/login redirects to /login for guest.
     */
    public function test_admin_login_route_redirects_to_login(): void
    {
        $response = $this->get('/admin/login');

        $response->assertRedirect('/login');
    }

    /**
     * Test login requires email and password.
     */
    public function test_login_requires_email_and_password(): void
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['email', 'password']);
    }

    /**
     * Test successful login submission directs user to admin pendaftaran page.
     */
    public function test_login_submission_redirects_to_admin_dashboard(): void
    {
        User::factory()->create([
            'email' => 'admin@baitulquran.id',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@baitulquran.id',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.pendaftaran.index'));
        $response->assertSessionHas('success');
        $this->assertAuthenticated();
    }

    /**
     * Test failed login submission with invalid password.
     */
    public function test_login_fails_with_invalid_credentials(): void
    {
        User::factory()->create([
            'email' => 'admin@baitulquran.id',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@baitulquran.id',
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    /**
     * Test unauthenticated guest cannot access admin portal.
     */
    public function test_unauthenticated_user_cannot_access_admin_portal(): void
    {
        $response = $this->get('/admin/pendaftaran');

        $response->assertRedirect('/login');
    }

    /**
     * Test authenticated user accessing login page is redirected to admin dashboard.
     */
    public function test_authenticated_user_is_redirected_from_login_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect(route('admin.pendaftaran.index'));
    }

    /**
     * Test logout redirects to login with status message.
     */
    public function test_logout_redirects_to_login(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('status');
        $this->assertGuest();
    }
}
