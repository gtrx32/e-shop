<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Каталог') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-lg sm:rounded-lg border border-gray-200 p-8">
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
                <div class="mb-8">
                    <x-primary-button-link href="{{ route('products.create') }}" class="">
                        Добавить товар
                    </x-primary-button-link>
                </div>
                <div>
                    @foreach ($products as $product)
                        <div
                            class="relative flex justify-between items-center gap-6 py-4 border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                            <a class="absolute w-full h-full top-0 left-0"
                                href="{{ route('products.show', $product->id) }}"></a>
                            <div class="w-24 h-16 flex-shrink-0">
                                <img src="{{ asset($product->image ? 'storage/' . $product->image : 'https://imgholder.ru/600x300/8493a8/adb9ca&text=IMAGE&font=kelson') }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover rounded-lg shadow-md" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $product->description }}</p>
                            </div>
                            <div class="text-xl text-gray-900">
                                {{ number_format($product->price, 2) }} ₽
                            </div>
                            <div class="flex items-center gap-3">
                                <x-secondary-button-link href="{{ route('products.edit', $product) }}" class="z-10">
                                    Изменить
                                </x-secondary-button-link>
                                <form action="{{ route('products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit" class="z-10 relative">
                                        Удалить
                                    </x-danger-button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
