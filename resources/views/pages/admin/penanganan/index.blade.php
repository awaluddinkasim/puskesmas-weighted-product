<x-layout title="Penanganan Pasien">
    <x-component.datatables id="pasien">
        <thead>
            <th>#</th>
            <th>No. Rekam Medis</th>
            <th>Nama</th>
            <th>Perawat</th>
            <th>Status Penanganan</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($daftarPasien as $pasien)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pasien->no_rekam_medis }}</td>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->perawat->nama }}</td>
                    <td>{{ $pasien->penanganan ? 'Selesai' : 'Belum' }}</td>
                    <td class="text-center">
                        <x-component.button :small="true" navigate="{{ route('admin.pasien.show', $pasien) }}">
                            Detail
                        </x-component.button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-component.datatables>
</x-layout>
