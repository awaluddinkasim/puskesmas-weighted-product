<x-layout title="Detail Penanganan">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail Pasien</h5>
                </div>
                <div class="card-body">
                    <h5>No. Rekam Medis</h5>
                    <p>{{ $pasien->no_rekam_medis }}</p>

                    <h5>Nama</h5>
                    <p>{{ $pasien->nama }}</p>

                    <h5>Jenis Kelamin</h5>
                    <p>{{ $pasien->jk }}</p>

                    <h5>Tgl. Lahir</h5>
                    <p>{{ Carbon\Carbon::parse($pasien->tgl_lahir)->isoFormat('DD MMMM YYYY') }}</p>

                    <h5>Status Nikah</h5>
                    <p>{{ $pasien->status_nikah }}</p>

                    <h5>Telepon</h5>
                    <p>{{ $pasien->no_hp }}</p>

                    <h5>Alamat</h5>
                    <p>{{ $pasien->alamat }}</p>

                    <h5>Pekerjaan</h5>
                    <p>{{ $pasien->pekerjaan }}</p>

                    <h5>Pendidikan</h5>
                    <p>{{ $pasien->pendidikan }}</p>

                    <h5>Keluhan</h5>
                    <p>{{ $pasien->keluhan }}</p>

                    <h5>Riwayat Penyakit</h5>
                    <p>{{ $pasien->riwayat_penyakit }}</p>

                    <h5>Riwayat Alergi</h5>
                    <p>{{ $pasien->riwayat_alergi }}</p>

                    <h5>Riwayat Obat</h5>
                    <p>{{ $pasien->riwayat_obat }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Detail Penanganan</h5>
                        <x-form.modal title="Penanganan" action="{{ route('penanganan.store', $pasien) }}"
                            label="Input Penanganan" :hasFile="true">
                            <x-form.textarea label="Keterangan" id="keterangan" name="keterangan"
                                :required="true"></x-form.textarea>
                            <x-form.image label="Lampiran Gambar" id="lampiran" name="lampiran" :required="true" />
                        </x-form.modal>
                    </div>
                </div>
                <div class="card-body">
                    @if ($pasien->penanganan)
                        <h5>Keterangan Penanganan</h5>
                        <p>{{ $pasien->penanganan->keterangan }}</p>

                        <h5>Lampiran</h5>
                        <img src="{{ asset('lampiran/' . $pasien->penanganan->lampiran) }}" alt=""
                            class="w-100 mb-3">

                        <h5>Tanggal Input Penanganan</h5>
                        <p>{{ Carbon\Carbon::parse($pasien->penanganan->created_at)->isoFormat('DD MMMM YYYY') }}</p>
                    @else
                        <div class="py-5">
                            <h5 class="text-center">Belum Ada Penanganan</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
