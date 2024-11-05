@props(['label', 'id', 'name', 'rows' => 3, 'required' => false, 'helperText'])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $id }}" rows="{{ $rows }}" class="form-control @error($name) is-invalid @enderror" @if ($required) required @endif">{{ $slot }}</textarea>

    @isset($helperText)
        <small class="form-text text-muted">{{ $helperText }}</small>
    @endisset
</div>
