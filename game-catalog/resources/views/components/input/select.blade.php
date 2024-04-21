@props(['name', 'options', 'selected' => null])

<select id="{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
    @foreach($options as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>
<x-message.error-message field="{{ $name }}"/>
