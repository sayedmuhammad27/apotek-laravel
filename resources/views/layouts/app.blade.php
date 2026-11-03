<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistem Informasi Apotek') - Sistem Terintegrasi Projek 2</title>
    <link rel="stylesheet" href="{{ asset('css/apotek.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="header-container">
            <a href="{{ route('landing') }}" class="brand-block">
                <div class="brand-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14M5 12h14"/>
                    </svg>
                </div>
                <div class="brand-info">
                    <h1>Apotek Farma Care</h1>
                    <span>Sistem Manajemen Apotek</span>
                </div>
            </a>

            <nav aria-label="Navigasi Utama">
                <div class="header-nav">
                    <a href="{{ route('landing') }}" class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('dashboard', ['tab' => 'pelanggan']) }}" class="nav-link {{ request()->routeIs('dashboard') && request('tab', 'pelanggan') === 'pelanggan' ? 'active' : '' }}">
                        Pelanggan
                    </a>
                    <a href="{{ route('dashboard', ['tab' => 'staf']) }}" class="nav-link {{ request()->routeIs('dashboard') && request('tab') === 'staf' ? 'active' : '' }}">
                        Staf Apotek
                    </a>
                    <a href="{{ route('dashboard', ['tab' => 'obat']) }}" class="nav-link {{ request()->routeIs('dashboard') && request('tab') === 'obat' ? 'active' : '' }}">
                        Daftar Obat
                    </a>
                    <a href="{{ route('postman.collection') }}" class="nav-action-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" y1="15" x2="12" y2="3"/>
                        </svg>
                        <span>Unduh Koleksi Postman</span>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="site-footer">
        <div class="footer-inner">
            <div>
                <strong>Apotek Farma Care</strong> : Sistem Terintegrasi Projek 2 (Sayed Muhammad Fathah Al Muttaqin - 2025903430076, Muhammad Nabil Al-Firdaus - 2025903430015)
            </div>
            <div>
                Laravel Framework (PHP 8.2) · MySQL XAMPP · Postman Collection v2.1
            </div>
        </div>
    </footer>
</body>
</html>
