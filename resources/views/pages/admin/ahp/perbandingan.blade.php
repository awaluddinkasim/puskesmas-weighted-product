<x-layout title="Perbandingan Kriteria">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    @if ($daftarKriteria->count() != 0)
                        <form action="{{ route('admin.ahp.perbandingan.store') }}" method="post">
                            @csrf

                            <livewire:matrix-kriteria :$daftarKriteria />

                            <div class="d-flex justify-content-between mt-4">
                                <div>
                                    <h5>Keterangan</h5>
                                    <ul class="mb-0">
                                        @foreach ($daftarKriteria as $kriteria)
                                            <li><b>{{ $kriteria->kode }}</b> - {{ $kriteria->nama }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="align-self-end">
                                    <x-component.button type="submit" color="primary">Simpan</x-component.button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="py-5">
                            <p class="text-center">Belum ada kriteria</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <x-component.table :nowrap="false">
                        <thead class="table-dark">
                            <th>Tingkat Kepentingan</th>
                            <th>Defenisi</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Sama pentingnya</td>
                                <td>Kedua elemen mempunyai pengaruh yang sama.</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Sedikit lebih penting</td>
                                <td>Pengalaman dan penilaian sangat memihak satu elemen dibandingkan dengan pasangannya.
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>Lebih penting</td>
                                <td>Satu elemen sangat disukai dan secara praktis dominasinya sangat nyata, dibandingkan
                                    dengan
                                    elemen pasangannya.</td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td>Sangat penting</td>
                                <td>Satu elemen terbukti sangat disukai dan secara praktis dominasinya sangat,
                                    dibandingkan
                                    dengan elemen pasangannya.</td>
                            </tr>
                            <tr>
                                <td class="text-center">9</td>
                                <td>Mutlak lebih penting</td>
                                <td>Satu elemen mutlak lebih disukai dibandingkan dengan pasangannya, pada tingkat
                                    keyakinan
                                    tertinggi.</td>
                            </tr>
                            <tr>
                                <td class="text-center">2, 4, 6, 8</td>
                                <td>Nilai-nilai tengah diantara dua pendapat yang berdampingan</td>
                                <td>Nilai-nilai ini diperlukan suatu kompromi.</td>
                            </tr>
                        </tbody>
                    </x-component.table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
