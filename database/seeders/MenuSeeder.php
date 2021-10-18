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
        $menu = new Menu();
        $menu->name = 'เส้นเล็กน้ำตก';
        $menu->price = '35';
        $menu->processTime = '5';
        $menu->category = 'Dish';
        $menu->department_id = '3';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'ไอศกรีมช็อกโกแลต';
        $menu->price = '35';
        $menu->processTime = '3';
        $menu->category = 'Dessert';
        $menu->department_id = '2';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'ไอศกรีมชาเขียว';
        $menu->price = '35';
        $menu->processTime = '3';
        $menu->category = 'Dessert';
        $menu->department_id = '2';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'ไอศกรีมมะม่วง';
        $menu->price = '35';
        $menu->processTime = '3';
        $menu->category = 'Dessert';
        $menu->department_id = '2';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'ไอศกรีมสตอเบอร์รี่';
        $menu->price = '35';
        $menu->processTime = '3';
        $menu->category = 'Dessert';
        $menu->department_id = '2';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'ซุปมิโซะ';
        $menu->price = '45';
        $menu->processTime = '2';
        $menu->category = 'Dish';
        $menu->department_id = '4';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'กาแฟปั่น';
        $menu->price = '45';
        $menu->processTime = '3';
        $menu->category = 'Dessert';
        $menu->department_id = '4';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'สตอเบอร์รี่ปั่น';
        $menu->price = '45';
        $menu->processTime = '3';
        $menu->category = 'Dessert';
        $menu->department_id = '4';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'เป๊ปซี่';
        $menu->price = '20';
        $menu->processTime = '2';
        $menu->category = 'Dessert';
        $menu->department_id = '4';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'น้ำส้มแฟนต้า';
        $menu->price = '20';
        $menu->processTime = '2';
        $menu->category = 'Dessert';
        $menu->department_id = '4';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'น้ำสไปรท์';
        $menu->price = '20';
        $menu->processTime = '2';
        $menu->category = 'Dessert';
        $menu->department_id = '4';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'น้ำเปล่า';
        $menu->price = '10';
        $menu->processTime = '2';
        $menu->category = 'Dessert';
        $menu->department_id = '4';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'สปาเก็ตตี้';
        $menu->price = '55';
        $menu->processTime = '5';
        $menu->category = 'Dish';
        $menu->department_id = '3';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'สเต็กเนื้อริบอาย';
        $menu->price = '205';
        $menu->processTime = '15';
        $menu->category = 'Dish';
        $menu->department_id = '3';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'ทาโก้เนื้อ';
        $menu->price = '75';
        $menu->processTime = '10';
        $menu->category = 'Dish';
        $menu->department_id = '3';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'ต้มยำกุ้ง';
        $menu->price = '85';
        $menu->processTime = '10';
        $menu->category = 'Dish';
        $menu->department_id = '3';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'ข้าวผัด';
        $menu->price = '55';
        $menu->processTime = '10';
        $menu->category = 'Dish';
        $menu->department_id = '3';
        $menu->save();

        $menu = new Menu();
        $menu->name = 'ปลานิลย่าง';
        $menu->price = '65';
        $menu->processTime = '10';
        $menu->category = 'Dish';
        $menu->department_id = '3';
        $menu->save();

//        $departments = Department::get();
//        foreach ($departments as $department){
//            Menu::factory(5)->create([
//                'department_id' => $department->id
//            ]);
//        }
    }
}
