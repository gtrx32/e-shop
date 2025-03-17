<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Корзина
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
                @if ($cartItems->isEmpty())
                    <p class="text-xl text-gray-600">Ваша корзина пуста. Добавьте товары в корзину!</p>
                    <div class="mt-8">
                        <x-secondary-button-link href="{{ route('products.index') }}">
                            Вернуться к списку товаров
                        </x-secondary-button-link>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse text-center">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-sm font-semibold text-gray-700">Изображение</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-gray-700">Название</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-gray-700">Цена</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-gray-700">Количество</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-gray-700">Удалить</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">
                                            <img src="{{ asset($item->product->image ? 'storage/' . $item->product->image : 'https://imgholder.ru/600x300/8493a8/adb9ca&text=IMAGE&font=kelson') }}"
                                                alt="{{ $item->product->name }}"
                                                class="w-20 h-20 object-cover rounded-lg mx-auto">
                                        </td>
                                        <td class="px-4 py-2 text-gray-900">{{ $item->product->name }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                            {{ number_format($item->product->price, 2) }} ₽</td>
                                        <td class="px-4 py-2 text-gray-700">{{ $item->quantity }}</td>
                                        <td class="px-4 py-2">
                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit">
                                                    Удалить
                                                </x-danger-button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="flex flex-col items-center sm:flex-row sm:justify-between gap-4 mt-8">
                        <div class="text-xl font-semibold text-gray-900">
                            Итог:
                            {{ number_format(
                                $cartItems->sum(function ($item) {
                                    return $item->product->price * $item->quantity;
                                }),
                                2,
                            ) }}
                            ₽
                        </div>
                        <a href="">
                            <x-primary-button class="px-6 py-2">Перейти к оформлению</x-primary-button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
