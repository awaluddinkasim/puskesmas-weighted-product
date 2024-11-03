<x-layout title="Evaluasi Perawat">
    <div class="row">
        <div class="col-md-5">
            <x-component.card :title="$user->nama">
                <div class="text-center">

                    <img src="{{ asset('assets/images/avatar.png') }}" alt="" class="rounded-circle w-50">

                </div>
                <h5>NIP</h5>
                <p>{{ $user->nip }}</p>

                <h5>Jenis Kelamin</h5>
                <p>{{ $user->jk }}</p>

                <h5>No. Telp</h5>
                <p>{{ $user->no_telp }}</p>
            </x-component.card>
        </div>
        <div class="col-md-7">
            <x-component.card>

                <form action="{{ route('admin.evaluasi.store', $user) }}" method="post">
                    @csrf

                    <x-form.radio label="Komunikasi">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="komunikasi" id="komunikasiRadio1"
                                value="1" required>
                            <label class="form-check-label" for="komunikasiRadio1">
                                Sangat tidak baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="komunikasi" id="komunikasiRadio2"
                                value="2" required>
                            <label class="form-check-label" for="komunikasiRadio2">
                                Tidak Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="komunikasi" id="komunikasiRadio3"
                                value="3" required>
                            <label class="form-check-label" for="komunikasiRadio3">
                                Cukup
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="komunikasi" id="komunikasiRadio4"
                                value="4" required>
                            <label class="form-check-label" for="komunikasiRadio4">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="komunikasi" id="komunikasiRadio5"
                                value="5" required>
                            <label class="form-check-label" for="komunikasiRadio5">
                                Sangat Baik
                            </label>
                        </div>
                    </x-form.radio>
                    <x-form.radio label="Sikap">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sikap" id="sikapRadio1"
                                value="1" required>
                            <label class="form-check-label" for="sikapRadio1">
                                Sangat tidak baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sikap" id="sikapRadio2"
                                value="2" required>
                            <label class="form-check-label" for="sikapRadio2">
                                Tidak Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sikap" id="sikapRadio3"
                                value="3" required>
                            <label class="form-check-label" for="sikapRadio3">
                                Cukup
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sikap" id="sikapRadio4"
                                value="4" required>
                            <label class="form-check-label" for="sikapRadio4">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sikap" id="sikapRadio5"
                                value="5" required>
                            <label class="form-check-label" for="sikapRadio5">
                                Sangat Baik
                            </label>
                        </div>
                    </x-form.radio>
                    <x-form.radio label="Kinerja">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kinerja" id="kinerjaRadio1"
                                value="1" required>
                            <label class="form-check-label" for="kinerjaRadio1">
                                Sangat tidak baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kinerja" id="kinerjaRadio2"
                                value="2" required>
                            <label class="form-check-label" for="kinerjaRadio2">
                                Tidak Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kinerja" id="kinerjaRadio3"
                                value="3" required>
                            <label class="form-check-label" for="kinerjaRadio3">
                                Cukup
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kinerja" id="kinerjaRadio4"
                                value="4" required>
                            <label class="form-check-label" for="kinerjaRadio4">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kinerja" id="kinerjaRadio5"
                                value="5" required>
                            <label class="form-check-label" for="kinerjaRadio5">
                                Sangat Baik
                            </label>
                        </div>
                    </x-form.radio>
                    <x-form.radio label="Keterampilan Teknis">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="keterampilan_teknis"
                                id="keterampilanTeknisRadio1" value="1" required>
                            <label class="form-check-label" for="keterampilanTeknisRadio1">
                                Sangat tidak baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="keterampilan_teknis"
                                id="keterampilanTeknisRadio2" value="2" required>
                            <label class="form-check-label" for="keterampilanTeknisRadio2">
                                Tidak Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="keterampilan_teknis"
                                id="keterampilanTeknisRadio3" value="3" required>
                            <label class="form-check-label" for="keterampilanTeknisRadio3">
                                Cukup
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="keterampilan_teknis"
                                id="keterampilanTeknisRadio4" value="4" required>
                            <label class="form-check-label" for="keterampilanTeknisRadio4">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="keterampilan_teknis"
                                id="keterampilanTeknisRadio5" value="5" required>
                            <label class="form-check-label" for="keterampilanTeknisRadio5">
                                Sangat Baik
                            </label>
                        </div>
                    </x-form.radio>


                    <x-component.button type="submit">Simpan</x-component.button>

                </form>
            </x-component.card>
        </div>
    </div>
</x-layout>
