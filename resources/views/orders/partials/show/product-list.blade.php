<div class="p-8 bg-white shadow sm:rounded-lg">
    <!-- Секция с товарами -->
    <div class="space-y-6">
        <h3 class="text-xl font-semibold mb-4">Ваши товары</h3>
        @if ($order->orderItems->isEmpty())
            <p class="text-gray-500">Товары не найдены.</p>
        @else
            <div class="space-y-4">
                @foreach ($order->orderItems as $orderItem)
                    <div class="flex items-center justify-between border-b pb-4">
                        <div class="flex items-center space-x-4">
                            @if ($orderItem->product->image)
                                <img src="{{ asset('storage/' . $orderItem->product->image) }}"
                                    alt="{{ $orderItem->product->name }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <div class="w-16 h-16 bg-gray-200 rounded"></div>
                            @endif
                            <div>
                                <p class="font-semibold">{{ $orderItem->product->name }}</p>
                                <p class="text-gray-500">
                                    {{ $orderItem->quantity }} x {{ $orderItem->product->price }} ₽
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            {{ $orderItem->product->price * $orderItem->quantity }} ₽
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="flex justify-between items-center mt-6 border-t pt-4">
            <p class="font-semibold text-lg">Итого:</p>
            <p class="text-xl">{{ $order->price }} ₽</p>
        </div>
    </div>

</div>
