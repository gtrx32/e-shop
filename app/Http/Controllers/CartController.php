<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        $cartItem = CartItem::firstOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $productId]
        );

        $cartItem->increment('quantity');

        return back()->with('success', 'Товар добавлен в корзину.');
    }
}
