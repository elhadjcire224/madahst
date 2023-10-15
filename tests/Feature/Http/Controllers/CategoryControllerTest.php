<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Categorie;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CategoryController
 */
class CategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $categories = Category::factory()->count(3)->create();

        $response = $this->get(route('category.index'));

        $response->assertOk();
        $response->assertViewIs('categorie.index');
        $response->assertViewHas('categories');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('category.create'));

        $response->assertOk();
        $response->assertViewIs('categorie.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CategoryController::class,
            'store',
            \App\Http\Requests\CategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $libelle = $this->faker->word;
        $description = $this->faker->text;

        $response = $this->post(route('category.store'), [
            'libelle' => $libelle,
            'description' => $description,
        ]);

        $categories = Categorie::query()
            ->where('libelle', $libelle)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $categories);
        $category = $categories->first();

        $response->assertRedirect(route('categorie.index'));
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $category = Category::factory()->create();
        $category = Categorie::factory()->create();

        $response = $this->delete(route('category.destroy', $category));

        $response->assertRedirect(route('categorie.index'));

        $this->assertModelMissing($category);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CategoryController::class,
            'update',
            \App\Http\Requests\CategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $category = Category::factory()->create();
        $libelle = $this->faker->word;
        $description = $this->faker->text;

        $response = $this->put(route('category.update', $category), [
            'libelle' => $libelle,
            'description' => $description,
        ]);

        $category->refresh();

        $response->assertRedirect(route('categorie.index'));

        $this->assertEquals($libelle, $category->libelle);
        $this->assertEquals($description, $category->description);
    }
}
