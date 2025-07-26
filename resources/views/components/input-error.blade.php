@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <label id="email-error" class="error" for="email">{{ $message }}</label>
    @endforeach
@endif
