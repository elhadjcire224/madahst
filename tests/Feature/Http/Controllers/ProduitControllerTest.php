<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProduitController
 */
class ProduitControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $produits = Produit::factory()->count(3)->create();

        $response = $this->get(route('produit.index'));

        $response->assertOk();
        $response->assertViewIs('produit.index');
        $response->assertViewHas('produits');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('produit.create'));

        $response->assertOk();
        $response->assertViewIs('produit.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProduitController::class,
            'store',
            \App\Http\Requests\ProduitStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $nom = $this->faker->word;
        $category = Category::factory()->create();
        $stock_id = $this->faker->word;
        $pau = $this->faker->numberBetween(-10000, 10000);
        $pvu = $this->faker->numberBetween(-10000, 10000);
        $remise = $this->faker->numberBetween(-10000, 10000);
        $img_url = $this->faker->word;

        $response = $this->post(route('produit.store'), [
            'nom' => $nom,
            'category_id' => $category->id,
            'stock_id' => $stock_id,
            'pau' => $pau,
            'pvu' => $pvu,
            'remise' => $remise,
            'img_url' => $img_url,
        ]);

        $produits = Produit::query()
            ->where('nom', $nom)
            ->where('category_id', $category->id)
            ->where('stock_id', $stock_id)
            ->where('pau', $pau)
            ->where('pvu', $pvu)
            ->where('remise', $remise)
            ->where('img_url', $img_url)
            ->get();
        $this->assertCount(1, $produits);
        $produit = $produits->first();

        $response->assertRedirect(route('produit.index'));
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $produit = Produit::factory()->create();

        $response = $this->delete(route('produit.destroy', $produit));

        $response->assertRedirect(route('produit.index'));

        $this->assertModelMissing($produit);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProduitController::class,
            'update',
            \App\Http\Requests\ProduitUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $produit = Produit::factory()->create();
        $nom = $this->faker->word;
        $category = Category::factory()->create();
        $stock_id = $this->faker->word;
        $pau = $this->faker->numberBetween(-10000, 10000);
        $pvu = $this->faker->numberBetween(-10000, 10000);
        $remise = $this->faker->numberBetween(-10000, 10000);
        $img_url = $this->faker->word;

        $response = $this->put(route('produit.update', $produit), [
            'nom' => $nom,
            'category_id' => $category->id,
            'stock_id' => $stock_id,
            'pau' => $pau,
            'pvu' => $pvu,
            'remise' => $remise,
            'img_url' => $img_url,
        ]);

        $produit->refresh();

        $response->assertRedirect(route('produit.index'));

        $this->assertEquals($nom, $produit->nom);
        $this->assertEquals($category->id, $produit->category_id);
        $this->assertEquals($stock_id, $produit->stock_id);
        $this->assertEquals($pau, $produit->pau);
        $this->assertEquals($pvu, $produit->pvu);
        $this->assertEquals($remise, $produit->remise);
        $this->assertEquals($img_url, $produit->img_url);
    }
}
