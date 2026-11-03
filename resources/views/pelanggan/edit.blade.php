@extends('layouts.app')

@section('title', 'Edit Pelanggan: ' . $pelanggan->nama)

@section('content')
<main class="main-wrapper" style="max-width: 600px;">
    <section class="card-panel" aria-labelledby="edit-pelanggan-title">
        <header class="card-panel-header">
            <h2 id="edit-pelanggan-title" class="card-panel-title">Edit Data Pelanggan</h2>
            <a href="{{ route('dashboard', ['tab' => 'pelanggan']) }}" class="action-edit" style="font-size: 0.85rem;">Kembali ke Daftar</a>
        </header>

        <div class="card-panel-body">
            <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-field">
                    <label for="id_pelanggan" class="form-label">
                        Id Pelanggan <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="id_pelanggan" name="id_pelanggan" class="form-control" value="{{ old('id_pelanggan', $pelanggan->id_pelanggan) }}" required>
                </div>

                <div class="form-field">
                    <label for="nama_pelanggan" class="form-label">
                        Nama Pelanggan <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="nama_pelanggan" name="nama" class="form-control" value="{{ old('nama', $pelanggan->nama) }}" required>
                </div>

                <div class="form-field">
                    <label for="alamat_pelanggan" class="form-label">
                        Alamat <span class="required" aria-hidden="true">*</span>
                    </label>
                    <textarea id="alamat_pelanggan" name="alamat" class="form-control" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                </div>

                <div class="form-field">
                    <label for="no_hp_pelanggan" class="form-label">
                        No HP <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="no_hp_pelanggan" name="no_hp" class="form-control" value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
                </div>

                <div style="display: flex; gap: 0.75rem; margin-top: 1.5rem;">
                    <button type="submit" class="btn-primary" style="flex: 1;">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('dashboard', ['tab' => 'pelanggan']) }}" class="btn-secondary" style="flex: 1;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
