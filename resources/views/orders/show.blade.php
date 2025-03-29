<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Детали заказа') }} №{{ $order->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-ui.feedback.errors />
            @include('orders.partials.show.product-list')
            @include('orders.partials.show.order-data')
            <div class="flex justify-end gap-4 mt-8">
                <x-ui.link.secondary href="{{ route('orders.index') }}">
                    Назад
                </x-ui.link.secondary>
            </div>
        </div>
    </div>
</x-app-layout>
