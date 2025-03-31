<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Загрузка и отображение Excel файла') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg space-y-4">
                <h3 class="text-lg font-medium text-gray-900">Загрузите ваш Excel файл</h3>
                <form action="{{ route('excel.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col gap-4 items-start">
                        <input type="file" id="file" name="file" accept=".xlsx,.xls,.csv"
                            class="text-sm text-gray-700 file:border-0 file:rounded-md file:px-4 file:py-2 file:bg-gray-100 file:text-gray-700 file:cursor-pointer hover:file:bg-gray-200 focus:ring-2 focus:ring-opacity-50">
                        <x-ui.button.primary>
                            Загрузить
                        </x-ui.button.primary>
                    </div>
                </form>
            </div>

            @if (isset($data) && !empty($data))
                <div class="p-8 bg-white shadow sm:rounded-lg space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Содержимое файла "{{ $fileName }}":</h3>

                    <div class="flex space-x-4 mb-4">
                        @foreach ($data as $index => $sheet)
                            <x-ui.button.secondary type="button"
                                class="sheet-toggle-btn !outline-none !ring-transparent !focus:ring-transparent !focus:outline-none
                                {{ $index === 0 ? '!bg-gray-800 !text-white' : '!bg-transparent !text-gray-700' }}"
                                onclick="switchSheet({{ $index }})">
                                Лист {{ $index + 1 }}
                            </x-ui.button.secondary>
                        @endforeach

                    </div>

                    <div id="excelSheets">
                        @foreach ($data as $index => $sheet)
                            <div class="sheet-content" id="sheet-{{ $index }}"
                                style="display: {{ $index === 0 ? 'block' : 'none' }};">
                                <div class="overflow-auto max-h-[700px]">
                                    <table class="min-w-full table-auto border">
                                        <thead>
                                            <tr class="border-b">
                                                @foreach ($sheet[1] as $header)
                                                    <th
                                                        class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-t border-b border-l">
                                                        {{ $header }}
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (array_slice($sheet, 1) as $row)
                                                <tr class="border-b">
                                                    @foreach ($row as $cell)
                                                        <td
                                                            class="px-4 py-2 text-sm text-gray-700 border-t border-b border-l">
                                                            {{ $cell }}
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function switchSheet(sheetIndex) {
            const sheets = document.querySelectorAll('.sheet-content');
            const buttons = document.querySelectorAll('.sheet-toggle-btn');

            sheets.forEach((sheet, index) => {
                sheet.style.display = (index === sheetIndex) ? 'block' : 'none';
            });

            buttons.forEach((button, index) => {
                if (index === sheetIndex) {
                    button.classList.add('!bg-gray-800', '!text-white');
                    button.classList.remove('!bg-transparent', '!text-gray-700');
                } else {
                    button.classList.remove('!bg-gray-800', '!text-white');
                    button.classList.add('!bg-transparent', '!text-gray-700');
                }
            });
        }
    </script>
</x-app-layout>
