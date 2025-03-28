@can('admin-access')
    <div class="flex gap-1 justify-center">
        <x-ui.link.secondary href="{{ route('products.edit', $product) }}" class="text-sm block  text-center">
            Изменить
        </x-ui.link.secondary>
        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline ">
            @csrf
            @method('DELETE')
            <x-ui.button.danger type="submit" class="text-sm w-full !block text-center">
                Удалить
            </x-ui.button.danger>
        </form>
    </div>
@endcan
