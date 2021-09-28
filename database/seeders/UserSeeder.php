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
        $username = "admin";
        $type = "Admin";
        for ($i=0; $i<5; $i++){
            if ($i != 0){
                $username = "worker{$i}";
                $type = "Worker";
            }
            User::factory(1)->create([
                'username'=>$username,
                "type" => $type
            ]);
        }
    }
}
