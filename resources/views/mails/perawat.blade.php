<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pendaftaran Akun Puskesmas Namrole</title>
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
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: #ffffff;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666666;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Selamat Datang!</h1>
        </div>
        <div class="content">
            <p>Halo {{ $user->nama }},</p>

            <p>Anda telah terdaftar di website {{ config('app.name') }}. Akun Anda telah berhasil dibuat dan siap untuk digunakan.</p>

            <p>Detail akun Anda:</p>
            <ul>
                <li>NIP: {{ $user->nip }}</li>
                <li>Email: {{ $user->email }}</li>
                <li>Nama: {{ $user->nama }}</li>
            </ul>

            <p>Jika Anda memiliki pertanyaan atau mengalami kendala, jangan ragu untuk menghubungi kami.</p>
        </div>
        <div class="footer">
            <p>Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
            <p>&copy; 2024 {{ config('app.name') }}. Seluruh hak cipta dilindungi.</p>
        </div>
    </div>
</body>
</html>
