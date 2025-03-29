<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Http\Requests\OrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('orderItems.product')->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $cart = auth()->user()->cart()->with('cartItems.product')->first();

        $payment_methods = PaymentMethod::values();

        $statuses = OrderStatus::values();

        return view('orders.create', compact('cart', 'payment_methods', 'statuses'));
    }

    public function store(OrderRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();

        $order = Order::create([
            'user_id' => $user->id,
            'phone' => $data['phone'],
            'delivery_address' => $data['delivery_address'],
            'price' => $user->cart->price,
            'payment_method' => $data['payment_method'],
        ]);

        $user->cart->delete();

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Заказ успешно оформлен!');
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->user()->id) {
            abort(403, 'Вы не можете просматривать этот заказ.');
        }

        $order->load('orderItems.product');

        return view('orders.show', compact('order'));
    }


    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
