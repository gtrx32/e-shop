<div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full relative">
    <a href="{{ route('products.show', $product->id) }}" class="relative group flex-grow flex flex-col h-full">
        <div class="relative h-56 w-full">
            <img src="{{ asset($product->image ? 'storage/' . $product->image : 'https://imgholder.ru/600x300/8493a8/adb9ca&text=IMAGE&font=kelson') }}"
                alt="{{ $product->name }}"
                class="w-full h-full object-cover group-hover:opacity-80 transition-opacity duration-300">
        </div>
        <div class="p-6 flex-grow flex flex-col gap-4 justify-between">
            <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">
                {{ $product->name }}
            </h3>
            @if ($product->description)
                <p class="text-sm text-gray-600 line-clamp-3 flex-grow">
                    {{ $product->description }}
                </p>
            @endif
            <div class="text-xl text-gray-900">
                {{ number_format($product->price, 2) }} ₽
            </div>
        </div>
    </a>
    <div class="p-6 pt-0">
        @if ($product->cartData)
            <div class="flex items-center space-x-1">
                <x-ui.link.secondary href="{{ route('cart.index') }}" class="text-sm text-gray-700 whitespace-nowrap">
                    В корзине: {{ $product->cartData['quantity'] }}
                </x-ui.link.secondary>
                <form action="{{ route('cart.update', $product->cartData['cartItemId']) }}" method="POST"
                    class="flex items-center">
                    @csrf
                    @method('PUT')
                    <x-ui.button.secondary type="submit" name="action" value="increase"
                        class="text-sm">+</x-ui.button.secondary>
                    <x-ui.button.secondary type="submit" name="action" value="decrease"
                        class="text-sm ml-1">-</x-ui.button.secondary>
                </form>
                <form action="{{ route('cart.remove', $product->cartData['cartItemId']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-ui.button.danger type="submit">Удалить</x-ui.button.danger>
                </form>
            </div>
        @else
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <x-ui.button.primary type="submit" class="text-sm">В
                    корзину</x-ui.button.primary>
            </form>
        @endif
    </div>
    <div class="px-6 pt-0">
        @can('admin-access')
            @include('products.partials.admin.index-controls-product')
        @endcan
    </div>
</div>
