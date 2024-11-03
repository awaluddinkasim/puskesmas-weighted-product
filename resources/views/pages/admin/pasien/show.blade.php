<x-layout title="Detail Pasien">
    <div class="row">
        <div class="col-md-6">
            <x-component.card :title="$pasien->nama">
                <h5>No. Rekam Medis</h5>
                <p>{{ $pasien->no_rekam_medis }}</p>

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
            </x-component.card>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('assets/images/pasien.svg') }}" alt="" class="img-fluid">
        </div>
    </div>
</x-layout>
