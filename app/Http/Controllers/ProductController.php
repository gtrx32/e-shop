<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, ProductService $productService): RedirectResponse
    {
        $data = $request->validated();

        $productService->createProduct($data, $request);

        return redirect()->route('products.index')->with('success', 'Товар успешно добавлен.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        return redirect()->route('products.index'); // ->with ?
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductService $productService): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Товар успешно удален.');
    }
}
