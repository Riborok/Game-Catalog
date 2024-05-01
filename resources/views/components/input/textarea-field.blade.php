@props(['name', 'placeholder', 'rows' => 5, 'autofocus' => false])

<textarea id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" rows="{{ $rows }}" required {{ $autofocus ? 'autofocus' : '' }}>{{ old($name) ?? $placeholder }}</textarea>
<x-message.error-message field="{{ $name }}"/>
