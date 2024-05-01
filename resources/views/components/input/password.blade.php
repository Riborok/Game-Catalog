<div class="mb-3">
    <label for="password" class="form-label">@lang('element.password')</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    <x-message.error-message field="password"/>
</div>
