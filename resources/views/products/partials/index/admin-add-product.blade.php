@can('admin-access')
    <div>
        <x-ui.link.primary href="{{ route('products.create') }}">
            Добавить товар
        </x-ui.link.primary>
    </div>
@endcan
