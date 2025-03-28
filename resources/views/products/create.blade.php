<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавление товара') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg">
                <x-ui.feedback.errors />
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <x-ui.input.label for="name" value="Название" />
                            <x-ui.input.text id="name" class="block mt-1 w-full" type="text" name="name"
                                value="{{ old('name') }}" />
                        </div>
                        <div>
                            <x-ui.input.label for="description" value="Описание" />
                            <x-ui.input.textarea id="description" class="block mt-1 w-full" name="description"
                                value="{{ old('description') }}" />
                        </div>
                        <div>
                            <x-ui.input.label for="price" value="Цена" />
                            <x-ui.input.text id="price" class="block mt-1 w-full" type="number" step="0.01"
                                name="price" value="{{ old(key: 'price') }}" />
                        </div>
                        <div>
                            <x-ui.input.label for="image" value="Изображение" />
                            <x-ui.input.image id="image" type="file" name="image"
                                accept=".jpg,.jpeg,.png,.webp" label="Выберите файл" />
                        </div>
                        <div class="flex justify-end gap-4">
                            <x-ui.link.secondary href="{{ route('products.index') }}">
                                Отмена
                            </x-ui.link.secondary>
                            <x-ui.button.primary type="submit">
                                Добавить
                            </x-ui.button.primary>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
