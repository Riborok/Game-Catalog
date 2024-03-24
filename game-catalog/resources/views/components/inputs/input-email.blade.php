<div class="mb-3">
    <label for="email" class="form-label">E-Mail Address</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    <x-error-message field="email"/>
</div>
