<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Оформление заказа') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-ui.feedback.errors />
            @include('orders.partials.create.product-list')
            @include('orders.partials.create.form')
        </div>
    </div>
</x-app-layout>
