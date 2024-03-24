<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    <x-error-message field="name"/>
</div>
