<x-layout title="Akun">
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <x-component.card title="Edit Akun">
                <form action="{{ route('akun.update') }}" method="post">
                    @csrf
                    @method('put')
                    <x-form.input label="NIP" name="nip" id="nipInput" :value="auth('user')->user->nip" :required="true" />
                    <x-form.input label="Nama Lengkap" name="nama" id="namaInput" :value="auth('user')->user->nama"
                        :required="true" />
                    <x-form.input label="Email" name="email" id="emailInput" :value="auth('user')->user->email" :required="true" />
                    <x-form.input label="Password" type="password" name="password" id="passwordInput"
                        helperText="Jangan diisi jika tidak ingin mengganti password" />
                    <x-form.select label="Jenis Kelamin" name="jk" id="jkInput" :required="true">
                        <option value="Laki-laki" @if (auth('user')->user->jk == 'Laki-laki') selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if (auth('user')->user->jk == 'Perempuan') selected @endif>Perempuan</option>
                    </x-form.select>
                    <x-form.input label="No. Telp" type="tel" name="no_telp" id="noTelpInput" :value="auth('user')->user->no_telp"
                        :required="true" />
                    <x-component.button-block type="submit">Simpan</x-component.button-block>
                </form>
            </x-component.card>
        </div>
    </div>
</x-layout>
