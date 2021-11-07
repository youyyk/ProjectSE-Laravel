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
            'name' => $this->faker->name(),
            'email_verified_at' => now(),
            'password' => \Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'type' => $this->faker->randomElement(['FrontWorker','BackWorker']),
            'last_login' => $this->faker->dateTimeBetween('-15 days', '+15 days')
                ->format('Y-m-d H:i:s')
        ];
    }
}
