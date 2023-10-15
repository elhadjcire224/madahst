<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Produit;
use App\Models\Stock;

class ProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produit::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'category_id' => Category::factory(),
            'stock_id' => Stock::factory(),
            'pau' => $this->faker->randomNumber(),
            'pvu' => $this->faker->randomNumber(),
            'remise' => $this->faker->randomNumber(),
            'img_url' => $this->faker->word,
        ];
    }
}
