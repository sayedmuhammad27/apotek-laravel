<?php

namespace App\Http\Controllers;

use App\Models\StafApotek;
use Illuminate\Http\Request;

class StafApotekController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $stafs = StafApotek::when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('id_staff', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%")
                  ->orWhere('tempat_lahir', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('staf.index', compact('stafs', 'search'));
    }

    public function create()
    {
        return view('staf.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_staff' => 'required|string|max:50|unique:staf_apoteks,id_staff',
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'no_hp' => 'required|string|max:25',
        ], [
            'id_staff.required' => 'Id Staff wajib diisi.',
            'id_staff.unique' => 'Id Staff sudah terdaftar.',
            'nama.required' => 'Nama staf wajib diisi.',
            'alamat.required' => 'Alamat staf wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib dipilih.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
        ]);

        StafApotek::create($validated);

        return redirect()->route('dashboard', ['tab' => 'staf'])
            ->with('success', 'Data Staf Apotek berhasil disimpan!');
    }

    public function edit(StafApotek $staf)
    {
        return view('staf.edit', compact('staf'));
    }

    public function update(Request $request, StafApotek $staf)
    {
        $validated = $request->validate([
            'id_staff' => 'required|string|max:50|unique:staf_apoteks,id_staff,' . $staf->id,
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'no_hp' => 'required|string|max:25',
        ]);

        $staf->update($validated);

        return redirect()->route('dashboard', ['tab' => 'staf'])
            ->with('success', 'Data Staf Apotek berhasil diperbarui!');
    }

    public function destroy(StafApotek $staf)
    {
        $staf->delete();

        return redirect()->route('dashboard', ['tab' => 'staf'])
            ->with('success', 'Data Staf Apotek berhasil dihapus!');
    }
}
