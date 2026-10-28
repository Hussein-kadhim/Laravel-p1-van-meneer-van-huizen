<?php

namespace Tests\Feature;

use App\Http\Controllers\OrderController;
use App\Http\Interfaces\ControllerInterface;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_accessible()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Inloggen');
    }

    public function test_unauthenticated_user_is_redirected_from_protected_routes()
    {
        $response = $this->get('/categories');

        $response->assertRedirect('/login');
    }

    public function test_user_can_authenticate_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('home'));
    }

    public function test_user_cannot_authenticate_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/logout');

        $this->assertGuest();
        $response->assertRedirect(route('home'));
    }

    public function test_order_controller_implements_controller_interface()
    {
        $controller = new OrderController();

        $this->assertInstanceOf(ControllerInterface::class, $controller);
    }
}
