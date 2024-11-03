@props(['label', 'id', 'name', 'required' => false])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <select class="form-select @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $id }}"
        @if ($required) required @endif>
        <option value="" hidden selected>Pilih</option>
        {{ $slot }}
    </select>
</div>
