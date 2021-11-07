<?php

namespace Tests\Feature;

use app\models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_users_can_not_login_by_wrong_password()
    {
        $user = User::factory()->create([
            'email' => "test@res.com",
        ]);
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
        $this->assertGuest();
    }

    public function test_guest_cannot_access_charts_day(){
        $response = $this->get(route("charts.day"));
        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_auth_user_can_access_charts_day(){
        $user = User::factory()->create([
            'email' => "test@res.com",
            'type' => "Admin"
        ]);
        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => "12345678",
        ]);
        $this->assertAuthenticated();
        $response = $this->get(route("charts.day"));
        $response->assertStatus(200);
    }
}
