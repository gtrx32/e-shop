<div class="overflow-x-auto">
    <table class="w-full table-auto border-collapse text-center">
        <thead>
            <tr>
                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Изображение</th>
                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Название</th>
                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Цена</th>
                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Количество</th>
                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Изменить</th>
                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart->cartItems as $item)
                <tr class="border-b">
                    <td class="px-4 py-2">
                        <a href="{{ route('products.show', $item->product_id) }}">
                            <img src="{{ asset($item->product->image ? 'storage/' . $item->product->image : 'https://imgholder.ru/600x300/8493a8/adb9ca&text=IMAGE&font=kelson') }}"
                                alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded-lg mx-auto">
                        </a>
                    </td>
                    <td class="px-4 py-2 text-gray-900">
                        <a href="{{ route('products.show', $item->product_id) }}">
                            {{ $item->product->name }}
                        </a>
                    </td>
                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                        {{ number_format($item->product->price, 2) }} ₽</td>
                    <td class="px-4 py-2 text-gray-700">{{ $item->quantity }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex justify-center">
                            @csrf
                            @method('PUT')
                            <x-ui.button.secondary type="submit" name="action" value="increase"
                                class="text-sm">+</x-ui.button.secondary>
                            <x-ui.button.secondary type="submit" name="action" value="decrease"
                                class="text-sm ml-1">-</x-ui.button.secondary>
                        </form>
                    </td>
                    <td class="px-4 py-2">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-ui.button.danger type="submit">
                                Удалить
                            </x-ui.button.danger>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
