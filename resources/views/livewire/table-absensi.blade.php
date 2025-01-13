<div>
    <div class="row">
        <div class="col-sm-8">
            <select class="form-select my-1" wire:model.live="month">
                <option value="" hidden selected>Pilih</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">
                        {{ Carbon\Carbon::createFromDate(null, $i)->translatedFormat('F') }}
                    </option>
                @endfor
            </select>

        </div>
        <div class="col-sm-4">
            <select class="form-select my-1" wire:model.live="year">
                <option value="" hidden selected>Pilih</option>
                @foreach ($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <x-component.table>
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align: center;">#</th>
                <th rowspan="2">NIP</th>
                <th rowspan="2">Nama</th>
                <th colspan="{{ count($dates) }}" class="text-center">Tanggal</th>
            </tr>
            <tr>
                @foreach ($dates as $date)
                    <th class="text-center">{{ Carbon\Carbon::parse($date)->format('d') }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nip }}</td>
                    <td>{{ $user->nama }}</td>
                    @foreach ($dates as $date)
                        <td class="text-center">
                            {{-- @if ($loop->iteration == 10) --}}
                            {{-- @dd($user->cekAbsensi($date)) --}}
                            {{-- @endif --}}
                            @if ($user->cekAbsensi($date))
                                @if ($user->cekAbsensi($date)->status == 'Terlambat')
                                    <a class="text-warning" target="_blank"
                                        href="{{ asset('kehadiran/' . $user->cekAbsensi($date)->img) }}">T</a>
                                @else
                                    <a class="text-success" target="_blank"
                                        href="{{ asset('kehadiran/' . $user->cekAbsensi($date)->img) }}">H</a>
                                @endif
                            @else
                                <span class="text-danger">A</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($dates) + 3 }}" class="text-center text-muted">Tidak ada data</td>
                </tr>
            @endforelse
    </x-component.table>
</div>
