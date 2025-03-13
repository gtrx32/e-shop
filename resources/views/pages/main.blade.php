<x-app-layout>
    <div class="flex flex-col justify-center items-center flex-grow">
        <div class="text-center max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-16">
            <h2 class="text-6xl font-extrabold text-gray-900">
                {{ __('Добро пожаловать в наш магазин!') }}
            </h2>

            <p class="text-2xl text-gray-600 max-w-3xl mx-auto">
                Мы не предлагаем широкий ассортимент товаров для вашего удобства. Наслаждайтесь покупками!
            </p>

            <x-primary-button-link href="{{ route('products.index') }}"
                class="!text-lg py-6 px-8 rounded-lg shadow-lg mx-auto">
                Перейти в каталог товаров
            </x-primary-button-link>

            <div class="text-xl text-gray-500 max-w-xl mx-auto">
                <p>Если у Вас есть вопросы, не стесняйтесь обращаться к нам!</p>
                <p>У нас нет поддержки, Вам никто не поможет!</p>
            </div>
        </div>
    </div>
</x-app-layout>
