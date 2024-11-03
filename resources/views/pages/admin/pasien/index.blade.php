<x-layout title="List Pasien">
    <x-component.card>
        <x-component.datatables id="pasien">
            <thead>
                <th>#</th>
                <th>No. Rekam Medis</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tgl. Lahir</th>
                <th>Usia</th>
                <th>Telepon</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($daftarPasien as $pasien)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pasien->no_rekam_medis }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->jk }}</td>
                        <td>{{ $pasien->tgl_lahir }}</td>
                        <td>{{ $pasien->usia }} Tahun</td>
                        <td>{{ $pasien->no_hp }}</td>
                        <td class="text-center">
                            <x-component.button :small="true" navigate="{{ route('admin.pasien.show', $pasien) }}">
                                Detail
                            </x-component.button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-component.datatables>
    </x-component.card>
</x-layout>
