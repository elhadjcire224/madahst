<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Formation;

class FormationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Formation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->word,
            'montant_inscription' => $this->faker->randomNumber(),
            'montant_frais' => $this->faker->randomNumber(),
            'date_debut' => $this->faker->dateTime(),
            'date_fin' => $this->faker->dateTime(),
            'description' => $this->faker->text,
        ];
    }
}
