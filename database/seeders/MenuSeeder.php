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
        $departments = Department::get();
        foreach ($departments as $department){
            Menu::factory(5)->create([
                'department_id' => $department->id
            ]);
        }
    }
}
