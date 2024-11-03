<x-layout title="Evaluasi Kinerja">
    <x-component.card>
        <x-component.datatables id="perawat">
            <thead>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Kehadiran</th>
                <th>Penanganan Pasien</th>
                <th>Komunikasi</th>
                <th>Sikap</th>
                <th>Kinerja</th>
                <th>Keterampilan Teknis</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nip }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->evaluasi?->kehadiran ?? '-' }}</td>
                        <td>{{ $user->evaluasi?->penanganan_pasien ?? '-' }}</td>
                        <td>{{ $user->evaluasi?->komunikasi ?? '-' }}</td>
                        <td>{{ $user->evaluasi?->sikap ?? '-' }}</td>
                        <td>{{ $user->evaluasi?->kinerja ?? '-' }}</td>
                        <td>{{ $user->evaluasi?->keterampilan_teknis ?? '-' }}</td>
                        <td class="text-center">
                            <x-component.button :small="true" navigate="{{ route('admin.evaluasi.user', $user) }}">
                                Evaluasi
                            </x-component.button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-component.datatables>
    </x-component.card>
</x-layout>
