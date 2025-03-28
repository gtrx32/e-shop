<div class="flex flex-col items-center sm:flex-row sm:justify-between gap-4 mt-8">
    <div class="text-xl font-semibold text-gray-900">
        Итог: {{ $cart->price }} ₽
    </div>
    <x-ui.button.primary class="px-6 py-2">Перейти к оформлению</x-ui.button.primary>
</div>
