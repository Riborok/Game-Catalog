@props(['name', 'placeholder', 'autofocus' => false])

<input id="{{ $name }}" type="text" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ old($name) ?? $placeholder }}" required autocomplete="{{ $name }}" {{ $autofocus ? 'autofocus' : '' }}>
<x-error-message field="{{ $name }}"/>
