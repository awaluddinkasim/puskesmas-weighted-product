<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2196F3;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
        }
        .attendance-info {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .status {
            display: inline-block;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 3px;
            font-size: 14px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            border-bottom: 1px solid #eeeeee;
            padding-bottom: 5px;
        }
        .label {
            font-weight: bold;
            color: #666666;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666666;
            background-color: #f9f9f9;
        }
        .map-location {
            background-color: #e3f2fd;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Notifikasi Absensi</h1>
        </div>
        <div class="content">
            <p>Halo {{ $user->nama }},</p>

            <p>Sistem telah mencatat absensi Anda dengan detail sebagai berikut:</p>

            <div class="attendance-info">
                <div class="info-row">
                    <span class="label">Status:</span>
                    <span class="status">{{ $absensi->status }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Tanggal:</span>
                    <span>{{ Carbon\Carbon::parse($absensi->time_in)->isoFormat('DD MMMM YYYY') }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Waktu:</span>
                    <span>{{ Carbon\Carbon::parse($absensi->time_in)->isoFormat('HH:mm') }}</span>
                </div>
            </div>

            <p>Jika Anda tidak melakukan absensi ini atau menemukan ketidaksesuaian, silakan hubungi kami.</p>
        </div>
        <div class="footer">
            <p>Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
            <p>&copy; 2024 {{ config('app.name') }}. Seluruh hak cipta dilindungi.</p>
        </div>
    </div>
</body>
</html>
