@props(['disabled' => false, 'label' => 'Выберите файл'])

<div class="relative">
    <input type="file" id="file-input" @disabled($disabled) {{ $attributes->merge(['class' => 'hidden']) }}
        onchange="previewImage(event)">
    <x-input-label for="file-input"
        class="mt-1 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer {{ $disabled ? 'cursor-not-allowed opacity-50' : '' }}">
        {{ $label }}
    </x-input-label>

    <div id="image-preview" class="hidden">
        <div class="h-48 mt-4 relative inline-block">
            <img id="preview-img" src="" alt="Preview"
                class="h-full w-auto object-cover rounded-md shadow-md" />
            <button type="button" onclick="removeImage()"
                class="absolute top-2 right-2 text-white bg-black bg-opacity-50 hover:bg-opacity-75 rounded-full p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
        }
    }

    function removeImage() {
        const preview = document.getElementById('image-preview');
        const fileInput = document.getElementById('file-input');
        const previewImg = document.getElementById('preview-img');

        previewImg.src = '';
        preview.classList.add('hidden');
        fileInput.value = '';
    }
</script>
