<x-layout title="Penanganan Pasien">
    <x-component.card>
        <x-component.datatables id="penanganan">
            <thead>
                <th>#</th>
                <th>No. Rekam Medis</th>
                <th>Nama Pasien</th>
                <th>NIP Perawat</th>
                <th>Nama Perawat</th>
            </thead>
            <tbody>
                @foreach ($daftarPasien as $pasien)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pasien->no_rekam_medis }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->perawat?->nip ?? '-' }}</td>
                        <td>{{ $pasien->perawat?->nama ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-component.datatables>
    </x-component.card>
</x-layout>
