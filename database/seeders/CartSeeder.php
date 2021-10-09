<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Restable;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restables = Restable::get();
        foreach ($restables as $restable){
            Cart::factory(1)->create([
                'restable_id' => "$restable->id"
            ]);
        }
    }
}
