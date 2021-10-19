<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $menu = new Menu();
        $menu->name = 'เส้นเล็กน้ำตก';
        $menu->price = '35';
        $menu->processTime = '5';
        $menu->category = 'คาว';
        $menu->department_id = '2';
        $menu->path = "public/images/Boat_noodles.jpg";
        $menu->save();
        //2
        $menu = new Menu();
        $menu->name = 'ไอศกรีมช็อกโกแลต';
        $menu->price = '35';
        $menu->processTime = '3';
        $menu->category = 'หวาน';
        $menu->department_id = '4';
        $menu->path = "public/images/Icecream-ChocolateIcecream-104254.jpg";
        $menu->save();
        //3
        $menu = new Menu();
        $menu->name = 'ไอศกรีมชาเขียว';
        $menu->price = '35';
        $menu->processTime = '3';
        $menu->category = 'หวาน';
        $menu->department_id = '4';
        $menu->path = "public/images/Icecream-GreenTeaIcecream-104257.jpg";
        $menu->save();
        //4
        $menu = new Menu();
        $menu->name = 'ไอศกรีมมะม่วง';
        $menu->price = '35';
        $menu->processTime = '3';
        $menu->category = 'หวาน';
        $menu->department_id = '4';
        $menu->path = "public/images/Icecream-Mango-Icecream-100617.jpg";
        $menu->save();
        //5
        $menu = new Menu();
        $menu->name = 'ไอศกรีมสตอเบอร์รี่';
        $menu->price = '35';
        $menu->processTime = '3';
        $menu->category = 'หวาน';
        $menu->department_id = '4';
        $menu->path = "public/images/Icecream-StrawberrySherbetIcecream-104160.jpg";
        $menu->save();
        //6
        $menu = new Menu();
        $menu->name = 'ซุปมิโซะ';
        $menu->price = '25';
        $menu->processTime = '2';
        $menu->category = 'คาว';
        $menu->department_id = '3';
        $menu->path = "public/images/miso-soup.jpg";
        $menu->save();
        //7
        $menu = new Menu();
        $menu->name = 'กาแฟปั่น';
        $menu->price = '45';
        $menu->processTime = '5';
        $menu->category = 'เครื่องดื่ม';
        $menu->department_id = '5';
        $menu->path = "public/images/coffee-smoothie-4.jpg";
        $menu->save();
        //8
        $menu = new Menu();
        $menu->name = 'สตอเบอร์รี่ปั่น';
        $menu->price = '45';
        $menu->processTime = '5';
        $menu->category = 'เครื่องดื่ม';
        $menu->department_id = '5';
        $menu->path = "public/images/strawberry-smoothie.jpg";
        $menu->save();
        //9
        $menu = new Menu();
        $menu->name = 'น้ำเป๊ปซี่';
        $menu->price = '20';
        $menu->processTime = '2';
        $menu->category = 'เครื่องดื่ม';
        $menu->department_id = '5';
        $menu->path = "public/images/pepsi.jpg";
        $menu->save();
        //10
        $menu = new Menu();
        $menu->name = 'น้ำส้มแฟนต้า';
        $menu->price = '20';
        $menu->processTime = '2';
        $menu->category = 'เครื่องดื่ม';
        $menu->department_id = '5';
        $menu->path = "public/images/fanta.jpg";
        $menu->save();
        //11
        $menu = new Menu();
        $menu->name = 'น้ำสไปรท์';
        $menu->price = '20';
        $menu->processTime = '2';
        $menu->category = 'เครื่องดื่ม';
        $menu->department_id = '5';
        $menu->path = "public/images/sprite.jpg";
        $menu->save();
        //12
        $menu = new Menu();
        $menu->name = 'น้ำเปล่า';
        $menu->price = '10';
        $menu->processTime = '2';
        $menu->category = 'เครื่องดื่ม';
        $menu->department_id = '5';
        $menu->path = "public/images/WATER-BOTTLE.jpg";
        $menu->save();
        //13
        $menu = new Menu();
        $menu->name = 'สปาเก็ตตี้';
        $menu->price = '55';
        $menu->processTime = '5';
        $menu->category = 'คาว';
        $menu->department_id = '3';
        $menu->path = "public/images/pizzasgetti.jpeg";
        $menu->save();
        //14
        $menu = new Menu();
        $menu->name = 'สเต็กเนื้อริบอาย';
        $menu->price = '205';
        $menu->processTime = '15';
        $menu->category = 'คาว';
        $menu->department_id = '3';
        $menu->path = "public/images/rib-eye_steak_with_61963_16x9.jpg";
        $menu->save();
        //15
        $menu = new Menu();
        $menu->name = 'ทาโก้เนื้อ';
        $menu->price = '75';
        $menu->processTime = '10';
        $menu->category = 'คาว';
        $menu->department_id = '3';
        $menu->path = "public/images/taco.jpeg";
        $menu->save();
        //16
        $menu = new Menu();
        $menu->name = 'ต้มยำกุ้ง';
        $menu->price = '85';
        $menu->processTime = '10';
        $menu->category = 'คาว';
        $menu->department_id = '2';
        $menu->path = "public/images/tom yum.jpeg";
        $menu->save();
        //17
        $menu = new Menu();
        $menu->name = 'ปลานิลย่าง';
        $menu->price = '65';
        $menu->processTime = '10';
        $menu->category = 'คาว';
        $menu->department_id = '2';
        $menu->path = "public/images/whole-tillapia-fish-grill-scaled.jpg";
        $menu->save();
        //18
        $menu = new Menu();
        $menu->name = 'ข้าว';
        $menu->price = '10';
        $menu->processTime = '2';
        $menu->category = 'คาว';
        $menu->department_id = '2';
        $menu->path = "public/images/rice.jpg";
        $menu->save();

//        $departments = Department::get();
//        foreach ($departments as $department){
//            Menu::factory(5)->create([
//                'department_id' => $department->id
//            ]);
//        }
    }
}
