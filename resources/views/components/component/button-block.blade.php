@props(['type' => 'button', 'color' => 'primary', 'navigate', 'small' => false])

<div class="d-grid gap-2">
    <button class="btn btn-{{ $color }} btn-block @if ($small) btn-sm @endif"
        type="{{ $type }}"
        @isset($navigate) onclick="window.location.href='{{ $navigate }}'" @endisset
        {{ $attributes }}>
        {{ $slot }}
    </button>
</div>
