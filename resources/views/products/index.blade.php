<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Каталог') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg">
                @if (session('success') || session('error'))
                    <div class="mb-8">
                        @if (session('success'))
                            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="p-4 mb-4 text-red-800 bg-red-100 rounded-lg">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                @endif
                @can('admin-access')
                    <div class="mb-8">
                        <x-ui.link.primary href="{{ route('products.create') }}">
                            Добавить товар
                        </x-ui.link.primary>
                    </div>
                @endcan
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full relative">
                            <a href="{{ route('products.show', $product->id) }}"
                                class="relative group flex-grow flex flex-col h-full">
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
                                        <x-ui.link.secondary href="{{ route('cart.index') }}"
                                            class="text-sm text-gray-700 whitespace-nowrap">
                                            В корзине: {{ $product->cartData['quantity'] }}
                                        </x-ui.link.secondary>
                                        <form action="{{ route('cart.update', $product->cartData['cartItemId']) }}"
                                            method="POST" class="flex items-center">
                                            @csrf
                                            @method('PUT')
                                            <x-ui.button.secondary type="submit" name="action" value="increase"
                                                class="text-sm">+</x-ui.button.secondary>
                                            <x-ui.button.secondary type="submit" name="action" value="decrease"
                                                class="text-sm ml-1">-</x-ui.button.secondary>
                                        </form>
                                        <form action="{{ route('cart.remove', $product->cartData['cartItemId']) }}"
                                            method="POST">
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
                            @can('admin-access')
                                <div class="absolute top-2 right-2">
                                    <button id="product-actions-toggle-{{ $product->id }}"
                                        class="absolute top-1 right-1 text-xl bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center hover:bg-gray-500 hover:text-white transition-all duration-200">
                                        ⋮
                                    </button>
                                    <div id="product-actions-{{ $product->id }}"
                                        class="product-actions-menu hidden absolute top-8 right-0 bg-white shadow-md p-2 rounded-lg">
                                        <x-ui.link.secondary href="{{ route('products.edit', $product) }}"
                                            class="text-sm block mb-2 w-full text-center">
                                            Изменить
                                        </x-ui.link.secondary>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                                            class="inline w-full">
                                            @csrf
                                            @method('DELETE')
                                            <x-ui.button.danger type="submit" class="text-sm w-full !block text-center">
                                                Удалить
                                            </x-ui.button.danger>
                                        </form>
                                    </div>
                                </div>
                            @endcan
                        </div>
                        <script>
                            document.getElementById('product-actions-toggle-{{ $product->id }}').addEventListener('click', function(event) {
                                var actions = document.getElementById('product-actions-{{ $product->id }}');
                                if (actions.classList.contains('hidden')) {
                                    document.querySelectorAll('.product-actions-menu').forEach(function(menu) {
                                        menu.classList.add('hidden');
                                    });
                                    actions.classList.remove('hidden');
                                } else {
                                    actions.classList.add('hidden');
                                }
                                event.stopPropagation();
                            });
                            document.addEventListener('click', function(event) {
                                document.querySelectorAll('.product-actions-menu').forEach(function(menu) {
                                    if (!menu.contains(event.target) && !menu.previousElementSibling.contains(event.target)) {
                                        menu.classList.add('hidden');
                                    }
                                });
                            });
                        </script>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
