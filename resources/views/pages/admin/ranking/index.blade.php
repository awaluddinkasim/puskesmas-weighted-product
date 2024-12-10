<x-layout title="Perawat Terbaik">
    <x-component.card>
        <button class="btn btn-danger mb-3" onclick="window.open('{{ route('admin.result.export') }}', '_blank')">
            <i class="fa fa-file-pdf"></i> Export PDF
        </button>

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
