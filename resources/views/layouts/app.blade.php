<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pegawai</title>
    
    {{-- Link ke Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Impor Font Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .container > h2 {
            text-align: center;
            font-weight: bold;
        }

        .navbar-custom-pink {
            background-color: #FBCFE8;
        }
        .table-dark {
            --bs-table-bg: #D81B60; /* Ganti kode warna ini jika mau */
            --bs-table-border-color: #D81B60;
            --bs-table-color: #ffffff; /* Pastikan teks tetap putih */
        }
        .btn-primary {
            --bs-btn-color: #ffffff; /* Teks Putih */
            --bs-btn-bg: #D81B60; /* Latar Pink Tua */
            --bs-btn-border-color: #D81B60; /* Border Pink Tua */
            
            /* Warna saat di-hover (sedikit lebih gelap) */
            --bs-btn-hover-color: #ffffff;
            --bs-btn-hover-bg: #b91753; 
            --bs-btn-hover-border-color: #ad154d;
            
            /* Warna saat ditekan */
            --bs-btn-active-color: #ffffff;
            --bs-btn-active-bg: #ad154d;
            --bs-btn-active-border-color: #a11347;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom-pink mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">App Pegawai</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('employees.index') }}">Pegawai</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('departments.index') }}">Departemen</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('positions.index') }}">Posisi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('attendances.index') }}">Absensi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('salaries.index') }}">Gaji</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
        <footer class="text-center mt-5 mb-3 text-muted">
        <small>© {{ date('Y') }} App Pegawai by Anindya</small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>