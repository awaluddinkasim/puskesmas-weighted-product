<x-layout title="Perawat">
    <x-component.card>
        <div class="mb-3">
            <x-form.modal title="Form Perawat" action="{{ route('admin.perawat.store') }}" label="Tambah">
                <x-form.input label="NIP" name="nip" id="nipInput" :required="true" />
                <x-form.input label="Nama Lengkap" name="nama" id="namaInput" :required="true" />
                <x-form.input label="Email" name="email" id="emailInput" :required="true" />
                <x-form.input label="Password" type="password" name="password" id="passwordInput" :required="true" />
                <x-form.select label="Jenis Kelamin" name="jk" id="jkInput" :required="true">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </x-form.select>
                <x-form.input label="No. Telp" type="tel" name="no_telp" id="noTelpInput" :required="true" />
            </x-form.modal>
        </div>

        <x-component.datatables id="perawat">
            <thead>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>No. Telp</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nip }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->jk }}</td>
                        <td>{{ $user->no_telp }}</td>
                        <td class="text-center">
                            <x-component.button :small="true" navigate="{{ route('admin.perawat.edit', $user) }}">
                                Edit
                            </x-component.button>
                            <form action="{{ route('admin.perawat.delete', $user) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <x-component.button type="submit" color="danger" :small="true">
                                    Delete
                                </x-component.button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-component.datatables>
    </x-component.card>
</x-layout>
