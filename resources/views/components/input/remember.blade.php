<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label class="form-check-label" for="remember">@lang('element.remember-me')</label>
</div>
