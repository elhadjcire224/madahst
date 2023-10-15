<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Owner;
use App\Models\Projet;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProjetController
 */
class ProjetControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $projets = Projet::factory()->count(3)->create();

        $response = $this->get(route('projet.index'));

        $response->assertOk();
        $response->assertViewIs('projet.index');
        $response->assertViewHas('projets');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('projet.create'));

        $response->assertOk();
        $response->assertViewIs('projet.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjetController::class,
            'store',
            \App\Http\Requests\ProjetStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $nom = $this->faker->word;
        $date_debut = $this->faker->date();
        $date_fin = $this->faker->date();
        $cout_global = $this->faker->numberBetween(-10000, 10000);
        $bilan = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->word;
        $owner_type = $this->faker->word;
        $owner = Owner::factory()->create();

        $response = $this->post(route('projet.store'), [
            'nom' => $nom,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'cout_global' => $cout_global,
            'bilan' => $bilan,
            'status' => $status,
            'owner_type' => $owner_type,
            'owner_id' => $owner->id,
        ]);

        $projets = Projet::query()
            ->where('nom', $nom)
            ->where('date_debut', $date_debut)
            ->where('date_fin', $date_fin)
            ->where('cout_global', $cout_global)
            ->where('bilan', $bilan)
            ->where('status', $status)
            ->where('owner_type', $owner_type)
            ->where('owner_id', $owner->id)
            ->get();
        $this->assertCount(1, $projets);
        $projet = $projets->first();

        $response->assertRedirect(route('projet.index'));
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $projet = Projet::factory()->create();

        $response = $this->delete(route('projet.destroy', $projet));

        $response->assertRedirect(route('projet.index'));

        $this->assertModelMissing($projet);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjetController::class,
            'update',
            \App\Http\Requests\ProjetUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $projet = Projet::factory()->create();
        $nom = $this->faker->word;
        $date_debut = $this->faker->date();
        $date_fin = $this->faker->date();
        $cout_global = $this->faker->numberBetween(-10000, 10000);
        $bilan = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->word;
        $owner_type = $this->faker->word;
        $owner = Owner::factory()->create();

        $response = $this->put(route('projet.update', $projet), [
            'nom' => $nom,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'cout_global' => $cout_global,
            'bilan' => $bilan,
            'status' => $status,
            'owner_type' => $owner_type,
            'owner_id' => $owner->id,
        ]);

        $projet->refresh();

        $response->assertRedirect(route('projet.index'));

        $this->assertEquals($nom, $projet->nom);
        $this->assertEquals(Carbon::parse($date_debut), $projet->date_debut);
        $this->assertEquals(Carbon::parse($date_fin), $projet->date_fin);
        $this->assertEquals($cout_global, $projet->cout_global);
        $this->assertEquals($bilan, $projet->bilan);
        $this->assertEquals($status, $projet->status);
        $this->assertEquals($owner_type, $projet->owner_type);
        $this->assertEquals($owner->id, $projet->owner_id);
    }
}
