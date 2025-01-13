<x-layout title="Perawat Terbaik">
    <x-component.card>
        <div class="d-flex justify-content-between">
            <form class="row g-2">
                <div class="col-auto">
                    <select class="form-select" name="bulan" required>
                        <option value="" hidden selected>Pilih</option>
                        @php
                            $bulan = Request::has('bulan') ? Request::get('bulan') : date('m');
                        @endphp
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" @if ($i == $bulan) selected @endif>
                                {{ Carbon\Carbon::createFromDate(null, $i)->translatedFormat('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-auto">
                    <select class="form-select" name="tahun" required>
                        <option value="" hidden selected>Pilih</option>
                        @php
                            $tahun = Request::has('tahun') ? Request::get('tahun') : date('Y');
                        @endphp
                        @foreach ($years as $year)
                            <option value="{{ $year }}" @if ($year == $tahun) selected @endif>
                                {{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Filter</button>
                </div>
            </form>

            <button class="btn btn-danger mb-3" onclick="window.open('{{ route('admin.result.export') }}', '_blank')">
                <i class="fa fa-file-pdf"></i> Export PDF
            </button>
        </div>

        <x-component.datatables id="ranking">
            <thead>
                <th>#</th>
                <th>Nama Perawat</th>
                <th>Vector S</th>
                <th>Vector V</th>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $result->evaluasi->perawat->nama }}
                            @if ($loop->iteration == 1)
                                <span class="badge bg-success">Perawat Terbaik</span>
                            @endif
                        </td>
                        <td>{{ round($result->bobot, 3) }}</td>
                        <td>{{ round($result->vectorV, 3) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-component.datatables>
    </x-component.card>
</x-layout>
