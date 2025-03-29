<div class="flex flex-col items-center sm:flex-row sm:justify-between gap-4 mt-8">
    <div class="text-xl font-semibold text-gray-900">
        Итог: {{ $cart->price }} ₽
    </div>
    <x-ui.link.primary href="{{ route('orders.create') }}">
        Перейти к оформлению
        </x-ui.link.secondary>
</div>
