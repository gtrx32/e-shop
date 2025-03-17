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

    public function cartItem()
    {
        return $this->hasOne(CartItem::class, 'product_id')
            ->where('user_id', auth()->id());
    }

    public function getCartDataAttribute()
    {
        return $this->cartItem ? [
            'quantity' => $this->cartItem->quantity,
            'cartItemId' => $this->cartItem->id
        ] : null;
    }
}
