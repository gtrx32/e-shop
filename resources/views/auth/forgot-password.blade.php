<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-lg sm:rounded-lg border border-gray-200 p-8">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Забыли пароль? Не проблема. Просто укажите свой адрес электронной почты, и мы отправим вам ссылку для сброса пароля, которая позволит вам выбрать новый.') }}
                </div>

                <!-- Session Status -->
                <x-ui.auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-ui.input.label for="email" :value="__('Электронная почта')" />
                        <x-ui.input.text id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus />
                        <x-ui.input.errors :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-ui.button.primary>
                            {{ __('Получить ссылку для сброса') }}
                        </x-ui.button.primary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
