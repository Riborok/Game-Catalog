<div class="mb-3">
    <label for="name" class="form-label @error('password') is-invalid @enderror">@lang('element.name')</label>
    <x-input-field
        name="name"
        placeholder=""
        autofocus
    />
</div>
