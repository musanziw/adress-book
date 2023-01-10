@props(['messages'])

<div class="example-alert mt-2 mb-2">
    <div class="alert alert-danger alert-icon">
        @if ($messages)
            <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
                @foreach ((array) $messages as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
    </div>
</div>

