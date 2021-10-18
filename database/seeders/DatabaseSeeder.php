<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Menu;
use App\Models\Restable;
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

        $bills = \App\Models\Bill::get();
        $menus = \App\Models\Menu::get();
        foreach($bills as $bill) {
            $total = 0;
            $numMenu = rand(3,6);
            for($i = 1; $i <= $numMenu; $i++) {
                $menuId = rand(1,count($menus));
                $bill->menus()->attach($menuId);
                $bill->menus()->updateExistingPivot($menuId, ['status'=>'finish']);
                $total += $menus[$menuId-1]->price;
            }
            $bill->total = $total;
            $bill->status = false;
            $bill->paid = false;
            $bill->save();
        }

        $this->newBill(1,2, [1,2],0);
        $this->newBill(1,3, [13,15,7],0);
        $this->newBill(1,2, [6,16,17,2,18],0);

        $this->newBill(3,3, [18,9,13],1);
        $this->newBill(3,3, [16,14],0);

        $this->newBill(5,2, [14,12],1);
        $this->newBill(2,3, [2,3],1);
        $this->newBill(4,2, [15,12],1);
        $this->newBill(10,3, [8,5,12],1);
        $this->newBill(6,2, [1,3,7],1);

    }

    public static function newBill($resTableId,$userId,$menuIdList,$type){
        if ($type == 1) {
            $type = "EatIn";
        }
        else {
            $type = "TakeAway";
        }
        $bill = new Bill();
        $bill->restable_id = $resTableId;
        $bill->user_id = $userId;
        $bill->type = $type;
        $bill->total = 0;
        $bill->save();

        $total=0;
        foreach ($menuIdList as $menuId){
            $bill->menus()->attach($menuId);
            $menu = Menu::findOrFail($menuId);
            $total += $menu->price;
        }
        $bill->total = $total;
        $bill->save();

        $resTable = Restable::findOrFail($resTableId);
        $resTable->status = 0;
        $resTable->save();
    }
}
