<?php

namespace Database\Seeders;

use App\Models\Restable;
use Illuminate\Database\Seeder;

class RestableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $takeAway = new Restable();
        $takeAway->name = "Take Away";
        $takeAway->status = true;
        $takeAway->save();

        for ($i=1; $i<=10; $i++){
            Restable::factory(1)->create([
                'name' => "A{$i}"
            ]);
        }
    }
}
