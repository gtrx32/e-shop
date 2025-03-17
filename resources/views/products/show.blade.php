<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
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
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full md:w-2/4">
                        <img src="{{ asset($product->image ? 'storage/' . $product->image : 'https://imgholder.ru/600x300/8493a8/adb9ca&text=IMAGE&font=kelson') }}"
                            alt="{{ $product->name }}" class="w-full h-80 object-cover rounded-lg shadow-md">
                    </div>
                    <div class="flex-1 flex flex-col gap-8">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                        <div class="flex gap-8">
                            <div class="text-2xl font-semibold text-gray-900">
                                {{ number_format($product->price, 2) }} ₽
                            </div>
                            @if ($product->cartItem)
                                <div class="flex items-center space-x-1">
                                    <x-secondary-button-link href="{{ route('cart.index') }}"
                                        class="text-sm text-gray-700 whitespace-nowrap">
                                        В корзине: {{ $product->cartItem->quantity }}
                                    </x-secondary-button-link>
                                    <form action="{{ route('cart.update', $product->cartItem->id) }}" method="POST"
                                        class="flex items-center">
                                        @csrf
                                        @method('PUT')
                                        <x-secondary-button type="submit" name="action" value="increase"
                                            class="text-sm">+</x-secondary-button>
                                        <x-secondary-button type="submit" name="action" value="decrease"
                                            class="text-sm ml-1">-</x-secondary-button>
                                    </form>
                                    <form action="{{ route('cart.remove', $product->cartData['cartItemId']) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button type="submit">
                                            Удалить
                                        </x-danger-button>
                                    </form>
                                </div>
                            @else
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <x-primary-button type="submit" class="text-sm">
                                        В корзину
                                    </x-primary-button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800">Описание</h2>
                    <p class="text-lg text-gray-600 mt-2">{{ $product->description }}</p>
                </div>
                <div class="flex justify-end flex-wrap gap-4 mt-8">
                    <x-secondary-button-link href="{{ route('products.index') }}">
                        Вернуться к списку
                    </x-secondary-button-link>
                    @can('admin-access')
                        <x-primary-button-link href="{{ route('products.edit', $product) }}">
                            Изменить
                        </x-primary-button-link>
                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-danger-button type="submit">
                                Удалить
                            </x-danger-button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
