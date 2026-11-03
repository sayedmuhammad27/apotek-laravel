<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistem Informasi Apotek') · Projek Kelompok</title>
    <link rel="stylesheet" href="{{ asset('css/apotek.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>
    <!-- Top Header -->
    <header class="site-header">
        <div class="nav-container">
            <a href="{{ route('dashboard') }}" class="brand-wrapper">
                <div class="brand-logo-pill">💊</div>
                <div class="brand-text">
                    <h1>PROJEK KELOMPOK</h1>
                    <span>SISTEM INFORMASI APOTEK · LARAVEL 12</span>
                </div>
            </a>

            <nav>
                <ul class="nav-menu">
                    <li><a href="{{ route('dashboard', ['tab' => 'pelanggan', 'mode' => request('mode', 'modern')]) }}" class="nav-link {{ request('tab', 'pelanggan') === 'pelanggan' && request('mode') !== 'lampiran' ? 'active' : '' }}">Pelanggan</a></li>
                    <li><a href="{{ route('dashboard', ['tab' => 'staf', 'mode' => request('mode', 'modern')]) }}" class="nav-link {{ request('tab') === 'staf' && request('mode') !== 'lampiran' ? 'active' : '' }}">Staf Apotek</a></li>
                    <li><a href="{{ route('dashboard', ['tab' => 'obat', 'mode' => request('mode', 'modern')]) }}" class="nav-link {{ request('tab') === 'obat' && request('mode') !== 'lampiran' ? 'active' : '' }}">Daftar Obat</a></li>
                    <li><a href="{{ route('dashboard', ['tab' => 'api', 'mode' => request('mode', 'modern')]) }}" class="nav-link {{ request('tab') === 'api' ? 'active' : '' }}">REST API & Postman</a></li>
                    <li><a href="{{ route('dashboard', ['mode' => 'lampiran']) }}" class="nav-link {{ request('mode') === 'lampiran' ? 'active' : '' }}" style="color: #0284c7; font-weight: 700;">📄 Format PDF</a></li>
                    <li><a href="{{ route('laporan') }}" target="_blank" class="nav-link" style="color: #15803d; font-weight: 700;">📑 Laporan Lengkap</a></li>
                    <li><a href="{{ route('postman.collection') }}" class="nav-cta-btn">🚀 Download Postman</a></li>
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
                <strong>Apotek Farma Care</strong> — Tugas Projek Kelompok Pemrograman Web & API
            </div>
            <div>
                <a href="{{ route('laporan') }}" target="_blank" style="color: #be123c; font-weight: 700; text-decoration: none; margin-right: 1rem;">Lihat Laporan Proyek</a>
                Laravel Framework v12 · Postman Collection v2.1 · SQLite / MySQL XAMPP
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
