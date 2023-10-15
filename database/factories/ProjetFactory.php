<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Owner;
use App\Models\Projet;

class ProjetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Projet::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'cout_global' => $this->faker->randomNumber(),
            'bilan' => $this->faker->randomNumber(),
            'status' => $this->faker->word,
            'owner_type' => $this->faker->word,
            'owner_id' => Owner::factory(),
        ];
    }
}
