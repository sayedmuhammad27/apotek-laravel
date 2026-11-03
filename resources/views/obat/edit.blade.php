@extends('layouts.app')

@section('title', 'Edit Obat · ' . $obat->nama_obat)

@section('content')
<main class="main-wrapper" style="max-width: 650px; margin-top: 2rem;">
    <div class="app-card">
        <div class="app-card-header">
            <h2 class="app-card-title">
                <span>Edit Data Obat</span>
                <span class="badge-tag">{{ $obat->kode_obat }}</span>
            </h2>
            <a href="{{ route('dashboard', ['tab' => 'obat']) }}" class="btn-action-edit" style="text-decoration: none;">← Kembali</a>
        </div>

        <form action="{{ route('obat.update', $obat) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Kode Obat</label>
                <input type="text" name="kode_obat" class="form-input" value="{{ old('kode_obat', $obat->kode_obat) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Nama Obat</label>
                <input type="text" name="nama_obat" class="form-input" value="{{ old('nama_obat', $obat->nama_obat) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Stock Obat</label>
                <input type="number" name="stock_obat" class="form-input" value="{{ old('stock_obat', $obat->stock_obat) }}" min="0" required>
            </div>

            <div class="form-group">
                <label class="form-label">Tanggal Kadaluarsa</label>
                <input type="date" name="tanggal_kadaluarsa" class="form-input" value="{{ old('tanggal_kadaluarsa', $obat->tanggal_kadaluarsa?->format('Y-m-d')) }}" required>
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                <button type="submit" class="btn-simpan modern" style="flex: 1;">
                    💾 Simpan Perubahan
                </button>
                <a href="{{ route('dashboard', ['tab' => 'obat']) }}" class="btn-action-del" style="padding: 0.85rem 1.5rem; text-decoration: none; display: flex; align-items: center; justify-content: center;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</main>
@endsection
