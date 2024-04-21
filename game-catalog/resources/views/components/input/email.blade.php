<div class="mb-3">
    <label for="email" class="form-label">@lang('element.email-address')</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    <x-message.error-message field="email"/>
</div>
