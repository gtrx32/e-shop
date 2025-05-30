<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Изменить пароль') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Убедитесь, что ваш аккаунт использует длинный, случайный пароль для обеспечения безопасности.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-ui.input.label for="update_password_current_password" :value="__('Текущий пароль')" />
            <x-ui.input.text id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full" autocomplete="current-password" />
            <x-ui.input.errors :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-ui.input.label for="update_password_password" :value="__('Новый пароль')" />
            <x-ui.input.text id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                autocomplete="new-password" />
            <x-ui.input.errors :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-ui.input.label for="update_password_password_confirmation" :value="__('Подтверждение пароля')" />
            <x-ui.input.text id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            <x-ui.input.errors :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-ui.button.primary>
                {{ __('Сохранить') }}
            </x-ui.button.primary>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
