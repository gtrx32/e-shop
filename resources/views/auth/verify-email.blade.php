<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-lg sm:rounded-lg border border-gray-200 p-8">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Спасибо за регистрацию! Прежде чем начать, подтвердите свой адрес электронной почты, нажав на ссылку, которую мы только что отправили вам. Если вы не получили письмо, мы с радостью отправим его снова.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('Новая ссылка для подтверждения была отправлена на адрес электронной почты, указанный вами при регистрации.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-primary-button>
                                {{ __('Отправить письмо снова') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Выйти') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
