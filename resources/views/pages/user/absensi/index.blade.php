@push('scripts')
    <script src="{{ asset('assets/libs/webcam.min.js') }}"></script>
    @if (Carbon\Carbon::parse(now())->dayName != 'Minggu')
        @if (!$absenHariIni)
            <script>
                Webcam.set({
                    width: 320,
                    height: 240,
                    image_format: 'jpeg',
                    jpeg_quality: 90
                });
                Webcam.attach('#camera');

                function take_snapshot() {
                    Webcam.snap(function(data_uri) {
                        $("#foto").val(data_uri);
                        console.log(data_uri);
                        document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';
                    });
                }
            </script>
        @endif
    @endif
@endpush

<x-layout title="Absensi">
    <x-component.card>
        <div class="mx-auto text-center" style="width: 300px">
            @if (Carbon\Carbon::parse(now())->dayName != 'Minggu')
                @if (!$absenHariIni)
                    <div id="camera"></div>
                    <div id="my_result" class="mt-1"></div>
                    <div class="my-3"></div>
                    <a href="javascript:void(take_snapshot())">Ambil Gambar</a>
                    <div class="my-3"></div>
                    <form action="{{ route('absensi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="img" id="foto" required>
                        <x-component.button type="submit">
                            Absen
                        </x-component.button>
                    </form>
                @else
                    <img src="{{ asset('kehadiran/' . $absenHariIni->img) }}" alt="" class="mb-3">
                    <p>Anda sudah absen hari ini pada pukul
                        {{ Carbon\Carbon::parse($absenHariIni->time_in)->isoFormat('HH:mm') }}</p>
                    <span
                        class="badge bg-{{ $absenHariIni->status == 'Terlambat' ? 'warning' : 'success' }}">{{ $absenHariIni->status }}</span>
                @endif
            @else
                <p>Hari ini libur</p>
            @endif
        </div>
    </x-component.card>
</x-layout>
