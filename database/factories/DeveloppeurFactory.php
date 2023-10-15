<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Developpeur;
use App\Models\User;

class DeveloppeurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Developpeur::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'specialite' => $this->faker->word,
            'user_id' => User::factory(),
            'is_instructor' => $this->faker->boolean,
        ];
    }
}
