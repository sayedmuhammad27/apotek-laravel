@extends('layouts.app')

@section('title', 'Sistem Informasi Apotek')

@section('content')
<main class="main-wrapper">
    <!-- Hero Banner -->
    <section class="hero-banner">
        <div class="hero-content">
            <div class="hero-badge">
                <span>★ PROJEK KELOMPOK</span>
                <span>•</span>
                <span>LARAVEL & MYSQL XAMPP</span>
            </div>
            <h1 class="hero-title">SISTEM INFORMASI<br>MANAJEMEN APOTEK</h1>
            <p class="hero-desc">
                Aplikasi manajemen data Pelanggan, Staf Apotek, dan Daftar Obat. Terhubung langsung dengan database MySQL XAMPP dan siap diuji melalui Postman API.
            </p>
            <div class="hero-actions">
                <a href="#form-section" class="btn-play">
                    ⚡ Kelola Data Apotek
                </a>
                <a href="{{ route('postman.collection') }}" class="btn-ghost-light">
                    📥 Download Koleksi Postman
                </a>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="hero-stats-card">
            <h3 style="font-size: 0.95rem; font-weight: 700; margin-bottom: 0.85rem; color: #475569;">
                Status Database MySQL (XAMPP)
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
                    <div class="stat-label">Daftar Obat</div>
                </div>
                <div class="stat-box green">
                    <div class="stat-num">Aktif</div>
                    <div class="stat-label">MySQL 3306</div>
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
                <strong>Periksa kembali data Anda:</strong>
                <ul style="margin-top: 0.3rem; margin-left: 1.2rem;">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- Tab Bar -->
    <div class="controls-bar" id="form-section">
        <div class="tabs-list">
            <a href="{{ route('dashboard', ['tab' => 'pelanggan']) }}" class="tab-btn {{ $activeTab === 'pelanggan' ? 'active' : '' }}">
                👥 Pelanggan ({{ $totalPelanggan }})
            </a>
            <a href="{{ route('dashboard', ['tab' => 'staf']) }}" class="tab-btn {{ $activeTab === 'staf' ? 'active' : '' }}">
                🩺 Staf Apotek ({{ $totalStaf }})
            </a>
            <a href="{{ route('dashboard', ['tab' => 'obat']) }}" class="tab-btn {{ $activeTab === 'obat' ? 'active' : '' }}">
                💊 Daftar Obat ({{ $totalObat }})
            </a>
        </div>
    </div>

    <!-- TAB 1: PELANGGAN -->
    @if($activeTab === 'pelanggan')
    <div class="content-grid">
        <!-- Form Pelanggan -->
        <div class="app-card">
            <div class="app-card-header">
                <h2 class="app-card-title">
                    <span>Pelanggan</span>
                    <span class="badge-tag">Input Data</span>
                </h2>
            </div>
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Id Pelanggan <span class="req">*</span></label>
                    <input type="text" name="id_pelanggan" class="form-input" placeholder="Id Pelanggan" value="{{ old('id_pelanggan', 'PLG-' . str_pad($totalPelanggan + 1, 3, '0', STR_PAD_LEFT)) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama <span class="req">*</span></label>
                    <input type="text" name="nama" class="form-input" placeholder="Nama Pelanggan" value="{{ old('nama') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat <span class="req">*</span></label>
                    <textarea name="alamat" class="form-input" placeholder="Alamat Pelanggan" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">No HP <span class="req">*</span></label>
                    <input type="text" name="no_hp" class="form-input" placeholder="No HP" value="{{ old('no_hp') }}" required>
                </div>
                <button type="submit" class="btn-simpan modern">
                    simpan
                </button>
            </form>
        </div>

        <!-- Tabel Pelanggan -->
        <div class="app-card">
            <div class="app-card-header">
                <h2 class="app-card-title">
                    <span>Data Pelanggan</span>
                    <span class="badge-tag">{{ $pelanggans->total() }} Data</span>
                </h2>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Id Pelanggan</th>
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
                            <td>{{ $p->alamat }}</td>
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
                                Belum ada data pelanggan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div style="margin-top: 1.25rem;">
                {{ $pelanggans->appends(['tab' => 'pelanggan'])->links() }}
            </div>
        </div>
    </div>
    @endif

    <!-- TAB 2: STAF APOTEK -->
    @if($activeTab === 'staf')
    <div class="content-grid">
        <!-- Form Staf Apotek -->
        <div class="app-card">
            <div class="app-card-header">
                <h2 class="app-card-title">
                    <span>Staf Apotek</span>
                    <span class="badge-tag">Input Data</span>
                </h2>
            </div>
            <form action="{{ route('staf.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Id Staff <span class="req">*</span></label>
                    <input type="text" name="id_staff" class="form-input" placeholder="Id Staff" value="{{ old('id_staff', 'STF-' . str_pad($totalStaf + 1, 3, '0', STR_PAD_LEFT)) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama <span class="req">*</span></label>
                    <input type="text" name="nama" class="form-input" placeholder="Nama Staf" value="{{ old('nama') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat <span class="req">*</span></label>
                    <textarea name="alamat" class="form-input" placeholder="Alamat Staf" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal Lahir <span class="req">*</span></label>
                    <input type="date" name="tanggal_lahir" class="form-input" value="{{ old('tanggal_lahir') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Tempat lahir <span class="req">*</span></label>
                    <input type="text" name="tempat_lahir" class="form-input" placeholder="Tempat lahir" value="{{ old('tempat_lahir') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">No HP <span class="req">*</span></label>
                    <input type="text" name="no_hp" class="form-input" placeholder="No HP" value="{{ old('no_hp') }}" required>
                </div>
                <button type="submit" class="btn-simpan modern">
                    simpan
                </button>
            </form>
        </div>

        <!-- Tabel Staf Apotek -->
        <div class="app-card">
            <div class="app-card-header">
                <h2 class="app-card-title">
                    <span>Data Staf Apotek</span>
                    <span class="badge-tag">{{ $stafs->total() }} Data</span>
                </h2>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Id Staff</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Tempat Lahir</th>
                            <th>No HP</th>
                            <th style="text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stafs as $s)
                        <tr>
                            <td><span class="badge-code">{{ $s->id_staff }}</span></td>
                            <td style="font-weight: 700;">{{ $s->nama }}</td>
                            <td>{{ $s->alamat }}</td>
                            <td>{{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $s->tempat_lahir }}</td>
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
                            <td colspan="7" style="text-align: center; padding: 2rem; color: #94a3b8;">
                                Belum ada data staf apotek.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div style="margin-top: 1.25rem;">
                {{ $stafs->appends(['tab' => 'staf'])->links() }}
            </div>
        </div>
    </div>
    @endif

    <!-- TAB 3: DAFTAR OBAT -->
    @if($activeTab === 'obat')
    <div class="content-grid">
        <!-- Form Obat -->
        <div class="app-card">
            <div class="app-card-header">
                <h2 class="app-card-title">
                    <span>Daftar Obat</span>
                    <span class="badge-tag">Input Data</span>
                </h2>
            </div>
            <form action="{{ route('obat.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">kode obat <span class="req">*</span></label>
                    <input type="text" name="kode_obat" class="form-input" placeholder="kode obat" value="{{ old('kode_obat', 'OBT-' . str_pad($totalObat + 1, 3, '0', STR_PAD_LEFT)) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Obat <span class="req">*</span></label>
                    <input type="text" name="nama_obat" class="form-input" placeholder="Nama Obat" value="{{ old('nama_obat') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Stock obat <span class="req">*</span></label>
                    <input type="number" name="stock_obat" class="form-input" placeholder="Stock obat" value="{{ old('stock_obat', 10) }}" min="0" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal Kadaluarsa/expired Obat <span class="req">*</span></label>
                    <input type="date" name="tanggal_kadaluarsa" class="form-input" value="{{ old('tanggal_kadaluarsa') }}" required>
                </div>
                <button type="submit" class="btn-simpan modern">
                    simpan
                </button>
            </form>
        </div>

        <!-- Tabel Obat -->
        <div class="app-card">
            <div class="app-card-header">
                <h2 class="app-card-title">
                    <span>Daftar Obat Tersimpan</span>
                    <span class="badge-tag">{{ $obats->total() }} Obat</span>
                </h2>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Stock</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th style="text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($obats as $o)
                        <tr>
                            <td><span class="badge-code">{{ $o->kode_obat }}</span></td>
                            <td style="font-weight: 700;">{{ $o->nama_obat }}</td>
                            <td>
                                <span class="badge-stock {{ $o->stock_obat > 50 ? 'high' : ($o->stock_obat > 15 ? 'medium' : 'low') }}">
                                    {{ $o->stock_obat }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($o->tanggal_kadaluarsa)->format('d-m-Y') }}</td>
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
                            <td colspan="5" style="text-align: center; padding: 2rem; color: #94a3b8;">
                                Belum ada data obat.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div style="margin-top: 1.25rem;">
                {{ $obats->appends(['tab' => 'obat'])->links() }}
            </div>
        </div>
    </div>
    @endif
</main>
@endsection
