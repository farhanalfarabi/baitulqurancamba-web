<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
     * Test /admin/login redirects to /login.
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
     * Test successful login submission directs user to admin dashboard.
     */
    public function test_login_submission_redirects_to_admin_dashboard(): void
    {
        $response = $this->post('/login', [
            'email' => 'admin@baitulquran.id',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('success');
    }

    /**
     * Test logout redirects to login with status message.
     */
    public function test_logout_redirects_to_login(): void
    {
        $response = $this->post('/logout');

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('status');
    }
}
