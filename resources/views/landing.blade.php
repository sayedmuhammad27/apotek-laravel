@extends('layouts.app')

@section('title', 'Beranda - Sistem Informasi Manajemen Apotek')

@section('content')
<main class="landing-main">

    {{-- HERO SECTION --}}
    <section class="landing-hero" aria-labelledby="hero-title">
        <div class="landing-hero-container">
            <div class="hero-badge">
                <span class="badge-dot" aria-hidden="true"></span>
                <span>Sistem Terintegrasi Projek 2 · Kelompok Mahasiswa</span>
            </div>

            <h1 id="hero-title" class="hero-title">
                Sistem Informasi Manajemen Apotek &amp; Layanan REST API Terintegrasi
            </h1>

            <p class="hero-lead">
                Platform terpusat untuk pengelolaan data pelanggan, staf apotek, dan inventaris obat secara real-time. Dilengkapi antarmuka web responsif berbasis Laravel 12, basis data MySQL XAMPP, dan dokumentasi RESTful API terstandarisasi Postman.
            </p>

            <div class="hero-actions">
                <a href="{{ route('dashboard') }}" class="btn-hero-primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="7"/>
                        <rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/>
                    </svg>
                    <span>Masuk ke Dashboard Sistem</span>
                </a>

                <a href="{{ route('postman.collection') }}" class="btn-hero-secondary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    <span>Unduh Postman Collection v2.1</span>
                </a>

                <a href="https://github.com/sayedmuhammad27/apotek-laravel" target="_blank" rel="noopener noreferrer" class="btn-hero-outline">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                    </svg>
                    <span>Repositori GitHub</span>
                </a>
            </div>

            {{-- LIVE DATABASE METRICS --}}
            <div class="hero-metrics-bar" aria-label="Ringkasan Data Operasional Aktif">
                <div class="metric-card">
                    <div class="metric-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <span class="metric-number">{{ number_format($totalPelanggan, 0, ',', '.') }}</span>
                        <span class="metric-label">Pelanggan Terdaftar</span>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <polyline points="16 11 18 13 22 9"/>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <span class="metric-number">{{ number_format($totalStaf, 0, ',', '.') }}</span>
                        <span class="metric-label">Staf Apotek Aktif</span>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <span class="metric-number">{{ number_format($totalObat, 0, ',', '.') }}</span>
                        <span class="metric-label">Varian Obat Farmasi</span>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"/>
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                            <line x1="12" y1="22.08" x2="12" y2="12"/>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <span class="metric-number">{{ number_format($totalStok, 0, ',', '.') }}</span>
                        <span class="metric-label">Total Unit Stok Fisik</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ENTITY MODULES SECTION --}}
    <section class="landing-section" id="modul" aria-labelledby="modules-title">
        <div class="section-container">
            <header class="section-header">
                <span class="section-tag">Struktur Entitas Utama</span>
                <h2 id="modules-title" class="section-title">Modul Manajemen Operasional Apotek</h2>
                <p class="section-desc">
                    Tiga entitas inti sesuai spesifikasi sistem terintegrasi, dirancang dengan skema relasional terstruktur dan kontrol CRUD lengkap.
                </p>
            </header>

            <div class="modules-grid">
                {{-- Modul 1: Pelanggan --}}
                <article class="module-card">
                    <div class="module-header">
                        <div class="module-icon-wrap" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                            </svg>
                        </div>
                        <span class="module-badge">Entitas 1</span>
                    </div>

                    <h3 class="module-title">Data Pelanggan (Pasien)</h3>
                    <p class="module-desc">
                        Pencatatan data identitas pelanggan apotek secara akurat untuk mempermudah riwayat penebusan resep dan komunikasi pelayanan obat.
                    </p>

                    <div class="module-attributes">
                        <span class="attr-chip">id_pelanggan</span>
                        <span class="attr-chip">nama</span>
                        <span class="attr-chip">alamat</span>
                        <span class="attr-chip">no_hp</span>
                    </div>

                    <div class="module-footer">
                        <div class="api-tag">
                            <code>/api/pelanggan</code>
                        </div>
                        <a href="{{ route('dashboard', ['tab' => 'pelanggan']) }}" class="module-link">
                            <span>Kelola Pelanggan</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                </article>

                {{-- Modul 2: Staf Apotek --}}
                <article class="module-card">
                    <div class="module-header">
                        <div class="module-icon-wrap" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <polyline points="16 11 18 13 22 9"/>
                            </svg>
                        </div>
                        <span class="module-badge">Entitas 2</span>
                    </div>

                    <h3 class="module-title">Data Staf &amp; Apoteker</h3>
                    <p class="module-desc">
                        Administrasi staf apotek, tenaga kefarmasian, dan petugas gudang untuk memastikan akuntabilitas operasional dan pelayanan resep.
                    </p>

                    <div class="module-attributes">
                        <span class="attr-chip">id_staff</span>
                        <span class="attr-chip">nama</span>
                        <span class="attr-chip">alamat</span>
                        <span class="attr-chip">tanggal_lahir</span>
                        <span class="attr-chip">tempat_lahir</span>
                    </div>

                    <div class="module-footer">
                        <div class="api-tag">
                            <code>/api/staff</code>
                        </div>
                        <a href="{{ route('dashboard', ['tab' => 'staf']) }}" class="module-link">
                            <span>Kelola Staf</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                </article>

                {{-- Modul 3: Daftar Obat --}}
                <article class="module-card">
                    <div class="module-header">
                        <div class="module-icon-wrap" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"/>
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                                <line x1="12" y1="22.08" x2="12" y2="12"/>
                            </svg>
                        </div>
                        <span class="module-badge">Entitas 3</span>
                    </div>

                    <h3 class="module-title">Inventaris &amp; Stok Obat</h3>
                    <p class="module-desc">
                        Monitoring kuantitas persediaan obat secara akurat, pengawasan tanggal kadaluarsa, serta pembaruan otomatis status ketersediaan obat.
                    </p>

                    <div class="module-attributes">
                        <span class="attr-chip">kode_obat</span>
                        <span class="attr-chip">nama_obat</span>
                        <span class="attr-chip">stock</span>
                        <span class="attr-chip">kadaluarsa</span>
                        <span class="attr-chip">status</span>
                    </div>

                    <div class="module-footer">
                        <div class="api-tag">
                            <code>/api/obat</code>
                        </div>
                        <a href="{{ route('dashboard', ['tab' => 'obat']) }}" class="module-link">
                            <span>Kelola Obat</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- ARCHITECTURE & INTEGRATION SECTION --}}
    <section class="landing-section section-alt" id="arsitektur" aria-labelledby="arch-title">
        <div class="section-container">
            <header class="section-header">
                <span class="section-tag">Arsitektur Terintegrasi</span>
                <h2 id="arch-title" class="section-title">Integrasi Sistem, Basis Data, dan RESTful API</h2>
                <p class="section-desc">
                    Dibangun dengan arsitektur multi-layer standar industri yang menghubungkan antarmuka web, logika bisnis, penyimpanan basis data relasional, dan endpoint REST API.
                </p>
            </header>

            <div class="arch-split-grid">
                {{-- 4 Pilar Arsitektur --}}
                <div class="arch-pillars-col">
                    <div class="pillar-item">
                        <div class="pillar-num">01</div>
                        <div class="pillar-content">
                            <h4>Presentasi Antarmuka (Laravel Blade)</h4>
                            <p>Tampilan web berbasis komponen Blade responsif dengan validasi formulir sisi server dan antarmuka ramah aksesibilitas WCAG AA.</p>
                        </div>
                    </div>

                    <div class="pillar-item">
                        <div class="pillar-num">02</div>
                        <div class="pillar-content">
                            <h4>Logika Bisnis &amp; ORM (Laravel 12.x)</h4>
                            <p>Pengelolaan relasi data menggunakan Eloquent ORM dengan proteksi mass assignment, sanitasi input, dan transaksi basis data aman.</p>
                        </div>
                    </div>

                    <div class="pillar-item">
                        <div class="pillar-num">03</div>
                        <div class="pillar-content">
                            <h4>Penyimpanan Relasional (MySQL XAMPP)</h4>
                            <p>Basis data relasional MySQL pada port 3306 dengan tabel terindeks (<code>pelanggans</code>, <code>staf_apoteks</code>, <code>obats</code>) untuk integritas data tinggi.</p>
                        </div>
                    </div>

                    <div class="pillar-item">
                        <div class="pillar-num">04</div>
                        <div class="pillar-content">
                            <h4>Layanan REST API &amp; Postman v2.1</h4>
                            <p>Backend API JSON standar HTTP siap uji secara instan melalui Postman tanpa ketergantungan konfigurasi lingkungan manual.</p>
                        </div>
                    </div>
                </div>

                {{-- API Payload Preview Box --}}
                <div class="arch-preview-col">
                    <div class="terminal-card">
                        <div class="terminal-bar">
                            <div class="terminal-dots" aria-hidden="true">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                            </div>
                            <span class="terminal-title">POSTMAN REST API DEMO</span>
                            <span class="terminal-status">HTTP 200 OK</span>
                        </div>

                        <div class="terminal-endpoint">
                            <span class="http-verb get">GET</span>
                            <span class="http-url">http://127.0.0.1:8000/api/obat</span>
                        </div>

                        <pre class="terminal-code"><code>{
  <span class="code-key">"success"</span>: <span class="code-bool">true</span>,
  <span class="code-key">"message"</span>: <span class="code-str">"Daftar obat berhasil diambil"</span>,
  <span class="code-key">"data"</span>: [
    {
      <span class="code-key">"id"</span>: <span class="code-num">1</span>,
      <span class="code-key">"kode_obat"</span>: <span class="code-str">"OBT-001"</span>,
      <span class="code-key">"nama_obat"</span>: <span class="code-str">"Paracetamol 500mg"</span>,
      <span class="code-key">"stock_obat"</span>: <span class="code-num">150</span>,
      <span class="code-key">"tanggal_kadaluarsa"</span>: <span class="code-str">"2027-12-31"</span>,
      <span class="code-key">"status"</span>: <span class="code-str">"Tersedia"</span>
    },
    {
      <span class="code-key">"id"</span>: <span class="code-num">2</span>,
      <span class="code-key">"kode_obat"</span>: <span class="code-str">"OBT-002"</span>,
      <span class="code-key">"nama_obat"</span>: <span class="code-str">"Amoxicillin 500mg"</span>,
      <span class="code-key">"stock_obat"</span>: <span class="code-num">80</span>,
      <span class="code-key">"tanggal_kadaluarsa"</span>: <span class="code-str">"2026-08-15"</span>,
      <span class="code-key">"status"</span>: <span class="code-str">"Tersedia"</span>
    }
  ]
}</code></pre>

                        <div class="terminal-footer">
                            <span>Payload JSON terenkapsulasi dengan envelope standar</span>
                            <a href="{{ route('postman.collection') }}" class="terminal-btn">
                                Unduh Koleksi JSON
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- OPERATIONAL WORKFLOW SECTION --}}
    <section class="landing-section" id="alur-kerja" aria-labelledby="workflow-title">
        <div class="section-container">
            <header class="section-header">
                <span class="section-tag">Tahapan Penggunaan</span>
                <h2 id="workflow-title" class="section-title">Alur Kerja Sistem Informasi Apotek</h2>
                <p class="section-desc">
                    Mulai dari pencatatan data harian hingga sinkronisasi data melalui API dengan langkah-langkah terstruktur.
                </p>
            </header>

            <div class="workflow-steps-grid">
                <div class="step-card">
                    <div class="step-badge">Langkah 1</div>
                    <h3 class="step-title">Pencatatan &amp; Validasi Data</h3>
                    <p class="step-desc">
                        Pengguna menginput data pelanggan, registrasi staf farmasi, dan entri obat baru melalui formulir dashboard atau pengiriman request POST JSON.
                    </p>
                </div>

                <div class="step-card">
                    <div class="step-badge">Langkah 2</div>
                    <h3 class="step-title">Penyimpanan Terpusat MySQL</h3>
                    <p class="step-desc">
                        Data divalidasi ketat oleh Laravel FormRequest kemudian disimpan ke basis data MySQL di XAMPP dengan penguncian relasi unik (ID Pelanggan, ID Staf, Kode Obat).
                    </p>
                </div>

                <div class="step-card">
                    <div class="step-badge">Langkah 3</div>
                    <h3 class="step-title">Konsumsi &amp; Pengujian API</h3>
                    <p class="step-desc">
                        Aplikasi eksternal atau aplikasi mobile dapat mengonsumsi endpoint REST API secara langsung, teruji 100% menggunakan Postman Collection v2.1.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- DEVELOPER IDENTITY & PRESENTATION BANNER --}}
    <section class="landing-section section-alt" id="pengembang" aria-labelledby="team-title">
        <div class="section-container">
            <div class="team-banner-card">
                <div class="team-badge">Identitas Tugas &amp; Pengembang</div>
                <h2 id="team-title" class="team-title">Sistem Terintegrasi Projek 2</h2>
                <p class="team-subtitle">
                    Aplikasi ini dikembangkan untuk memenuhi tugas mata kuliah Sistem Terintegrasi dengan jadwal presentasi resmi pada Kamis, 6 November 2026.
                </p>

                <div class="team-members-grid">
                    <div class="member-card">
                        <div class="member-avatar" aria-hidden="true">SM</div>
                        <div class="member-info">
                            <h4>Sayed Muhammad Fathah Al Muttaqin</h4>
                            <span class="member-role">NIM: 2025903430076 · TRKJ.2A</span>
                            <a href="https://github.com/sayedmuhammad27" target="_blank" rel="noopener noreferrer" class="member-gh">
                                github.com/sayedmuhammad27
                            </a>
                        </div>
                    </div>

                    <div class="member-card">
                        <div class="member-avatar" aria-hidden="true">MN</div>
                        <div class="member-info">
                            <h4>Muhammad Nabil Al-Firdaus</h4>
                            <span class="member-role">NIM: 2025903430015 · TRKJ.2A</span>
                            <a href="https://github.com/projectfall26-beep" target="_blank" rel="noopener noreferrer" class="member-gh">
                                github.com/projectfall26-beep
                            </a>
                        </div>
                    </div>
                </div>

                <div class="tech-stack-row">
                    <span class="tech-pill">Laravel 12.x</span>
                    <span class="tech-pill">PHP 8.2+</span>
                    <span class="tech-pill">MySQL XAMPP (Port 3306)</span>
                    <span class="tech-pill">RESTful API Architecture</span>
                    <span class="tech-pill">Postman Collection v2.1</span>
                    <span class="tech-pill">Git &amp; GitHub Version Control</span>
                </div>
            </div>
        </div>
    </section>

    {{-- CLOSING CALL TO ACTION --}}
    <section class="landing-cta-section" aria-labelledby="cta-title">
        <div class="section-container">
            <div class="cta-inner-card">
                <h2 id="cta-title" class="cta-title">Siap Mengelola Operasional Apotek?</h2>
                <p class="cta-desc">
                    Masuk ke antarmuka dashboard untuk mengelola seluruh data secara langsung atau unduh koleksi Postman untuk menguji endpoint REST API.
                </p>
                <div class="cta-buttons">
                    <a href="{{ route('dashboard') }}" class="btn-hero-primary">
                        <span>Buka Dashboard Sistem</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </a>
                    <a href="{{ route('postman.collection') }}" class="btn-hero-secondary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" y1="15" x2="12" y2="3"/>
                        </svg>
                        <span>Unduh Koleksi Postman</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
