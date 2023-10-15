<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Entrepise;

class EntrepiseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entrepise::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'website_url' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'telephone' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'email' => $this->faker->safeEmail,
            'BP' => $this->faker->numberBetween(-10000, 10000),
            'secteur_activite' => $this->faker->word,
            'siege' => $this->faker->word,
        ];
    }
}
