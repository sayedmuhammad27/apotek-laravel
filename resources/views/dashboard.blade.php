@extends('layouts.app')

@section('title', 'Dashboard Sistem Informasi Apotek')

@section('content')
<main class="main-wrapper">
    <!-- Hero Banner Inspired by Reference Design -->
    <section class="hero-banner">
        <div class="hero-content">
            <div class="hero-badge">
                <span>★ 4.9 PROJEK KELOMPOK</span>
                <span>•</span>
                <span>LARAVEL & POSTMAN</span>
            </div>
            <h1 class="hero-title">SISTEM INFORMASI<br>FARMASI & APOTEK</h1>
            <p class="hero-desc">
                Aplikasi manajemen data Pelanggan, Staf Apotek, dan Daftar Obat berbasis Laravel 12 dengan arsitektur MVC, integrasi database, dan terhubung penuh ke Postman API.
            </p>
            <div class="hero-actions">
                <a href="#form-section" class="btn-play">
                    ⚡ Mulai Kelola Data
                </a>
                <a href="{{ route('postman.collection') }}" class="btn-ghost-light">
                    📥 Download Postman Collection
                </a>
                <a href="{{ route('dashboard', ['mode' => $viewMode === 'lampiran' ? 'modern' : 'lampiran', 'tab' => $activeTab]) }}" class="btn-ghost-light" style="border-color: var(--accent); color: var(--accent);">
                    🔄 {{ $viewMode === 'lampiran' ? 'Beralih ke Desain Modern' : 'Beralih ke Format Lampiran (PDF)' }}
                </a>
            </div>
        </div>

        <!-- Quick Stats Widget -->
        <div class="hero-stats-card">
            <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.85rem; color: #475569; display: flex; justify-content: space-between; align-items: center;">
                <span>Ringkasan Database</span>
                <span style="font-size: 0.75rem; background: #ffe4e6; color: #be123c; padding: 0.2rem 0.5rem; border-radius: 9999px;">Live Data</span>
            </h3>
            <div class="stats-grid">
                <div class="stat-box">
                    <div class="stat-num">{{ $totalPelanggan }}</div>
                    <div class="stat-label">Pelanggan</div>
                </div>
                <div class="stat-box blue">
                    <div class="stat-num">{{ $totalStaf }}</div>
                    <div class="stat-label">Staf Apotek</div>
                </div>
                <div class="stat-box yellow">
                    <div class="stat-num">{{ $totalObat }}</div>
                    <div class="stat-label">Jenis Obat</div>
                </div>
                <div class="stat-box green">
                    <div class="stat-num">{{ $totalStock }}</div>
                    <div class="stat-label">Total Stok</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notification Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            <span style="font-size: 1.25rem;">✅</span>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <span style="font-size: 1.25rem;">⚠️</span>
            <div>
                <strong>Terdapat kesalahan pengisian data:</strong>
                <ul style="margin-top: 0.3rem; margin-left: 1.2rem;">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- Controls & Tab Bar -->
    <div class="controls-bar" id="form-section">
        <div class="tabs-list">
            <a href="{{ route('dashboard', ['tab' => 'pelanggan', 'mode' => $viewMode]) }}" class="tab-btn {{ $activeTab === 'pelanggan' ? 'active' : '' }}">
                👥 Pelanggan ({{ $totalPelanggan }})
            </a>
            <a href="{{ route('dashboard', ['tab' => 'staf', 'mode' => $viewMode]) }}" class="tab-btn {{ $activeTab === 'staf' ? 'active' : '' }}">
                🩺 Staf Apotek ({{ $totalStaf }})
            </a>
            <a href="{{ route('dashboard', ['tab' => 'obat', 'mode' => $viewMode]) }}" class="tab-btn {{ $activeTab === 'obat' ? 'active' : '' }}">
                💊 Daftar Obat ({{ $totalObat }})
            </a>
            <a href="{{ route('dashboard', ['tab' => 'api', 'mode' => $viewMode]) }}" class="tab-btn {{ $activeTab === 'api' ? 'active' : '' }}">
                🚀 REST API & Postman
            </a>
        </div>

        <div class="view-mode-toggle">
            <span style="font-size: 0.75rem; font-weight: 700; color: #64748b; margin-right: 0.3rem;">Mode:</span>
            <a href="{{ route('dashboard', ['tab' => $activeTab, 'mode' => 'modern']) }}" class="toggle-pill {{ $viewMode === 'modern' ? 'active' : '' }}">
                🎨 Modern
            </a>
            <a href="{{ route('dashboard', ['tab' => $activeTab, 'mode' => 'lampiran']) }}" class="toggle-pill {{ $viewMode === 'lampiran' ? 'active' : '' }}">
                📋 Lampiran PDF
            </a>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- MODE 1: FORMAT LAMPIRAN ASLI (Sesuai Dokumen PDF Dosen)         -->
    <!-- ============================================================== -->
    @if($viewMode === 'lampiran')
    <div class="pdf-wireframe-container">
        <div class="pdf-header-title">PROJEK KELOMPOK</div>

        <!-- Section 1: Pelanggan -->
        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf
            <div class="pdf-section-title">Pelanggan</div>
            
            <div class="pdf-form-group">
                <label class="pdf-label">Id Pelanggan</label>
                <input type="text" name="id_pelanggan" class="pdf-input" value="{{ old('id_pelanggan', 'PLG-' . str_pad($totalPelanggan + 1, 3, '0', STR_PAD_LEFT)) }}" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">Nama</label>
                <input type="text" name="nama" class="pdf-input" value="{{ old('nama') }}" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">Alamat</label>
                <input type="text" name="alamat" class="pdf-input" value="{{ old('alamat') }}" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">No HP</label>
                <input type="text" name="no_hp" class="pdf-input" value="{{ old('no_hp') }}" required>
            </div>

            <button type="submit" class="pdf-btn-simpan">simpan</button>
        </form>

        <hr style="margin: 2.5rem 0; border: none; border-top: 1px dashed #cbd5e1;">

        <!-- Section 2: Staf Apotek -->
        <form action="{{ route('staf.store') }}" method="POST">
            @csrf
            <div class="pdf-section-title">Staf Apotek</div>
            
            <div class="pdf-form-group">
                <label class="pdf-label">Id Staff</label>
                <input type="text" name="id_staff" class="pdf-input" value="{{ old('id_staff', 'STF-' . str_pad($totalStaf + 1, 3, '0', STR_PAD_LEFT)) }}" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">Nama</label>
                <input type="text" name="nama" class="pdf-input" value="{{ old('nama') }}" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">Alamat</label>
                <input type="text" name="alamat" class="pdf-input" value="{{ old('alamat') }}" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="pdf-input" value="{{ old('tanggal_lahir') }}" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">Tempat lahir</label>
                <input type="text" name="tempat_lahir" class="pdf-input" value="{{ old('tempat_lahir') }}" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">No HP</label>
                <input type="text" name="no_hp" class="pdf-input" value="{{ old('no_hp') }}" required>
            </div>

            <button type="submit" class="pdf-btn-simpan">simpan</button>
        </form>

        <hr style="margin: 2.5rem 0; border: none; border-top: 1px dashed #cbd5e1;">

        <!-- Section 3: Daftar Obat -->
        <form action="{{ route('obat.store') }}" method="POST">
            @csrf
            <div class="pdf-section-title">Daftar Obat</div>
            
            <div class="pdf-form-group">
                <label class="pdf-label">kode obat</label>
                <input type="text" name="kode_obat" class="pdf-input" value="{{ old('kode_obat', 'OBT-' . str_pad($totalObat + 1, 3, '0', STR_PAD_LEFT)) }}" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">Nama Obat</label>
                <input type="text" name="nama_obat" class="pdf-input" value="{{ old('nama_obat') }}" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">Stock obat</label>
                <input type="number" name="stock_obat" class="pdf-input" value="{{ old('stock_obat', 10) }}" min="0" required>
            </div>

            <div class="pdf-form-group">
                <label class="pdf-label">Tanggal Kadaluarsa/expired Obat</label>
                <input type="date" name="tanggal_kadaluarsa" class="pdf-input" value="{{ old('tanggal_kadaluarsa') }}" required>
            </div>

            <button type="submit" class="pdf-btn-simpan">simpan</button>
        </form>
    </div>

    <!-- ============================================================== -->
    <!-- MODE 2: FORMAT MODERN & INTERAKTIF (Sesuai Referensi Desain)   -->
    <!-- ============================================================== -->
    @else

        <!-- TAB 1: PELANGGAN -->
        @if($activeTab === 'pelanggan')
        <div class="content-grid">
            <!-- Left Form -->
            <div class="app-card">
                <div class="app-card-header">
                    <h2 class="app-card-title">
                        <span>Form Pelanggan</span>
                        <span class="badge-tag">Input Data</span>
                    </h2>
                </div>
                <form action="{{ route('pelanggan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Id Pelanggan <span class="req">*</span></label>
                        <input type="text" name="id_pelanggan" class="form-input" placeholder="Misal: PLG-006" value="{{ old('id_pelanggan', 'PLG-' . str_pad($totalPelanggan + 1, 3, '0', STR_PAD_LEFT)) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Pelanggan <span class="req">*</span></label>
                        <input type="text" name="nama" class="form-input" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alamat <span class="req">*</span></label>
                        <textarea name="alamat" class="form-input" placeholder="Masukkan alamat domisili lengkap" required>{{ old('alamat') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">No HP <span class="req">*</span></label>
                        <input type="text" name="no_hp" class="form-input" placeholder="08xxxxxxxxxx" value="{{ old('no_hp') }}" required>
                    </div>
                    <button type="submit" class="btn-simpan modern">
                        💾 Simpan Pelanggan
                    </button>
                </form>
            </div>

            <!-- Right Table -->
            <div class="app-card">
                <div class="app-card-header">
                    <h2 class="app-card-title">
                        <span>Data Pelanggan</span>
                        <span class="badge-tag">{{ $pelanggans->total() }} Terdaftar</span>
                    </h2>
                </div>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th style="text-align: right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pelanggans as $p)
                            <tr>
                                <td><span class="badge-code">{{ $p->id_pelanggan }}</span></td>
                                <td style="font-weight: 700;">{{ $p->nama }}</td>
                                <td>{{ Str::limit($p->alamat, 35) }}</td>
                                <td>{{ $p->no_hp }}</td>
                                <td style="text-align: right;">
                                    <div class="action-btns" style="justify-content: flex-end;">
                                        <a href="{{ route('pelanggan.edit', $p) }}" class="btn-action-edit">Edit</a>
                                        <form action="{{ route('pelanggan.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus data pelanggan {{ $p->nama }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action-del">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 2rem; color: #94a3b8;">
                                    Belum ada data pelanggan. Silakan input pada form sebelah kiri.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 1.25rem;">
                    {{ $pelanggans->appends(['tab' => 'pelanggan', 'mode' => $viewMode])->links() }}
                </div>
            </div>
        </div>
        @endif

        <!-- TAB 2: STAF APOTEK -->
        @if($activeTab === 'staf')
        <div class="content-grid">
            <!-- Left Form -->
            <div class="app-card">
                <div class="app-card-header">
                    <h2 class="app-card-title">
                        <span>Form Staf Apotek</span>
                        <span class="badge-tag">Input Staf</span>
                    </h2>
                </div>
                <form action="{{ route('staf.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Id Staff <span class="req">*</span></label>
                        <input type="text" name="id_staff" class="form-input" placeholder="Misal: STF-005" value="{{ old('id_staff', 'STF-' . str_pad($totalStaf + 1, 3, '0', STR_PAD_LEFT)) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Staf <span class="req">*</span></label>
                        <input type="text" name="nama" class="form-input" placeholder="Nama staf beserta gelar" value="{{ old('nama') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alamat <span class="req">*</span></label>
                        <textarea name="alamat" class="form-input" placeholder="Alamat tempat tinggal" required>{{ old('alamat') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Lahir <span class="req">*</span></label>
                        <input type="date" name="tanggal_lahir" class="form-input" value="{{ old('tanggal_lahir') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tempat Lahir <span class="req">*</span></label>
                        <input type="text" name="tempat_lahir" class="form-input" placeholder="Kota kelahiran" value="{{ old('tempat_lahir') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">No HP <span class="req">*</span></label>
                        <input type="text" name="no_hp" class="form-input" placeholder="08xxxxxxxxxx" value="{{ old('no_hp') }}" required>
                    </div>
                    <button type="submit" class="btn-simpan modern">
                        💾 Simpan Staf Apotek
                    </button>
                </form>
            </div>

            <!-- Right Table -->
            <div class="app-card">
                <div class="app-card-header">
                    <h2 class="app-card-title">
                        <span>Data Staf Apotek</span>
                        <span class="badge-tag">{{ $stafs->total() }} Staf Aktif</span>
                    </h2>
                </div>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID Staff</th>
                                <th>Nama Lengkap</th>
                                <th>TTL</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th style="text-align: right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stafs as $s)
                            <tr>
                                <td><span class="badge-code">{{ $s->id_staff }}</span></td>
                                <td style="font-weight: 700;">{{ $s->nama }}</td>
                                <td>{{ $s->tempat_lahir }}, {{ \Carbon\Carbon::parse($s->tanggal_lahir)->translatedFormat('d M Y') }}</td>
                                <td>{{ Str::limit($s->alamat, 25) }}</td>
                                <td>{{ $s->no_hp }}</td>
                                <td style="text-align: right;">
                                    <div class="action-btns" style="justify-content: flex-end;">
                                        <a href="{{ route('staf.edit', $s) }}" class="btn-action-edit">Edit</a>
                                        <form action="{{ route('staf.destroy', $s) }}" method="POST" onsubmit="return confirm('Hapus staf {{ $s->nama }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action-del">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 2rem; color: #94a3b8;">
                                    Belum ada data staf apotek. Silakan isi form di samping.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 1.25rem;">
                    {{ $stafs->appends(['tab' => 'staf', 'mode' => $viewMode])->links() }}
                </div>
            </div>
        </div>
        @endif

        <!-- TAB 3: DAFTAR OBAT -->
        @if($activeTab === 'obat')
        <div class="content-grid">
            <!-- Left Form -->
            <div class="app-card">
                <div class="app-card-header">
                    <h2 class="app-card-title">
                        <span>Form Daftar Obat</span>
                        <span class="badge-tag">Tambah Obat</span>
                    </h2>
                </div>
                <form action="{{ route('obat.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Kode Obat <span class="req">*</span></label>
                        <input type="text" name="kode_obat" class="form-input" placeholder="Misal: OBT-009" value="{{ old('kode_obat', 'OBT-' . str_pad($totalObat + 1, 3, '0', STR_PAD_LEFT)) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Obat <span class="req">*</span></label>
                        <input type="text" name="nama_obat" class="form-input" placeholder="Nama obat & dosis" value="{{ old('nama_obat') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Stock Obat <span class="req">*</span></label>
                        <input type="number" name="stock_obat" class="form-input" placeholder="Jumlah stok" value="{{ old('stock_obat', 50) }}" min="0" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Kadaluarsa / Expired <span class="req">*</span></label>
                        <input type="date" name="tanggal_kadaluarsa" class="form-input" value="{{ old('tanggal_kadaluarsa') }}" required>
                    </div>
                    <button type="submit" class="btn-simpan modern">
                        💾 Simpan Obat
                    </button>
                </form>
            </div>

            <!-- Right Table -->
            <div class="app-card">
                <div class="app-card-header">
                    <h2 class="app-card-title">
                        <span>Katalog Obat</span>
                        <span class="badge-tag">{{ $obats->total() }} Item</span>
                    </h2>
                </div>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Obat</th>
                                <th>Stok</th>
                                <th>Kedaluwarsa</th>
                                <th>Status</th>
                                <th style="text-align: right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($obats as $o)
                            @php
                                $exp = \Carbon\Carbon::parse($o->tanggal_kadaluarsa);
                                $isExpired = $exp->isPast();
                                $isSoon = !$isExpired && $exp->diffInDays(now()) <= 90;
                            @endphp
                            <tr>
                                <td><span class="badge-code">{{ $o->kode_obat }}</span></td>
                                <td style="font-weight: 700;">{{ $o->nama_obat }}</td>
                                <td>
                                    <span class="badge-stock {{ $o->stock_obat > 50 ? 'high' : ($o->stock_obat > 15 ? 'medium' : 'low') }}">
                                        {{ $o->stock_obat }} unit
                                    </span>
                                </td>
                                <td>{{ $exp->translatedFormat('d M Y') }}</td>
                                <td>
                                    @if($isExpired)
                                        <span class="badge-expiry expired">Kadaluarsa</span>
                                    @elseif($isSoon)
                                        <span class="badge-expiry soon">Hampir Expired</span>
                                    @else
                                        <span class="badge-expiry safe">Aman</span>
                                    @endif
                                </td>
                                <td style="text-align: right;">
                                    <div class="action-btns" style="justify-content: flex-end;">
                                        <a href="{{ route('obat.edit', $o) }}" class="btn-action-edit">Edit</a>
                                        <form action="{{ route('obat.destroy', $o) }}" method="POST" onsubmit="return confirm('Hapus obat {{ $o->nama_obat }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action-del">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 2rem; color: #94a3b8;">
                                    Belum ada obat yang tersimpan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 1.25rem;">
                    {{ $obats->appends(['tab' => 'obat', 'mode' => $viewMode])->links() }}
                </div>
            </div>
        </div>
        @endif

        <!-- TAB 4: POSTMAN & REST API -->
        @if($activeTab === 'api')
        <div class="app-card">
            <div class="app-card-header">
                <div>
                    <h2 class="app-card-title">
                        <span>Pusat Integrasi RESTful API & Postman</span>
                        <span class="badge-tag">Postman Collection v2.1</span>
                    </h2>
                    <p style="color: #64748b; font-size: 0.9rem; margin-top: 0.25rem;">
                        Semua endpoint dapat diuji langsung dari Postman menggunakan file koleksi yang telah kami sediakan, atau jalankan simulasi live request di bawah ini.
                    </p>
                </div>
                <div style="display: flex; gap: 0.75rem;">
                    <a href="{{ route('postman.collection') }}" class="btn-play" style="padding: 0.55rem 1.2rem; font-size: 0.85rem;">
                        📥 Download Koleksi (.json)
                    </a>
                    <a href="{{ route('postman.environment') }}" class="btn-ghost-light" style="padding: 0.55rem 1.2rem; font-size: 0.85rem; color: #881337; border-color: #f43f5e; background: #fff1f2;">
                        📥 Download Environment
                    </a>
                </div>
            </div>

            <!-- API Table List -->
            <div class="table-responsive" style="margin-bottom: 2rem;">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Modul</th>
                            <th>Method</th>
                            <th>Endpoint URL</th>
                            <th>Keterangan</th>
                            <th>Uji Langsung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Pelanggan</strong></td>
                            <td><span class="endpoint-pill">GET</span></td>
                            <td><code>/api/pelanggan</code></td>
                            <td>Ambil semua data pelanggan (JSON)</td>
                            <td><button onclick="testApi('/api/pelanggan', 'GET')" class="btn-action-edit" style="cursor: pointer; border: none;">Kirim Test</button></td>
                        </tr>
                        <tr>
                            <td><strong>Pelanggan</strong></td>
                            <td><span class="endpoint-pill post">POST</span></td>
                            <td><code>/api/pelanggan</code></td>
                            <td>Tambah pelanggan baru (JSON Body)</td>
                            <td><span style="font-size: 0.8rem; color: #64748b;">Gunakan Postman</span></td>
                        </tr>
                        <tr>
                            <td><strong>Pelanggan</strong></td>
                            <td><span class="endpoint-pill">GET</span></td>
                            <td><code>/api/pelanggan/PLG-001</code></td>
                            <td>Ambil detail pelanggan spesifik</td>
                            <td><button onclick="testApi('/api/pelanggan/PLG-001', 'GET')" class="btn-action-edit" style="cursor: pointer; border: none;">Kirim Test</button></td>
                        </tr>
                        <tr>
                            <td><strong>Staf Apotek</strong></td>
                            <td><span class="endpoint-pill">GET</span></td>
                            <td><code>/api/staff</code></td>
                            <td>Ambil seluruh data staf apotek</td>
                            <td><button onclick="testApi('/api/staff', 'GET')" class="btn-action-edit" style="cursor: pointer; border: none;">Kirim Test</button></td>
                        </tr>
                        <tr>
                            <td><strong>Staf Apotek</strong></td>
                            <td><span class="endpoint-pill">GET</span></td>
                            <td><code>/api/staff/STF-001</code></td>
                            <td>Ambil detail staf tertentu</td>
                            <td><button onclick="testApi('/api/staff/STF-001', 'GET')" class="btn-action-edit" style="cursor: pointer; border: none;">Kirim Test</button></td>
                        </tr>
                        <tr>
                            <td><strong>Daftar Obat</strong></td>
                            <td><span class="endpoint-pill">GET</span></td>
                            <td><code>/api/obat</code></td>
                            <td>Ambil seluruh daftar obat & status stok</td>
                            <td><button onclick="testApi('/api/obat', 'GET')" class="btn-action-edit" style="cursor: pointer; border: none;">Kirim Test</button></td>
                        </tr>
                        <tr>
                            <td><strong>Daftar Obat</strong></td>
                            <td><span class="endpoint-pill">GET</span></td>
                            <td><code>/api/obat/OBT-001</code></td>
                            <td>Ambil spesifikasi obat berdasarkan kode obat</td>
                            <td><button onclick="testApi('/api/obat/OBT-001', 'GET')" class="btn-action-edit" style="cursor: pointer; border: none;">Kirim Test</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Live API Tester Terminal -->
            <div class="api-tester-card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <div>
                        <h3 style="font-size: 1.1rem; margin: 0;">⚡ Live Postman API Console</h3>
                        <span style="font-size: 0.8rem; color: #94a3b8;">Hasil response JSON langsung dari backend Laravel</span>
                    </div>
                    <div id="api-status-badge" style="display: none; padding: 0.25rem 0.75rem; border-radius: 9999px; font-weight: 700; font-size: 0.8rem; background: #059669; color: #fff;">
                        STATUS: 200 OK
                    </div>
                </div>

                <div style="margin-bottom: 0.75rem; font-family: monospace; font-size: 0.85rem; color: #93c5fd;" id="request-target">
                    Menunggu request pengujian... Klik tombol 'Kirim Test' pada tabel di atas.
                </div>

                <pre class="json-output" id="json-console">{
  "info": "Klik salah satu tombol 'Kirim Test' di atas atau buka Postman Anda untuk menguji endpoint secara realtime."
}</pre>
            </div>
        </div>
        @endif

    @endif
</main>
@endsection

@section('scripts')
<script>
    async function testApi(endpoint, method) {
        const consoleEl = document.getElementById('json-console');
        const targetEl = document.getElementById('request-target');
        const badgeEl = document.getElementById('api-status-badge');

        targetEl.innerHTML = `<strong>Sending:</strong> <span style="color: #facc15;">${method}</span> ${window.location.origin}${endpoint}`;
        consoleEl.innerText = "Memproses permintaan ke backend Laravel...";

        try {
            const start = performance.now();
            const res = await fetch(endpoint, {
                headers: {
                    'Accept': 'application/json'
                }
            });
            const elapsed = Math.round(performance.now() - start);
            const data = await res.json();

            badgeEl.style.display = 'inline-block';
            badgeEl.style.background = res.ok ? '#059669' : '#dc2626';
            badgeEl.innerText = `STATUS: ${res.status} ${res.statusText} (${elapsed}ms)`;

            consoleEl.innerText = JSON.stringify(data, null, 2);
        } catch (err) {
            badgeEl.style.display = 'inline-block';
            badgeEl.style.background = '#dc2626';
            badgeEl.innerText = 'STATUS: NETWORK ERROR';
            consoleEl.innerText = JSON.stringify({ error: err.message }, null, 2);
        }
    }
</script>
@endsection
