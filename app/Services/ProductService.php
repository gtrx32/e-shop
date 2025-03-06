<?php

namespace App\Services;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class ProductService
{
    public function createProduct(array $data, StoreProductRequest $request): void
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image'] = $path;
        }

        Product::create($data);
    }
}