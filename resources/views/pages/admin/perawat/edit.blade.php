<x-layout title="Edit Perawat">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/healthcare.svg') }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6">
            <x-component.card title="Form Perawat">
                <form action="{{ route('admin.perawat.update', $user) }}" method="post">
                    @csrf
                    @method('put')
                    <x-form.input label="NIP" name="nip" id="nipInput" :value="$user->nip" :required="true" />
                    <x-form.input label="Nama Lengkap" name="nama" id="namaInput" :value="$user->nama"
                        :required="true" />
                    <x-form.input label="Email" name="email" id="emailInput" :value="$user->email" :required="true" />
                    <x-form.input label="Password" type="password" name="password" id="passwordInput"
                        helperText="Jangan diisi jika tidak ingin mengganti password" />
                    <x-form.select label="Jenis Kelamin" name="jk" id="jkInput" :required="true">
                        <option value="Laki-laki" @if ($user->jk == 'Laki-laki') selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if ($user->jk == 'Perempuan') selected @endif>Perempuan</option>
                    </x-form.select>
                    <x-form.input label="No. Telp" type="tel" name="no_telp" id="noTelpInput" :value="$user->no_telp"
                        :required="true" />
                    <x-component.button-block type="submit">Simpan</x-component.button-block>
                </form>
            </x-component.card>
        </div>
    </div>
</x-layout>
