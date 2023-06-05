@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="pl-3 mt-2">{{ $message }}</li>
        @endforeach
    </ul>
@endif
