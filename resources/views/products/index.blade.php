<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Каталог') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg">
                <x-ui.feedback.result />
                @can('admin-access')
                    @include('products.partials.admin.index-add-product')
                @endcan
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        @include('products.partials.index-product')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
