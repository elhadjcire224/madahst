<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Boutique;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BoutiqueController
 */
class BoutiqueControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $boutiques = Boutique::factory()->count(3)->create();

        $response = $this->get(route('boutique.index'));

        $response->assertOk();
        $response->assertViewIs('boutique.index');
        $response->assertViewHas('boutiques');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('boutique.create'));

        $response->assertOk();
        $response->assertViewIs('boutique.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BoutiqueController::class,
            'store',
            \App\Http\Requests\BoutiqueStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $nom = $this->faker->word;
        $address = $this->faker->word;
        $tel = $this->faker->word;

        $response = $this->post(route('boutique.store'), [
            'nom' => $nom,
            'address' => $address,
            'tel' => $tel,
        ]);

        $boutiques = Boutique::query()
            ->where('nom', $nom)
            ->where('address', $address)
            ->where('tel', $tel)
            ->get();
        $this->assertCount(1, $boutiques);
        $boutique = $boutiques->first();

        $response->assertRedirect(route('boutique.index'));
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $boutique = Boutique::factory()->create();

        $response = $this->delete(route('boutique.destroy', $boutique));

        $response->assertRedirect(route('boutique.index'));

        $this->assertModelMissing($boutique);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BoutiqueController::class,
            'update',
            \App\Http\Requests\BoutiqueUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $boutique = Boutique::factory()->create();
        $nom = $this->faker->word;
        $address = $this->faker->word;
        $tel = $this->faker->word;

        $response = $this->put(route('boutique.update', $boutique), [
            'nom' => $nom,
            'address' => $address,
            'tel' => $tel,
        ]);

        $boutique->refresh();

        $response->assertRedirect(route('boutique.index'));

        $this->assertEquals($nom, $boutique->nom);
        $this->assertEquals($address, $boutique->address);
        $this->assertEquals($tel, $boutique->tel);
    }
}
