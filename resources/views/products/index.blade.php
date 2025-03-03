<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список товаров') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <ul>
                    @foreach ($products as $product)
                        <li class="border-b flex justify-between items-center">
                            <a href="{{ route('products.show', $product->id) }}" class="flex-1  py-4">
                                {{ $product->name }}
                            </a>
                            <span class="ml-4">{{ $product->price }} руб.</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
