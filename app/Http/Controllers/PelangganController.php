<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $pelanggans = Pelanggan::when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('id_pelanggan', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('pelanggan.index', compact('pelanggans', 'search'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|string|max:50|unique:pelanggans,id_pelanggan',
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:25',
        ], [
            'id_pelanggan.required' => 'Id Pelanggan wajib diisi.',
            'id_pelanggan.unique' => 'Id Pelanggan sudah digunakan.',
            'nama.required' => 'Nama Pelanggan wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
        ]);

        Pelanggan::create($validated);

        return redirect()->route('dashboard', ['tab' => 'pelanggan'])
            ->with('success', 'Data Pelanggan berhasil disimpan!');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|string|max:50|unique:pelanggans,id_pelanggan,' . $pelanggan->id,
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:25',
        ]);

        $pelanggan->update($validated);

        return redirect()->route('dashboard', ['tab' => 'pelanggan'])
            ->with('success', 'Data Pelanggan berhasil diperbarui!');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('dashboard', ['tab' => 'pelanggan'])
            ->with('success', 'Data Pelanggan berhasil dihapus!');
    }
}
