<?php

namespace App\Http\Controllers;

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

    }

    public function store()
    {

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
