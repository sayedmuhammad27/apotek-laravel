@extends('layouts.app')

@section('title', 'Edit Obat: ' . $obat->nama_obat)

@section('content')
<main class="main-wrapper" style="max-width: 600px;">
    <section class="card-panel" aria-labelledby="edit-obat-title">
        <header class="card-panel-header">
            <h2 id="edit-obat-title" class="card-panel-title">Edit Data Obat</h2>
            <a href="{{ route('dashboard', ['tab' => 'obat']) }}" class="action-edit" style="font-size: 0.85rem;">Kembali ke Daftar</a>
        </header>

        <div class="card-panel-body">
            <form action="{{ route('obat.update', $obat) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-field">
                    <label for="kode_obat" class="form-label">
                        Kode Obat <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="kode_obat" name="kode_obat" class="form-control" value="{{ old('kode_obat', $obat->kode_obat) }}" required>
                </div>

                <div class="form-field">
                    <label for="nama_obat" class="form-label">
                        Nama Obat <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control" value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                </div>

                <div class="form-field">
                    <label for="stock_obat" class="form-label">
                        Stock Obat <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="number" id="stock_obat" name="stock_obat" class="form-control" value="{{ old('stock_obat', $obat->stock_obat) }}" min="0" required>
                </div>

                <div class="form-field">
                    <label for="tanggal_kadaluarsa" class="form-label">
                        Tanggal Kadaluarsa <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" class="form-control" value="{{ old('tanggal_kadaluarsa', $obat->tanggal_kadaluarsa?->format('Y-m-d')) }}" required>
                </div>

                <div style="display: flex; gap: 0.75rem; margin-top: 1.5rem;">
                    <button type="submit" class="btn-primary" style="flex: 1;">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('dashboard', ['tab' => 'obat']) }}" class="btn-secondary" style="flex: 1;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
