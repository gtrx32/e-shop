<div class="p-8 bg-white shadow sm:rounded-lg">
    <div class="space-y-6">
        <h3 class="text-xl font-semibold mb-4">Данные заказа</h3>

        <div class="flex justify-between">
            <p class="font-semibold">Номер телефона:</p>
            <p class="text-gray-700">{{ $order->phone }}</p>
        </div>

        <div class="flex justify-between">
            <p class="font-semibold">Адрес доставки:</p>
            <p class="text-gray-700">{{ $order->delivery_address }}</p>
        </div>

        <div class="flex justify-between">
            <p class="font-semibold">Способ оплаты:</p>
            <p class="text-gray-700">{{ $order->payment_method }}</p>
        </div>

        <div class="flex justify-between">
            <p class="font-semibold">Статус заказа:</p>
            <p class="text-gray-700">{{ $order->status }}</p>
        </div>
    </div>
</div>
