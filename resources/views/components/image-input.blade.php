@props(['value' => '', 'id'])

<div class="relative">
    <input type="file" id="{{ $id }}" name="{{ $id }}"
        {{ $attributes->merge(['class' => 'hidden']) }} onchange="previewImage(event)">
    <x-input-label for="{{ $id }}"
        class="mt-1 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer">
        Выберите файл
    </x-input-label>
    <div id="image-wrapper" class="{{ $value ? '' : 'hidden' }}">
        <div class="h-48 w-96 mt-4 relative inline-block">
            <img id="preview-image"
                src="{{ $value ? asset('storage/' . $value) : asset('https://imgholder.ru/600x300/8493a8/adb9ca&text=IMAGE&font=kelson') }}"
                alt="Preview" class="h-full w-full object-cover rounded-md shadow-md" />
            <button type="button" onclick="removeImage('{{ $id }}')"
                class="absolute top-2 right-2 text-white bg-black bg-opacity-50 hover:bg-opacity-75 rounded-full p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <input type="checkbox" id="delete-old-image" name="delete-old-image" class="hidden" />
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('image-wrapper');
        const previewImg = document.getElementById('preview-image');
        const deleteCheckbox = document.getElementById('delete-old-image');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
                deleteCheckbox.checked = true;
            };

            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
        }
    }

    function removeImage(id) {
        const preview = document.getElementById('image-wrapper');
        const fileInput = document.getElementById(id);
        const previewImg = document.getElementById('preview-image');
        const deleteCheckbox = document.getElementById('delete-old-image');

        previewImg.src = '';
        preview.classList.add('hidden');
        fileInput.value = '';
        deleteCheckbox.checked = true;
    }
</script>
