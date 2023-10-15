<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Boutique;
use App\Models\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StockController
 */
class StockControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $stocks = Stock::factory()->count(3)->create();

        $response = $this->get(route('stock.index'));

        $response->assertOk();
        $response->assertViewIs('stock.index');
        $response->assertViewHas('stocks');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('stock.create'));

        $response->assertOk();
        $response->assertViewIs('stock.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StockController::class,
            'store',
            \App\Http\Requests\StockStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $boutique = Boutique::factory()->create();
        $quantite = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('stock.store'), [
            'boutique_id' => $boutique->id,
            'quantite' => $quantite,
        ]);

        $stocks = Stock::query()
            ->where('boutique_id', $boutique->id)
            ->where('quantite', $quantite)
            ->get();
        $this->assertCount(1, $stocks);
        $stock = $stocks->first();

        $response->assertRedirect(route('stock.index'));
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $stock = Stock::factory()->create();

        $response = $this->delete(route('stock.destroy', $stock));

        $response->assertRedirect(route('stock.index'));

        $this->assertModelMissing($stock);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StockController::class,
            'update',
            \App\Http\Requests\StockUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $stock = Stock::factory()->create();
        $boutique = Boutique::factory()->create();
        $quantite = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('stock.update', $stock), [
            'boutique_id' => $boutique->id,
            'quantite' => $quantite,
        ]);

        $stock->refresh();

        $response->assertRedirect(route('stock.index'));

        $this->assertEquals($boutique->id, $stock->boutique_id);
        $this->assertEquals($quantite, $stock->quantite);
    }
}
