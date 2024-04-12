@props(['title', 'description', 'image', 'link'])

<div class="col-md-4 my-2">
    <div class="card h-100">
        <img src="{{ $image }}" class="card-img-top img-fluid game-card-img-height" alt="{{ $title }}">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $title }}</h5>
            <p class="card-text">{!! App\Utils\TextHighlighter::highlightText(htmlspecialchars($description)) !!}</p>
            <a href="{{ $link }}" class="btn btn-primary mt-auto" target="_blank">@lang('catalog.go-to-off-size')</a>
        </div>
    </div>
</div>
