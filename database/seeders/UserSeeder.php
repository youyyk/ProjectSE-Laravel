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
        $user = new User();
        $user->name = "You Yutithorn";
        $user->email = "admin@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "Admin";
        $user->save();

        $user = new User();
        $user->name = "Lina Yosita";
        $user->email = "lina@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "FrontWorker";
        $user->save();

        $user = new User();
        $user->name = "Dew Wanida";
        $user->email = "dew@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "FrontWorker";
        $user->save();

        $user = new User();
        $user->name = "Peang Nichanan";
        $user->email = "peang@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "BackWorker";
        $user->save();

        $user = new User();
        $user->name = "Ging Kanta";
        $user->email = "ging@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "BackWorker";
        $user->save();

//        for ($i=1; $i<=5; $i++){
//            User::factory(1)->create([
//                'email' => "worker{$i}@res.com"
//            ]);
//        }
    }
}
