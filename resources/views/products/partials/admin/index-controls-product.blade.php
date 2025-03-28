<div class="flex gap-3">
    <x-ui.link.secondary href="{{ route('products.edit', $product) }}" class="text-sm block mb-2 w-full text-center">
        Изменить
    </x-ui.link.secondary>
    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline w-full">
        @csrf
        @method('DELETE')
        <x-ui.button.danger type="submit" class="text-sm w-full !block text-center">
            Удалить
        </x-ui.button.danger>
    </form>
</div>
