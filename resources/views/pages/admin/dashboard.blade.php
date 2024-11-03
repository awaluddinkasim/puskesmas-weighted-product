<x-layout title="Dashboard">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="fs-14 mb-1">Pasien</div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ number_format($pasien) }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="fs-14 mb-1">Perawat</div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ number_format($perawat) }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="fs-14 mb-1">Perawat Belum Dievaluasi</div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ number_format($perawatBelumDievaluasi) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
