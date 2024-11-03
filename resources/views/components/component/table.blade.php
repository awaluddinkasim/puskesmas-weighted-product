@props(['nowrap' => true])

<div class="table-responsive @if ($nowrap) text-nowrap @endif">
    <table class="table table-hover mb-0">
        {{ $slot }}
    </table>
</div>
