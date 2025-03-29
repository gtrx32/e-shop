<div class="p-8 bg-white shadow sm:rounded-lg">
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div>
                <h3 class="text-xl font-semibold mb-4">Ваши товары</h3>
                @if ($cart->cartItems->isEmpty())
                    <p class="text-gray-500">Ваша корзина пуста.</p>
                @else
                    <div class="space-y-4">
                        @foreach ($cart->cartItems as $cartItem)
                            <div class="flex items-center justify-between border-b pb-4">
                                <div class="flex items-center space-x-4">
                                    @if ($cartItem->product->image)
                                        <img src="{{ asset('storage/' . $cartItem->product->image) }}"
                                            alt="{{ $cartItem->product->name }}" class="w-16 h-16 object-cover rounded">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 rounded"></div>
                                    @endif
                                    <div>
                                        <p class="font-semibold">{{ $cartItem->product->name }}</p>
                                        <p class="text-gray-500">
                                            {{ $cartItem->quantity }} x {{ $cartItem->product->price }} ₽
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    {{ $cartItem->product->price * $cartItem->quantity }} ₽
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="flex justify-between items-center mt-6 border-t pt-4">
                    <p class="font-semibold text-lg">Итого:</p>
                    <p class="text-xl">{{ $cart->price }} ₽</p>
                </div>
            </div>
        </div>
    </form>
</div>
