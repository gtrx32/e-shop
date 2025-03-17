<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-lg sm:rounded-lg border border-gray-200 p-8">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Это защищённая область приложения. Пожалуйста, подтвердите свой пароль перед продолжением.') }}
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div>
                        <x-ui.input.label for="password" :value="__('Пароль')" />

                        <x-ui.input.text id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />

                        <x-ui.input.errors :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex justify-end mt-4">
                        <x-ui.button.primary>
                            {{ __('Подтвердить') }}
                        </x-ui.button.primary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
