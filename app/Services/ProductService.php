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
        if ($request->has('delete-old-image') && $request->input('delete-old-image') === 'on') {
            $this->deleteImageFromDisk($product);
            $data['image'] = null;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request);
        }

        $product->update($data);
    }

    public function deleteProduct(Product $product)
    {
        $this->deleteImageFromDisk($product);

        $product->delete();
    }

    private function storeImage(ProductRequest $request): string
    {
        return $request->file('image')->store('images', 'public');
    }

    private function deleteImageFromDisk(Product $product): void
    {
        if ($product->image) {
            if (Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
        }
    }
}