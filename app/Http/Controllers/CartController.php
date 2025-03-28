<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart()->with('cartItems.product')->first();

        return view('cart.index', compact('cart'));
    }

    public function addItem(Request $request, Product $product)
    {
        $cart = auth()->user()->cart()->firstOrCreate([]);

        $cartItem = CartItem::firstOrCreate(
            ['cart_id' => $cart->id, 'product_id' => $product->id]
        );

        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }

        $cart->updatePrice();

        return back()->with('success', 'Товар добавлен в корзину.');
    }

    public function updateItem(Request $request, CartItem $cartItem)
    {
        $cart = $cartItem->cart;

        if ($request->action == 'increase') {
            $cartItem->increment('quantity');
        } elseif ($request->action == 'decrease') {
            $cartItem->quantity > 1 ? $cartItem->decrement('quantity') : $cartItem->delete();
        }

        $cart->updatePrice();

        return back()->with('success', 'Количество товара обновлено.');
    }

    public function removeItem(CartItem $cartItem)
    {
        $cart = $cartItem->cart;

        $cartItem->delete();

        $cart->updatePrice();

        return back()->with('success', 'Товар удалён из корзины.');
    }
}
