<x-layout title="Tambah Pasien">
    <x-component.card>
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">

                    <x-form.input label="No. Rekam Medis" id="noRekamMedis" name="no_rekam_medis" :required="true" />
                    <x-form.input label="Nama Lengkap" id="nama" name="nama" :required="true" />
                    <x-form.input label="Alamat" id="alamat" name="alamat" :required="true" />
                    <x-form.input label="No. Telp" id="noTelp" name="no_telp" :required="true" />
                    <x-form.input label="Tanggal Lahir" type="date" id="tglLahir" name="tgl_lahir"
                        :required="true" />
                    <div class="row">
                        <div class="col-md-6">
                            <x-form.select label="Jenis Kelamin" id="jk" name="jk" :required="true">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </x-form.select>
                        </div>
                        <div class="col-md-6">
                            <x-form.input label="Status Nikah" id="statusNikah" name="status_nikah" :required="true" />

                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <x-form.input label="Pekerjaan" id="pekerjaan" name="pekerjaan" :required="true" />
                    <x-form.input label="Pendidikan" id="pendidikan" name="pendidikan" :required="true" />
                    <x-form.input label="Keluhan" id="keluhan" name="keluhan" :required="true" />
                    <x-form.input label="Riwayat Penyakit" id="riwayatPenyakit" name="riwayat_penyakit"
                        :required="true" />
                    <x-form.input label="Riwayat Alergi" id="riwayatAlergi" name="riwayat_alergi" :required="true" />
                    <x-form.input label="Riwayat Obat" id="riwayatObat" name="riwayat_obat" :required="true" />
                </div>
            </div>


            <x-component.button-block type="submit">Simpan</x-component.button-block>


        </form>
    </x-component.card>
</x-layout>
