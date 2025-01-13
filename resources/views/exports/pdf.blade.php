<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perawat Terbaik Periode {{ Carbon\Carbon::now()->isoFormat('MMMM YYYY') }}</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            line-height: 1.5;
        }

        h3 {
            margin: 0;
        }

        h4 {
            margin-top: 0;
            font-weight: normal
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: #888;
        }
    </style>
</head>

<body>
    <h3>Perawat Terbaik Puskesmas Namrole</h3>
    <h4>Periode {{ Carbon\Carbon::create(Request::get('tahun'), Request::get('bulan'))->isoFormat('MMMM YYYY') }}</h4>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Perawat</th>
                <th>Vector S</th>
                <th>Vector V</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($results as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->evaluasi->perawat->nama }}</td>
                    <td>{{ round($result->bobot, 3) }}</td>
                    <td>{{ round($result->vectorV, 3) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
