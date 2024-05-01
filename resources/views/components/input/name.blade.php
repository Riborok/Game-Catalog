<div class="mb-3">
    <label for="name" class="form-label @error('password') is-invalid @enderror">@lang('element.name')</label>
    <x-input.text
        name="name"
        placeholder=""
        autofocus
    />
</div>
