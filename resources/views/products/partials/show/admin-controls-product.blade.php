@can('admin-access')
    <x-ui.link.primary href="{{ route('products.edit', $product) }}">
        Изменить
    </x-ui.link.primary>
    <form action="{{ route('products.destroy', $product) }}" method="POST">
        @csrf
        @method('DELETE')
        <x-ui.button.danger type="submit">
            Удалить
        </x-ui.button.danger>
    </form>
@endcan
