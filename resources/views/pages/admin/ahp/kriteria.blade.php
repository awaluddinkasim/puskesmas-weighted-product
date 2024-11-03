<x-layout title="Kriteria">
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <x-component.card>
                <div class="mb-3">
                    <x-form.modal title="Form Kriteria" action="{{ route('admin.ahp.kriteria.store') }}" label="Tambah">
                        <x-form.input label="Kode" name="kode" id="kodeInput" :required="true" />
                        <x-form.input label="Kriteria" name="nama" id="kriteriaInput" :required="true" />
                    </x-form.modal>
                </div>

                <x-component.table>
                    <thead>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Kriteria</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse ($daftarKriteria as $kriteria)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kriteria->kode }}</td>
                                <td>{{ $kriteria->nama }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.ahp.kriteria.delete', $kriteria) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <x-component.button type="submit" color="danger"
                                            :small="true">Delete</x-component.button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </x-component.table>
            </x-component.card>
        </div>
    </div>
</x-layout>
