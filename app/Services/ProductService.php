<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function createProduct(array $data, ProductRequest $request): void
    {
        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request);
        }

        Product::create($data);
    }

    public function updateProduct(Product $product, array $data, ProductRequest $request): void
    {
        if ($request->hasFile('image')) {
            if ($product->image) {
                $this->deleteOldImage($product->image);
            }

            $data['image'] = $this->storeImage($request);
        }

        $product->update($data);
    }

    private function storeImage(ProductRequest $request): string
    {
        return $request->file('image')->store('images', 'public');
    }

    private function deleteOldImage(string $imagePath): void
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }
}