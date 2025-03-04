<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Все товары') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-lg sm:rounded-lg border border-gray-200 p-6">
                <div class="space-y-6">
                    @foreach ($products as $product)
                        <div
                            class="flex justify-between items-center gap-6 p-4 border-b border-gray-200 hover:bg-gray-100 rounded-lg transition duration-200">
                            <div class="w-16 h-16 flex-shrink-0">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover rounded-lg shadow-md">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $product->description }}</p>
                            </div>
                            <div class="text-xl text-gray-900">
                                {{ number_format($product->price, 2) }} ₽
                            </div>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white font-medium py-2 px-4 rounded-lg transition duration-150">
                                    Изменить
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-medium py-2 px-4 rounded-lg transition duration-150">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
