<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Commande;
use App\Models\Detail;

class DetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Detail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'commande_id' => Commande::factory(),
            'quantite' => $this->faker->randomNumber(),
        ];
    }
}
