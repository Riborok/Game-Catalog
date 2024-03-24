<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    <x-error-message field="password"/>
</div>
