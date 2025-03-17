<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Удалить учетную запись') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('После удаления вашей учетной записи все её ресурсы и данные будут безвозвратно удалены. Перед удалением аккаунта, пожалуйста, скачайте все данные или информацию, которые хотите сохранить.') }}
        </p>
    </header>

    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Удалить учетную запись') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Вы уверены, что хотите удалить свою учетную запись?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('После удаления вашей учетной записи все её ресурсы и данные будут безвозвратно удалены. Пожалуйста, введите свой пароль, чтобы подтвердить окончательное удаление аккаунта.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Пароль') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Пароль') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Отмена') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Удалить учетную запись') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
