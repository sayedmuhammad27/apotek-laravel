<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $obats = Obat::when($search, function ($query, $search) {
            $query->where('nama_obat', 'like', "%{$search}%")
                  ->orWhere('kode_obat', 'like', "%{$search}%");
        })->orderBy('nama_obat', 'asc')->paginate(10);

        return view('obat.index', compact('obats', 'search'));
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_obat' => 'required|string|max:50|unique:obats,kode_obat',
            'nama_obat' => 'required|string|max:150',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ], [
            'kode_obat.required' => 'Kode obat wajib diisi.',
            'kode_obat.unique' => 'Kode obat sudah digunakan.',
            'nama_obat.required' => 'Nama obat wajib diisi.',
            'stock_obat.required' => 'Stock obat wajib diisi.',
            'stock_obat.integer' => 'Stock obat harus berupa angka.',
            'stock_obat.min' => 'Stock obat minimal 0.',
            'tanggal_kadaluarsa.required' => 'Tanggal kadaluarsa wajib dipilih.',
        ]);

        Obat::create($validated);

        return redirect()->route('dashboard', ['tab' => 'obat'])
            ->with('success', 'Data Obat berhasil disimpan!');
    }

    public function edit(Obat $obat)
    {
        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $validated = $request->validate([
            'kode_obat' => 'required|string|max:50|unique:obats,kode_obat,' . $obat->id,
            'nama_obat' => 'required|string|max:150',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $obat->update($validated);

        return redirect()->route('dashboard', ['tab' => 'obat'])
            ->with('success', 'Data Obat berhasil diperbarui!');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('dashboard', ['tab' => 'obat'])
            ->with('success', 'Data Obat berhasil dihapus!');
    }
}
