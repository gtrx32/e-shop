<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-lg sm:rounded-lg border border-gray-200 p-8">
                <!-- Session Status -->
                <x-ui.auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-ui.input.label for="email" :value="__('Электронная почта')" />
                        <x-ui.input.text id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-ui.input.errors :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-ui.input.label for="password" :value="__('Пароль')" />

                        <x-ui.input.text id="password" class="block mt-1 w-full" type="password" name="password"
                            required autocomplete="current-password" />

                        <x-ui.input.errors :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Забыли пароль?') }}
                            </a>
                        @endif

                        <x-ui.button.primary class="ms-3">
                            {{ __('Авторизоваться') }}
                        </x-ui.button.primary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
