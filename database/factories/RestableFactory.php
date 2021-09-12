<?php

namespace Database\Factories;

use App\Models\Restable;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->boolean(),
        ];
    }
}
