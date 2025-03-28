<div class="flex flex-col gap-3">
    @foreach ($orders as $order)
        <div class="shadow-lg rounded-lg">
            <h2>{{ $order->id }}: {{ $order->status }}</h2>
            @foreach ($order->orderItems as $orderItem)
                <div>{{ $orderItem->product->id }}</div>
                <div>{{ $orderItem->product->name }}</div>
                <div>{{ $orderItem->product->description }}</div>
                <div>{{ $orderItem->product->price }}</div>
                <div>{{ $orderItem->product->image }}</div>
            @endforeach
        </div>
    @endforeach
</div>
