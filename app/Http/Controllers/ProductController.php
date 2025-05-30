<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(6);

        $user = auth()->user();

        $cart = $user ? $user->cart : null;

        $cartItems = $cart ? $cart->cartItems->keyBy('product_id') : collect();

        return view('products.index', compact('products', 'cartItems'));
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
    public function store(ProductRequest $request, ProductService $productService): RedirectResponse
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
        $user = auth()->user();

        $cart = $user ? $user->cart : null;

        $cartItem = $cart ? $cart->cartItems()->where('product_id', $product->id)->first() : null;

        return view('products.show', compact('product', 'cartItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        session(['previous_url' => url()->previous()]);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, ProductService $productService, Product $product): RedirectResponse
    {
        $data = $request->validated();

        $productService->updateProduct($product, $data, $request);

        $previousUrl = session('previous_url', route('products.index'));

        return redirect($previousUrl)->with('success', 'Товар успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductService $productService): RedirectResponse
    {
        $productService->deleteProduct($product);

        return redirect()->route('products.index')->with('success', 'Товар успешно удален.');
    }
}
