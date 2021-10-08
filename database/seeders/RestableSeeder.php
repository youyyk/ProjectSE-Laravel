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
        for ($i=0; $i<10; $i++) {
            Restable::factory(1)->create([
            'name' => "A{$i}"
            ]);
        }
    }
}
