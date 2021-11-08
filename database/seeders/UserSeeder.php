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
        $user->name = "ยู";
        $user->email = "admin@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "Admin";
        $user->path = "public/images/ยู.png";
        $user->save();

        $user = new User();
        $user->name = "ลีน่า";
        $user->email = "lina@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "FrontWorker";
        $user->path = "public/images/ลีน่า.png";
        $user->save();

        $user = new User();
        $user->name = "ดิว";
        $user->email = "dew@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "FrontWorker";
        $user->path = "public/images/ดิว.png";
        $user->save();

        $user = new User();
        $user->name = "แพง";
        $user->email = "peang@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "BackWorker";
        $user->department_id = '2';
        $user->path = "public/images/แพง.png";
        $user->save();

        $user = new User();
        $user->name = "กิ่ง";
        $user->email = "ging@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "BackWorker";
        $user->department_id = '4';
        $user->path = "public/images/กิ่ง.png";
        $user->save();

        $user = new User();
        $user->name = "ไอซ์";
        $user->email = "ice@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "BackWorker";
        $user->department_id = '3';
        $user->path = "public/images/ไอซ์.png";
        $user->save();

        $user = new User();
        $user->name = "พนักงาน";
        $user->email = "backworker@res.com";
        $user->password = \Hash::make('12345678');
        $user->type = "BackWorker";
        $user->department_id = '5';
        $user->path = "public/images/workerDummy.jpg";
        $user->save();

//        for ($i=1; $i<=5; $i++){
//            User::factory(1)->create([
//                'email' => "worker{$i}@res.com"
//            ]);
//        }
    }
}
