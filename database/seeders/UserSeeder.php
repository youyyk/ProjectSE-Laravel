<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "Administrator";
        $admin->email = "admin@res.com";
        $admin->password = \Hash::make('123456');
        $admin->type = "Admin";
        $admin->save();

        for ($i=1; $i<=5; $i++){
            User::factory(1)->create([
                'email' => "worker{$i}@res.com"
            ]);
        }
    }
}
