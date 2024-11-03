@props(['title'])

<div class="card">
    @if (isset($title))
        <div class="card-header">
            <h5 class="card-title">{{ $title }}</h5>
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
