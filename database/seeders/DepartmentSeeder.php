<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = new Department();
        $department->name = "ไม่มีแผนก";
        $department->save();

        $department = new Department();
        $department->name = "ขนมหวาน";
        $department->save();

        $department = new Department();
        $department->name = "อาหารคาว";
        $department->save();

        $department = new Department();
        $department->name = "เครื่องดื่ม";
        $department->save();
//        Department::factory(5)->create();
    }
}
