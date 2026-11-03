@extends('layouts.app')

@section('title', 'Edit Pelanggan · ' . $pelanggan->nama)

@section('content')
<main class="main-wrapper" style="max-width: 650px; margin-top: 2rem;">
    <div class="app-card">
        <div class="app-card-header">
            <h2 class="app-card-title">
                <span>Edit Data Pelanggan</span>
                <span class="badge-tag">{{ $pelanggan->id_pelanggan }}</span>
            </h2>
            <a href="{{ route('dashboard', ['tab' => 'pelanggan']) }}" class="btn-action-edit" style="text-decoration: none;">← Kembali</a>
        </div>

        <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Id Pelanggan</label>
                <input type="text" name="id_pelanggan" class="form-input" value="{{ old('id_pelanggan', $pelanggan->id_pelanggan) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Nama Pelanggan</label>
                <input type="text" name="nama" class="form-input" value="{{ old('nama', $pelanggan->nama) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-input" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-input" value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                <button type="submit" class="btn-simpan modern" style="flex: 1;">
                    💾 Simpan Perubahan
                </button>
                <a href="{{ route('dashboard', ['tab' => 'pelanggan']) }}" class="btn-action-del" style="padding: 0.85rem 1.5rem; text-decoration: none; display: flex; align-items: center; justify-content: center;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</main>
@endsection
