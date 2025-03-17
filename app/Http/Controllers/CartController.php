<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->cartItems()->with('product')->get();

        return view('pages.cart', compact('cartItems'));
    }

    public function add(Request $request, $productId)
    {
        $cartItem = CartItem::firstOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $productId]
        );

        $cartItem->increment('quantity');

        return back()->with('success', 'Товар добавлен в корзину.');
    }

    public function update(Request $request, Product $product)
    {
        $user = auth()->user();

        $cartItem = $user->cartItems()->where('product_id', $product->id)->first();

        if ($request->action == 'increase') {
            $cartItem->increment('quantity');
        } elseif ($request->action == 'decrease') {
            $cartItem->quantity > 1 ? $cartItem->decrement('quantity') : $cartItem->delete();
        }

        return back()->with('success', 'Количество товара обновлено.');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();

        return back()->with('success', 'Товар удалён из корзины.');
    }
}
