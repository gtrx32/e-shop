@if (session('success') || session('error'))
    <div {{ $attributes }}>
        @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="p-4 mb-4 text-red-800 bg-red-100 rounded-lg">
                {{ session('error') }}
            </div>
        @endif
    </div>
@endif
