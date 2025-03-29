<div class="p-8 bg-white shadow sm:rounded-lg space-y-6">
    <div>
        <x-ui.input.label for="phone" value="Номер телефона" />
        <x-ui.input.text id="phone" name="phone" type="tel" class="w-full"
            value="{{ old('phone', auth()->user()->phone) }}" />
    </div>
    <div>
        <x-ui.input.label for="delivery_address" value="Адрес доставки" />
        <x-ui.input.text id="delivery_address" name="delivery_address" type="text" class="w-full"
            value="{{ old('delivery_address', auth()->user()->address) }}" />
    </div>
    <div>
        <x-ui.input.label for="payment_method" value="Способ оплаты" />
        <x-ui.input.select id="payment_method" name="payment_method" class="w-full">
            @foreach ($payment_methods as $payment_method)
                <option value="{{ $payment_method }}" {{ old('payment_method') == $payment_method ? 'selected' : '' }}>
                    {{ $payment_method }}
                </option>
            @endforeach
        </x-ui.input.select>
    </div>
    <div class="flex justify-end gap-4">
        <x-ui.link.secondary href="{{ route('cart.index') }}">
            Отмена
        </x-ui.link.secondary>
        <x-ui.button.primary type="submit">
            Оформить заказ
        </x-ui.button.primary>
    </div>
</div>
