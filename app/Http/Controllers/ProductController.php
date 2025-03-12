<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;

class ProductController extends BaseController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return Inertia::render('Products/Index', ['products' => $products]);
    }

    public function show($id)
    {
        $product = $this->productService->getProductById($id);
        return Inertia::render('Products/Show', ['product' => $product]);
    }

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $this->productService->createProduct($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        return Inertia::render('Products/Edit', ['product' => $product]);
    }

    public function update(ProductRequest $request, $id): RedirectResponse
    {
        $this->productService->updateProduct($id, $request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
