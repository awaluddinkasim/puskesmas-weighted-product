<x-layout title="Akun">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/healthcare.svg') }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6">
            <x-component.card title="Edit Akun">
                <form action="{{ route('admin.account.update') }}" method="post">
                    @csrf
                    @method('put')
                    <x-form.input label="Nama Lengkap" name="nama" id="namaInput" :value="auth()->user()->nama"
                        :required="true" />
                    <x-form.input label="Email" name="email" id="emailInput" :value="auth()->user()->email" :required="true" />
                    <x-form.input label="Password" type="password" name="password" id="passwordInput"
                        helperText="Jangan diisi jika tidak ingin mengganti password" />
                    <x-component.button-block type="submit">Simpan</x-component.button-block>
                </form>
            </x-component.card>
        </div>
    </div>
</x-layout>
