<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;

class CategoryController extends BaseController
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        $tree = $this->buildTree($categories);
        return Inertia::render('Categories/Index', [
            'categories' => $tree,
        ]);
    }

    private function buildTree($categories, $parentId = 0)
    {
        $branch = [];
        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $children = $this->buildTree($categories, $category->id);
                if ($children) {
                    $category->children = $children;
                }
                $branch[] = [
                    'id' => $category->id,
                    'label' => $category->name,
                    'icon' =>'restaurant_menu',
                    'children' => $category->children ?? []
                ];
            }
        }
        return $branch;
    }

    public function show($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return Inertia::render('Categories/Show', ['category' => $category]);
    }

    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->categoryService->createCategory($data);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return Inertia::render('Categories/Edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        $this->categoryService->updateCategory($id, $data);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
