<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Restable;
use App\Models\User;
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
        $user = User::get()->find(1);
        foreach ($restables as $restable){
            Bill::factory(2)->create([
                'user_id' => $user->id,
                'restable_id' => $restable->id,
            ]);
        }
    }
}
