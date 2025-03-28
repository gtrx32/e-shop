<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'price'
    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function userCartItems()
    {
        return $this->hasMany(CartItem::class)->where('cart_id', auth()->user()->cart->id);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
