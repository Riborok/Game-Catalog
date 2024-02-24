@props(['title', 'text', 'image', 'order'])

<div class="row featurette">
    <div class="col-md-5 {{ $order === 'second' ? 'order-md-2' : '' }}">
        <h2 class="featurette-heading fw-normal lh-1">{{ $title }}</h2>
        <p class="lead">{{ $text }}</p>
    </div>
    <div class="col-md-7 {{ $order === 'second' ? 'order-md-1' : '' }}">
        <img src="{{ $image }}" class="img-fluid mx-auto" alt="{{ $title }}">
    </div>
</div>

<hr class="featurette-divider">
