<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Userable;
use Hash;

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
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'nom' => $this->faker->word,
            'prenom' => $this->faker->word,
            'password' => Hash::make('password'),
            'addresse' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'telephone' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'img_url' => $this->faker->word,
            'genre' => $this->faker->word,
            'nationalite' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'verified' => $this->faker->boolean,
            'dob' => $this->faker->date(),
            'userable_type' => $this->faker->word,
            
        ];
    }
}
