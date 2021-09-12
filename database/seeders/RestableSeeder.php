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
        Restable::factory(20)->create();
    }
}
