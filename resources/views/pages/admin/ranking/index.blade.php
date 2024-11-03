<x-layout title="Perawat Terbaik">
    <x-component.card>
        <x-component.datatables id="penanganan">
            <thead>
                <th>#</th>
                <th>Nama Perawat</th>
                <th>Bobot</th>
            </thead>
            <tbody>
                @foreach ($hasil as $evaluasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $evaluasi->perawat->nama }}</td>
                        <td>{{ round($evaluasi->bobot, 3) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-component.datatables>
    </x-component.card>
</x-layout>