<div class="flex flex-col md:flex-row gap-6">
    <div class="w-full md:w-2/4">
        <img src="{{ asset($product->image ? 'storage/' . $product->image : 'https://imgholder.ru/600x300/8493a8/adb9ca&text=IMAGE&font=kelson') }}"
            alt="{{ $product->name }}" class="w-full h-80 object-cover rounded-lg shadow-md">
    </div>
    <div class="flex-1 flex flex-col gap-8">
        <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
        <div class="text-2xl font-semibold text-gray-900">
            {{ number_format($product->price, 2) }} ₽
        </div>
        @if ($cartItem)
            <div class="flex items-center space-x-1">
                <x-ui.link.secondary href="{{ route('cart.index') }}" class="text-sm text-gray-700 whitespace-nowrap">
                    В корзине: {{ $cartItem->quantity }}
                </x-ui.link.secondary>
                <form action="{{ route('cart.update', $cartItem->id) }}" method="POST" class="flex items-center">
                    @csrf
                    @method('PUT')
                    <x-ui.button.secondary type="submit" name="action" value="increase"
                        class="text-sm">+</x-ui.button.secondary>
                    <x-ui.button.secondary type="submit" name="action" value="decrease"
                        class="text-sm ml-1">-</x-ui.button.secondary>
                </form>
                <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-ui.button.danger type="submit">
                        &times;
                    </x-ui.button.danger>
                </form>
            </div>
        @else
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <x-ui.button.primary type="submit" class="text-sm">
                    В корзину
                </x-ui.button.primary>
            </form>
        @endif
    </div>
</div>
<div class="mt-8">
    <h2 class="text-xl font-semibold text-gray-800">Описание</h2>
    <p class="text-lg text-gray-600 mt-2">{{ $product->description }}</p>
</div>
<div class="flex justify-end flex-wrap gap-4 mt-8">
    <x-ui.link.secondary href="{{ route('products.index') }}">
        Вернуться к списку
    </x-ui.link.secondary>
    @include('products.partials.show.admin-controls-product')
</div>
