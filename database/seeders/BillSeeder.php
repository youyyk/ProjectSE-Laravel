<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Restable;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
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
            Bill::factory(5)->create([
                'restable_id' => $restable->id
            ]);
        }
    }
}
