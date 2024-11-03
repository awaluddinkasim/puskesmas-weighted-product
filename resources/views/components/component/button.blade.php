@props(['type' => 'button', 'color' => 'primary', 'navigate', 'small' => false])

<button type="{{ $type }}" class="btn btn-{{ $color }} @if ($small) btn-sm @endif"
    @isset($navigate) onclick="window.location.href='{{ $navigate }}'" @endisset
    {{ $attributes }}>
    {{ $slot }}
</button>
