<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Particulier;

class ParticulierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Particulier::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'genre' => $this->faker->randomElement(["F","M"]),
            'telephone' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'email' => $this->faker->safeEmail,
            'BP' => $this->faker->numberBetween(-10000, 10000),
            'profession' => $this->faker->word,
            'adressse' => $this->faker->word,
        ];
    }
}
