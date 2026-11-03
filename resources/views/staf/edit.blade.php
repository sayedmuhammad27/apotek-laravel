@extends('layouts.app')

@section('title', 'Edit Staf Apotek · ' . $staf->nama)

@section('content')
<main class="main-wrapper" style="max-width: 650px; margin-top: 2rem;">
    <div class="app-card">
        <div class="app-card-header">
            <h2 class="app-card-title">
                <span>Edit Data Staf</span>
                <span class="badge-tag">{{ $staf->id_staff }}</span>
            </h2>
            <a href="{{ route('dashboard', ['tab' => 'staf']) }}" class="btn-action-edit" style="text-decoration: none;">← Kembali</a>
        </div>

        <form action="{{ route('staf.update', $staf) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Id Staff</label>
                <input type="text" name="id_staff" class="form-input" value="{{ old('id_staff', $staf->id_staff) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-input" value="{{ old('nama', $staf->nama) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-input" required>{{ old('alamat', $staf->alamat) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-input" value="{{ old('tanggal_lahir', $staf->tanggal_lahir?->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-input" value="{{ old('tempat_lahir', $staf->tempat_lahir) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-input" value="{{ old('no_hp', $staf->no_hp) }}" required>
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                <button type="submit" class="btn-simpan modern" style="flex: 1;">
                    💾 Simpan Perubahan
                </button>
                <a href="{{ route('dashboard', ['tab' => 'staf']) }}" class="btn-action-del" style="padding: 0.85rem 1.5rem; text-decoration: none; display: flex; align-items: center; justify-content: center;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</main>
@endsection
