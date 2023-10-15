<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Employe;

class CommandeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Commande::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'employe_id' => Employe::factory(),
            'client_id' => Client::factory(),
            'emmission_date' => $this->faker->dateTime(),
        ];
    }
}
