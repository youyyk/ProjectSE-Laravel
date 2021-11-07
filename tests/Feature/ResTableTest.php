<?php

namespace Tests\Feature;

use App\Models\Restable;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResTableTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_create_table()
    {
        $user = User::factory()->create([
            'email' => "test@res.com",
            'type' => "FrontWorker"
        ]);
        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => "12345678",
        ]);
        $response = $this->post(route('resTables.store'), [
            'name' => "resNumber",
        ]);
        $response->assertRedirect(route('showAllResTable'));
    }

    public function test_guest_can_not_create_table()
    {
        $response = $this->post(route('resTables.store'), [
            'name' => "resNumber",
        ]);
        $response->assertRedirect(route('login'));
    }

    public function test_can_get_table()
    {
        $user = User::factory()->create([
            'email' => "test@res.com",
            'type' => "FrontWorker"
        ]);
        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => "12345678",
        ]);
        $table = Restable::factory()->create([
            'name' => "resNumber"
        ]);
        $response = $this->get( '/resTables/' . $table->id );
        $response->assertSee( $table->name );
    }
}
