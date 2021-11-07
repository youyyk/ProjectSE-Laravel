<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartmentTest extends TestCase
{   use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_create_department()
    {
        $user = User::factory()->create([
            'email' => "test@res.com",
            'type' => "Admin"
        ]);
        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => "12345678",
        ]);
        $response = $this->post(route('departments.store'), [
            'name' => "nameDepartment",
        ]);
        $response->assertRedirect(route('departments.index'));
    }

    public function test_worker_can_not_create_department()
    {
        $user = User::factory()->create([
            'email' => "test@res.com",
            'type' => "FrontWorker"
        ]);
        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => "12345678",
        ]);
        $response = $this->post(route('departments.store'), [
            'name' => "nameDepartment",
        ]);
        $response->assertStatus(401);
    }

    public function test_guest_can_not_create_department()
    {
        $response = $this->post(route('departments.store'), [
            'name' => "nameDepartment",
        ]);
        $response->assertRedirect(route('login'));
    }
}
