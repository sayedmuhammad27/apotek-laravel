@extends('layouts.app')

@section('title', 'Manajemen Data Apotek')

@section('content')
<main class="main-wrapper">
    <!-- Operational Page Top Bar -->
    <section class="page-top-bar" aria-labelledby="page-heading">
        <div class="page-title-block">
            <h2 id="page-heading">
                @if($activeTab === 'pelanggan')
                    Manajemen Data Pelanggan
                @elseif($activeTab === 'staf')
                    Manajemen Data Staf Apotek
                @else
                    Manajemen Inventaris Obat
                @endif
            </h2>
            <p>Kelola data dan periksa rekaman database secara langsung melalui sistem web maupun Postman API.</p>
        </div>

        <div class="metrics-row" aria-label="Ringkasan Jumlah Data">
            <div class="metric-pill">
                <span>Pelanggan:</span>
                <strong>{{ $totalPelanggan }}</strong>
            </div>
            <div class="metric-pill">
                <span>Staf Apotek:</span>
                <strong>{{ $totalStaf }}</strong>
            </div>
            <div class="metric-pill">
                <span>Daftar Obat:</span>
                <strong>{{ $totalObat }}</strong>
            </div>
        </div>
    </section>

    <!-- Notification Feedback -->
    @if(session('success'))
        <div class="alert-box alert-success" role="alert">
            <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if($errors->any())
        <div class="alert-box alert-danger" role="alert">
            <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <div>
                <strong>Periksa kembali isian formulir:</strong>
                <ul style="margin-top: 0.35rem; margin-left: 1.25rem;">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- Section Tab Bar -->
    <nav class="tabs-navigation" aria-label="Kategori Data">
        <a href="{{ route('dashboard', ['tab' => 'pelanggan']) }}" class="tab-item {{ $activeTab === 'pelanggan' ? 'active' : '' }}">
            <span>Pelanggan</span>
            <span class="tab-count">{{ $totalPelanggan }}</span>
        </a>
        <a href="{{ route('dashboard', ['tab' => 'staf']) }}" class="tab-item {{ $activeTab === 'staf' ? 'active' : '' }}">
            <span>Staf Apotek</span>
            <span class="tab-count">{{ $totalStaf }}</span>
        </a>
        <a href="{{ route('dashboard', ['tab' => 'obat']) }}" class="tab-item {{ $activeTab === 'obat' ? 'active' : '' }}">
            <span>Daftar Obat</span>
            <span class="tab-count">{{ $totalObat }}</span>
        </a>
    </nav>

    <!-- TAB 1: PELANGGAN -->
    @if($activeTab === 'pelanggan')
    <div class="workspace-grid">
        <!-- Form Pelanggan -->
        <section class="card-panel" aria-labelledby="form-pelanggan-title">
            <header class="card-panel-header">
                <h3 id="form-pelanggan-title" class="card-panel-title">Form Tambah Pelanggan</h3>
            </header>
            <div class="card-panel-body">
                <form action="{{ route('pelanggan.store') }}" method="POST">
                    @csrf
                    <div class="form-field">
                        <label for="id_pelanggan" class="form-label">
                            Id Pelanggan <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="id_pelanggan" name="id_pelanggan" class="form-control" value="{{ old('id_pelanggan', 'PLG-' . str_pad($totalPelanggan + 1, 3, '0', STR_PAD_LEFT)) }}" required>
                    </div>

                    <div class="form-field">
                        <label for="nama_pelanggan" class="form-label">
                            Nama Pelanggan <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="nama_pelanggan" name="nama" class="form-control" placeholder="Nama lengkap pelanggan" value="{{ old('nama') }}" required>
                    </div>

                    <div class="form-field">
                        <label for="alamat_pelanggan" class="form-label">
                            Alamat <span class="required" aria-hidden="true">*</span>
                        </label>
                        <textarea id="alamat_pelanggan" name="alamat" class="form-control" placeholder="Alamat domisili" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="form-field">
                        <label for="no_hp_pelanggan" class="form-label">
                            No HP <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="no_hp_pelanggan" name="no_hp" class="form-control" placeholder="Nomor handphone aktif" value="{{ old('no_hp') }}" required>
                    </div>

                    <button type="submit" class="btn-primary">
                        Simpan Pelanggan
                    </button>
                </form>
            </div>
        </section>

        <!-- Tabel Pelanggan -->
        <section class="card-panel" aria-labelledby="tabel-pelanggan-title">
            <header class="card-panel-header">
                <h3 id="tabel-pelanggan-title" class="card-panel-title">Daftar Pelanggan Terdaftar</h3>
            </header>
            <div class="table-container">
                <table class="standard-table">
                    <thead>
                        <tr>
                            <th scope="col">Id Pelanggan</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No HP</th>
                            <th scope="col" style="text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pelanggans as $p)
                        <tr>
                            <td><span class="code-chip">{{ $p->id_pelanggan }}</span></td>
                            <td style="font-weight: 600;">{{ $p->nama }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->no_hp }}</td>
                            <td style="text-align: right;">
                                <div class="table-actions">
                                    <a href="{{ route('pelanggan.edit', $p) }}" class="action-edit" aria-label="Ubah data {{ $p->nama }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('pelanggan.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus data pelanggan {{ $p->nama }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-delete" aria-label="Hapus data {{ $p->nama }}">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="empty-state-cell">
                                <div class="empty-state-text">
                                    Belum ada data pelanggan yang tersimpan. Gunakan formulir di sebelah kiri untuk menambahkan data pelanggan baru.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($pelanggans->hasPages())
            <div style="padding: 1rem 1.25rem; border-top: 1px solid var(--color-border-light);">
                {{ $pelanggans->appends(['tab' => 'pelanggan'])->links() }}
            </div>
            @endif
        </section>
    </div>
    @endif

    <!-- TAB 2: STAF APOTEK -->
    @if($activeTab === 'staf')
    <div class="workspace-grid">
        <!-- Form Staf Apotek -->
        <section class="card-panel" aria-labelledby="form-staf-title">
            <header class="card-panel-header">
                <h3 id="form-staf-title" class="card-panel-title">Form Tambah Staf Apotek</h3>
            </header>
            <div class="card-panel-body">
                <form action="{{ route('staf.store') }}" method="POST">
                    @csrf
                    <div class="form-field">
                        <label for="id_staff" class="form-label">
                            Id Staff <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="id_staff" name="id_staff" class="form-control" value="{{ old('id_staff', 'STF-' . str_pad($totalStaf + 1, 3, '0', STR_PAD_LEFT)) }}" required>
                    </div>

                    <div class="form-field">
                        <label for="nama_staff" class="form-label">
                            Nama <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="nama_staff" name="nama" class="form-control" placeholder="Nama staf dan gelar" value="{{ old('nama') }}" required>
                    </div>

                    <div class="form-field">
                        <label for="alamat_staff" class="form-label">
                            Alamat <span class="required" aria-hidden="true">*</span>
                        </label>
                        <textarea id="alamat_staff" name="alamat" class="form-control" placeholder="Alamat domisili staf" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="form-field">
                        <label for="tanggal_lahir" class="form-label">
                            Tanggal Lahir <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
                    </div>

                    <div class="form-field">
                        <label for="tempat_lahir" class="form-label">
                            Tempat Lahir <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Kota kelahiran" value="{{ old('tempat_lahir') }}" required>
                    </div>

                    <div class="form-field">
                        <label for="no_hp_staff" class="form-label">
                            No HP <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="no_hp_staff" name="no_hp" class="form-control" placeholder="Nomor handphone aktif" value="{{ old('no_hp') }}" required>
                    </div>

                    <button type="submit" class="btn-primary">
                        Simpan Staf Apotek
                    </button>
                </form>
            </div>
        </section>

        <!-- Tabel Staf Apotek -->
        <section class="card-panel" aria-labelledby="tabel-staf-title">
            <header class="card-panel-header">
                <h3 id="tabel-staf-title" class="card-panel-title">Daftar Staf Apotek</h3>
            </header>
            <div class="table-container">
                <table class="standard-table">
                    <thead>
                        <tr>
                            <th scope="col">Id Staff</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">No HP</th>
                            <th scope="col" style="text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stafs as $s)
                        <tr>
                            <td><span class="code-chip">{{ $s->id_staff }}</span></td>
                            <td style="font-weight: 600;">{{ $s->nama }}</td>
                            <td>{{ $s->alamat }}</td>
                            <td>{{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d M Y') }}</td>
                            <td>{{ $s->tempat_lahir }}</td>
                            <td>{{ $s->no_hp }}</td>
                            <td style="text-align: right;">
                                <div class="table-actions">
                                    <a href="{{ route('staf.edit', $s) }}" class="action-edit" aria-label="Ubah data {{ $s->nama }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('staf.destroy', $s) }}" method="POST" onsubmit="return confirm('Hapus data staf {{ $s->nama }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-delete" aria-label="Hapus data {{ $s->nama }}">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="empty-state-cell">
                                <div class="empty-state-text">
                                    Belum ada data staf apotek yang tersimpan. Gunakan formulir di sebelah kiri untuk menambahkan staf apotek baru.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($stafs->hasPages())
            <div style="padding: 1rem 1.25rem; border-top: 1px solid var(--color-border-light);">
                {{ $stafs->appends(['tab' => 'staf'])->links() }}
            </div>
            @endif
        </section>
    </div>
    @endif

    <!-- TAB 3: DAFTAR OBAT -->
    @if($activeTab === 'obat')
    <div class="workspace-grid">
        <!-- Form Obat -->
        <section class="card-panel" aria-labelledby="form-obat-title">
            <header class="card-panel-header">
                <h3 id="form-obat-title" class="card-panel-title">Form Tambah Obat</h3>
            </header>
            <div class="card-panel-body">
                <form action="{{ route('obat.store') }}" method="POST">
                    @csrf
                    <div class="form-field">
                        <label for="kode_obat" class="form-label">
                            Kode Obat <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="kode_obat" name="kode_obat" class="form-control" value="{{ old('kode_obat', 'OBT-' . str_pad($totalObat + 1, 3, '0', STR_PAD_LEFT)) }}" required>
                    </div>

                    <div class="form-field">
                        <label for="nama_obat" class="form-label">
                            Nama Obat <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="nama_obat" name="nama_obat" class="form-control" placeholder="Nama obat dan dosis" value="{{ old('nama_obat') }}" required>
                    </div>

                    <div class="form-field">
                        <label for="stock_obat" class="form-label">
                            Stock Obat <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="number" id="stock_obat" name="stock_obat" class="form-control" placeholder="Jumlah fisik obat" value="{{ old('stock_obat', 10) }}" min="0" required>
                    </div>

                    <div class="form-field">
                        <label for="tanggal_kadaluarsa" class="form-label">
                            Tanggal Kadaluarsa / Expired <span class="required" aria-hidden="true">*</span>
                        </label>
                        <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" class="form-control" value="{{ old('tanggal_kadaluarsa') }}" required>
                    </div>

                    <button type="submit" class="btn-primary">
                        Simpan Data Obat
                    </button>
                </form>
            </div>
        </section>

        <!-- Tabel Obat -->
        <section class="card-panel" aria-labelledby="tabel-obat-title">
            <header class="card-panel-header">
                <h3 id="tabel-obat-title" class="card-panel-title">Katalog Inventaris Obat</h3>
            </header>
            <div class="table-container">
                <table class="standard-table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Obat</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Kadaluarsa</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($obats as $o)
                        @php
                            $exp = \Carbon\Carbon::parse($o->tanggal_kadaluarsa);
                            $isExpired = $exp->isPast();
                            $isLowStock = $o->stock_obat <= 15;
                        @endphp
                        <tr>
                            <td><span class="code-chip">{{ $o->kode_obat }}</span></td>
                            <td style="font-weight: 600;">{{ $o->nama_obat }}</td>
                            <td>{{ $o->stock_obat }} unit</td>
                            <td>{{ $exp->format('d M Y') }}</td>
                            <td>
                                @if($isExpired)
                                    <span class="status-badge expired">Kadaluarsa</span>
                                @elseif($isLowStock)
                                    <span class="status-badge low-stock">Stok Menipis</span>
                                @else
                                    <span class="status-badge in-stock">Tersedia</span>
                                @endif
                            </td>
                            <td style="text-align: right;">
                                <div class="table-actions">
                                    <a href="{{ route('obat.edit', $o) }}" class="action-edit" aria-label="Ubah data {{ $o->nama_obat }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('obat.destroy', $o) }}" method="POST" onsubmit="return confirm('Hapus obat {{ $o->nama_obat }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-delete" aria-label="Hapus data {{ $o->nama_obat }}">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="empty-state-cell">
                                <div class="empty-state-text">
                                    Belum ada data obat yang tersimpan. Gunakan formulir di sebelah kiri untuk mencatat obat baru.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($obats->hasPages())
            <div style="padding: 1rem 1.25rem; border-top: 1px solid var(--color-border-light);">
                {{ $obats->appends(['tab' => 'obat'])->links() }}
            </div>
            @endif
        </section>
    </div>
    @endif
</main>
@endsection
