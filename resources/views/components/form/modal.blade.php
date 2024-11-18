@props(['title', 'action', 'label', 'hasFile' => false])

<div class="d-flex flex-wrap gap-2">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
        {{ $label }}
    </button>
</div>

<!-- Default Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $action }}" method="post" autocomplete="off"
                @if ($hasFile) enctype="multipart/form-data" @endif>
                @csrf
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">{{ $label }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
