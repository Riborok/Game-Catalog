@props(['sessionName'])

@if (session($sessionName))
    <div class="alert {{ Str::contains($sessionName, 'error') ? 'alert-danger' : 'alert-success' }}" role="alert">
        {{ session($sessionName) }}
    </div>
@endif
