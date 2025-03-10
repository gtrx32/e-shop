<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Редактирование товара') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-lg sm:rounded-lg border border-gray-200 p-8">
                @if ($errors->any())
                    <div class="p-4 mb-4 text-red-800 bg-red-100 rounded-lg">
                        @foreach ($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">
                        <div>
                            <x-input-label for="name" value="Название" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                value="{{ old('name', $product->name) }}" />
                        </div>
                        <div>
                            <x-input-label for="description" value="Описание" />
                            <x-textarea-input id="description" class="block mt-1 w-full" name="description">
                                {{ old('description', $product->description) }}
                            </x-textarea-input>
                        </div>
                        <div>
                            <x-input-label for="price" value="Цена" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01"
                                name="price" value="{{ old('price', $product->price) }}" />
                        </div>
                        <div>
                            <x-input-label for="image" value="Изображение" />
                            <x-image-input id="image" type="file" name="image" accept=".jpg,.jpeg,.png,.webp"
                                label="Выберите файл" value="{{ $product->image }}" />
                        </div>
                        <div class="flex justify-end gap-4">
                            <x-secondary-button-link href="{{ route('products.index') }}">
                                Отмена
                            </x-secondary-button-link>
                            <x-primary-button type="submit">
                                Сохранить изменения
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
