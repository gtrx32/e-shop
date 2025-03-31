@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Навигация по страницам" class="flex flex-col items-center gap-2">
        <div class="flex space-x-1">
            {{-- Кнопка "Назад" --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 text-gray-400 bg-gray-200 border border-gray-300 rounded-md cursor-default">
                    &laquo; Назад
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-3 py-1 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                    &laquo; Назад
                </a>
            @endif

            {{-- Номера страниц --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-1 text-gray-500">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-1 text-white bg-gray-800 border border-gray-800 rounded-md">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-1 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Кнопка "Вперед" --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-3 py-1 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                    Вперед &raquo;
                </a>
            @else
                <span class="px-3 py-1 text-gray-400 bg-gray-200 border border-gray-300 rounded-md cursor-default">
                    Вперед &raquo;
                </span>
            @endif
        </div>

        <!-- Текст "Показано X–Y из Z результатов" -->
        <div class="text-sm text-gray-600">
            Показано
            @if ($paginator->firstItem())
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                –
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
            @else
                {{ $paginator->count() }}
            @endif
            из
            <span class="font-medium">{{ $paginator->total() }}</span>
            результатов
        </div>
    </nav>
@endif
