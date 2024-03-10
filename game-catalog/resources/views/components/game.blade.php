@props(['title', 'text', 'image', 'link'])

<div class="col-md-4 my-2">
    <div class="card h-100">
        <img src="{{ $image }}" class="card-img-top img-fluid" alt="{{ $title }}" style="height: 55vh;">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $title }}</h5>
            <p class="card-text">{{ $text }}</p>
            <a href="{{ $link }}" class="btn btn-primary mt-auto" target="_blank">Go to official site</a>
        </div>
    </div>
</div>
