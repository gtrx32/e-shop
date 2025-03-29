<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список заказов') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse text-center">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">ID Заказа</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Пользователь</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Итого</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Способ оплаты</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Статус</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="border-b">
                                    <td class="p-4">{{ $order->id }}</td>
                                    <td class="p-4">{{ $order->user->name }}</td>
                                    <td class="p-4 font-semibold">{{ $order->price }} ₽</td>
                                    <td class="p-4">{{ $order->payment_method }}</td>
                                    <td class="p-4">{{ $order->status }}</td>
                                    <td class="p-4">
                                        <x-ui.link.secondary href="{{ route('orders.show', $order->id) }}">
                                            Перейти к заказу
                                        </x-ui.link.secondary>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
