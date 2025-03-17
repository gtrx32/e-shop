<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-lg sm:rounded-lg border border-gray-200 p-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-ui.input.label for="name" :value="__('Имя')" />
                        <x-ui.input.text id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-ui.input.errors :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-ui.input.label for="email" :value="__('Электронная почта')" />
                        <x-ui.input.text id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                        <x-ui.input.errors :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-ui.input.label for="password" :value="__('Пароль')" />

                        <x-ui.input.text id="password" class="block mt-1 w-full" type="password" name="password"
                            required autocomplete="new-password" />

                        <x-ui.input.errors :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-ui.input.label for="password_confirmation" :value="__('Подтверждение пароля')" />

                        <x-ui.input.text id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-ui.input.errors :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('login') }}">
                            {{ __('Уже есть аккаунт?') }}
                        </a>

                        <x-ui.button.primary class="ms-4">
                            {{ __('Зарегистрироваться') }}
                        </x-ui.button.primary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
