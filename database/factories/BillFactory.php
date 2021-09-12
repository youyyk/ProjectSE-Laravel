<?php

namespace Database\Factories;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total' => $this->faker->numberBetween(100,1000),
            'date_time' => $this->faker->dateTimeBetween('-15 days', '+15 days')
                    ->format('Y-m-d H:i:s'),
            'status' => $this->faker->boolean(),
        ];
    }
}
