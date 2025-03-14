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
                        <x-primary-button-link href="{{ route('products.create') }}">
                            Добавить товар
                        </x-primary-button-link>
                    </div>
                @endcan

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full">
                            <a href="{{ route('products.show', $product->id) }}"
                                class="relative group flex-grow flex flex-col h-full">
                                <div class="relative h-56 w-full">
                                    <img src="{{ asset($product->image ? 'storage/' . $product->image : 'https://imgholder.ru/600x300/8493a8/adb9ca&text=IMAGE&font=kelson') }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover group-hover:opacity-80 transition-opacity duration-300">
                                </div>
                                <div class="p-4 flex-grow flex flex-col gap-4">
                                    <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">
                                        {{ $product->name }}
                                    </h3>
                                    <p class="text-sm text-gray-600 line-clamp-3 flex-grow">
                                        {{ $product->description }}
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xl text-gray-900">
                                            {{ number_format($product->price, 2) }} ₽
                                        </span>
                                        <form action="" method="POST">
                                            @csrf
                                            <x-primary-button type="submit" class="text-sm">
                                                В корзину
                                            </x-primary-button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                            @can('admin-access')
                                <div class="p-4 flex justify-between items-center border-t border-gray-200 shrink-0">
                                    <x-secondary-button-link href="{{ route('products.edit', $product) }}" class="text-sm">
                                        Изменить
                                    </x-secondary-button-link>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button type="submit" class="text-sm">
                                            Удалить
                                        </x-danger-button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
