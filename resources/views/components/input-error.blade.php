@props(['messages'])

<div class="example-alert mt-2 mb-2">
    <div class="alert alert-danger alert-icon">
        @if ($messages)
            @foreach ((array) $messages as $message)
                {{ $message }}
            @endforeach
        @endif
    </div>
</div>

