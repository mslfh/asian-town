<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCategoriesTree()
    {
        // Arrange
        $parentCategory = Category::factory()->create();
        $childCategory = Category::factory()->create(['parent_id' => $parentCategory->id]);
        $categories = Category::all();
        $categoryService = $this->createMock(CategoryService::class);
        $categoryService->method('getAllCategories')->willReturn($categories);
        $this->app->instance(CategoryService::class, $categoryService);

        // Act
        $response = $this->get(route('categories.index'));
        // Print the categories tree for debugging
        $categoriesTree = $response->original->getData()['categories'];
        print_r($categoriesTree);

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(fn ($page) => $page
            ->component('Categories/Index')
            ->where('categories', [
                [
                    'id' => $parentCategory->id,
                    'label' => $parentCategory->name,
                    'children' => [
                        [
                            'id' => $childCategory->id,
                            'label' => $childCategory->name,
                            'children' => []
                        ]
                    ]
                ]
            ])
        );
    }
}
