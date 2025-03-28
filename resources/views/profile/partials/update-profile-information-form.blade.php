<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Информация о профиле') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Обновите информацию о профиле и адрес электронной почты вашей учетной записи.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-ui.input.label for="name" :value="__('Имя')" />
            <x-ui.input.text id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-ui.input.errors class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-ui.input.label for="phone" :value="__('Телефон')" />
            <x-ui.input.text id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $user->phone)" />
            <x-ui.input.errors class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-ui.input.label for="address" :value="__('Адрес')" />
            <x-ui.input.text id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" />
            <x-ui.input.errors class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-ui.input.label for="email" :value="__('Электронная почта')" />
            <x-ui.input.text id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-ui.input.errors class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Ваш адрес электронной почты не подтвержден.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Нажмите здесь, чтобы отправить письмо с подтверждением повторно.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Новая ссылка для подтверждения была отправлена на ваш адрес электронной почты.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-ui.button.primary>
                {{ __('Сохранить') }}
            </x-ui.button.primary>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Сохранено.') }}</p>
            @endif
        </div>
    </form>
</section>
