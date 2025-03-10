<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-lg sm:rounded-lg border border-gray-200 p-8">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full md:w-1/3">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-64 object-cover rounded-lg shadow-md">
                    </div>
                    <div class="flex-1 flex flex-col justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                            <div class="mt-4 text-2xl font-semibold text-gray-900">
                                {{ number_format($product->price, 2) }} ₽
                            </div>
                        </div>
                        <div class="mt-6 flex gap-4">
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
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800">Описание</h2>
                    <p class="text-lg text-gray-600 mt-2">{{ $product->description }}</p>
                </div>
                <div class="flex justify-end">
                    <x-secondary-button-link href="{{ route('products.index') }}">
                        Вернуться к списку
                    </x-secondary-button-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
