<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DepartmentSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RestableSeeder::class);
        $this->call(BillSeeder::class);
        $this->call(CartSeeder::class);

        $Bill = \App\Models\Bill::find(1);
        $Bill->menus()->attach(1);
        $Bill->menus()->attach(2);

        $Bill = \App\Models\Bill::find(3);
        $Bill->menus()->attach(3);
        $Bill->menus()->attach(4);

        $menu = \App\Models\Menu::find(5);
        $menu->bills()->attach(1);
        $menu->bills()->attach(3);

        $menu = \App\Models\Menu::find(1);
        $menu->carts()->attach(1);
        $menu->carts()->attach(3);

        $menu = \App\Models\Menu::find(2);
        $menu->carts()->attach(1);
        $menu->carts()->attach(3);
    }
}
