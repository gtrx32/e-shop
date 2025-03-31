<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Каталог') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg space-y-6">
                <x-ui.feedback.result />
                @include('products.partials.index.admin-add-product')
                @include('products.partials.index.product-list')
            </div>
            {{ $products->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</x-app-layout>
