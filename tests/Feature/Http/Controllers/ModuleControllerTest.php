<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ModuleController
 */
class ModuleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $modules = Module::factory()->count(3)->create();

        $response = $this->get(route('module.index'));

        $response->assertOk();
        $response->assertViewIs('module.index');
        $response->assertViewHas('modules');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('module.create'));

        $response->assertOk();
        $response->assertViewIs('module.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ModuleController::class,
            'store',
            \App\Http\Requests\ModuleStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $description = $this->faker->text;
        $nom = $this->faker->word;
        $date_debut = $this->faker->date();
        $date_fin = $this->faker->date();

        $response = $this->post(route('module.store'), [
            'description' => $description,
            'nom' => $nom,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
        ]);

        $modules = Module::query()
            ->where('description', $description)
            ->where('nom', $nom)
            ->where('date_debut', $date_debut)
            ->where('date_fin', $date_fin)
            ->get();
        $this->assertCount(1, $modules);
        $module = $modules->first();

        $response->assertRedirect(route('module.index'));
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $module = Module::factory()->create();

        $response = $this->delete(route('module.destroy', $module));

        $response->assertRedirect(route('module.index'));

        $this->assertModelMissing($module);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ModuleController::class,
            'update',
            \App\Http\Requests\ModuleUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $module = Module::factory()->create();
        $description = $this->faker->text;
        $nom = $this->faker->word;
        $date_debut = $this->faker->date();
        $date_fin = $this->faker->date();

        $response = $this->put(route('module.update', $module), [
            'description' => $description,
            'nom' => $nom,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
        ]);

        $module->refresh();

        $response->assertRedirect(route('module.index'));

        $this->assertEquals($description, $module->description);
        $this->assertEquals($nom, $module->nom);
        $this->assertEquals(Carbon::parse($date_debut), $module->date_debut);
        $this->assertEquals(Carbon::parse($date_fin), $module->date_fin);
    }
}
