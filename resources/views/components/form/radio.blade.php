@props(['label'])

<div class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">{{ $label }}</legend>
    <div class="col-sm-10 d-flex gap-2">
        {{ $slot }}
    </div>
</div>

{{--

<div class="form-check">
    <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $option['id'] }}"
        value="{{ $option['value'] }}" required>
    <label class="form-check-label" for="{{ $option['id'] }}">
        {{ $option['label'] }}
    </label>
</div>

--}}
