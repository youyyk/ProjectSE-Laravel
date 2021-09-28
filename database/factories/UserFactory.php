<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'username' => $this->faker->userName(),
//            'password' => $this->faker->password(5,10),
            'name' => $this->faker->name(),
            'type' => $this->faker->randomElement(['Admin','Worker']),
            'last_login' => $this->faker->dateTimeBetween('-15 days', '+15 days')
                ->format('Y-m-d H:i:s')
        ];
    }
}
