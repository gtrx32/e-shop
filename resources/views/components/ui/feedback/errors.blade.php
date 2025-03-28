@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'p-4 mb-4 text-red-800 bg-red-100 rounded-lg']) }}>
        @if ($errors->any())
            @foreach ($errors->all() as $message)
                <p>{{ $message }}</p>
            @endforeach
        @endif
    </div>
@endif
