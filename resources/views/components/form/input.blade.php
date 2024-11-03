@props(['label', 'type' => 'text', 'id', 'name', 'value' => '', 'required' => false, 'helperText'])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
        class="form-control @error($name) is-invalid @enderror" @if ($required) required @endif
        {{ $attributes }}>

    @isset($helperText)
        <small class="form-text text-muted">{{ $helperText }}</small>
    @endisset
</div>
