<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistem Informasi Apotek') · Projek Kelompok</title>
    <link rel="stylesheet" href="{{ asset('css/apotek.css') }}">
</head>
<body>
    <!-- Top Header -->
    <header class="site-header">
        <div class="nav-container">
            <a href="{{ route('dashboard') }}" class="brand-wrapper">
                <div class="brand-logo-pill">💊</div>
                <div class="brand-text">
                    <h1>PROJEK KELOMPOK</h1>
                    <span>SISTEM INFORMASI APOTEK · LARAVEL & MYSQL</span>
                </div>
            </a>

            <nav>
                <ul class="nav-menu">
                    <li><a href="{{ route('dashboard', ['tab' => 'pelanggan']) }}" class="nav-link {{ request('tab', 'pelanggan') === 'pelanggan' ? 'active' : '' }}">Pelanggan</a></li>
                    <li><a href="{{ route('dashboard', ['tab' => 'staf']) }}" class="nav-link {{ request('tab') === 'staf' ? 'active' : '' }}">Staf Apotek</a></li>
                    <li><a href="{{ route('dashboard', ['tab' => 'obat']) }}" class="nav-link {{ request('tab') === 'obat' ? 'active' : '' }}">Daftar Obat</a></li>
                    <li><a href="{{ route('postman.collection') }}" class="nav-cta-btn">📥 Postman Collection</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Content Slot -->
    @yield('content')

    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-inner">
            <div>
                <strong>Apotek Farma Care</strong> — Sistem Terintegrasi Projek 2 (Sayed Muhammad & Muhammad Nabil Al Firdaus)
            </div>
            <div>
                Laravel Framework · MySQL (XAMPP) · Postman REST API
            </div>
        </div>
    </footer>
</body>
</html>
