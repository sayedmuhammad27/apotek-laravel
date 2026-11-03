@extends('layouts.app')

@section('title', 'Edit Staf Apotek: ' . $staf->nama)

@section('content')
<main class="main-wrapper" style="max-width: 600px;">
    <section class="card-panel" aria-labelledby="edit-staf-title">
        <header class="card-panel-header">
            <h2 id="edit-staf-title" class="card-panel-title">Edit Data Staf Apotek</h2>
            <a href="{{ route('dashboard', ['tab' => 'staf']) }}" class="action-edit" style="font-size: 0.85rem;">Kembali ke Daftar</a>
        </header>

        <div class="card-panel-body">
            <form action="{{ route('staf.update', $staf) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-field">
                    <label for="id_staff" class="form-label">
                        Id Staff <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="id_staff" name="id_staff" class="form-control" value="{{ old('id_staff', $staf->id_staff) }}" required>
                </div>

                <div class="form-field">
                    <label for="nama_staff" class="form-label">
                        Nama Lengkap <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="nama_staff" name="nama" class="form-control" value="{{ old('nama', $staf->nama) }}" required>
                </div>

                <div class="form-field">
                    <label for="alamat_staff" class="form-label">
                        Alamat <span class="required" aria-hidden="true">*</span>
                    </label>
                    <textarea id="alamat_staff" name="alamat" class="form-control" required>{{ old('alamat', $staf->alamat) }}</textarea>
                </div>

                <div class="form-field">
                    <label for="tanggal_lahir" class="form-label">
                        Tanggal Lahir <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $staf->tanggal_lahir?->format('Y-m-d')) }}" required>
                </div>

                <div class="form-field">
                    <label for="tempat_lahir" class="form-label">
                        Tempat Lahir <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $staf->tempat_lahir) }}" required>
                </div>

                <div class="form-field">
                    <label for="no_hp_staff" class="form-label">
                        No HP <span class="required" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="no_hp_staff" name="no_hp" class="form-control" value="{{ old('no_hp', $staf->no_hp) }}" required>
                </div>

                <div style="display: flex; gap: 0.75rem; margin-top: 1.5rem;">
                    <button type="submit" class="btn-primary" style="flex: 1;">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('dashboard', ['tab' => 'staf']) }}" class="btn-secondary" style="flex: 1;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
