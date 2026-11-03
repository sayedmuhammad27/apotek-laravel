<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObatApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Obat::query();

        if ($search = $request->get('search')) {
            $query->where('nama_obat', 'like', "%{$search}%")
                  ->orWhere('kode_obat', 'like', "%{$search}%");
        }

        if ($request->get('expired') === 'soon') {
            $query->where('tanggal_kadaluarsa', '<=', now()->addDays(90));
        }

        $obat = $query->orderBy('nama_obat', 'asc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data obat berhasil diambil.',
            'total' => $obat->count(),
            'data' => $obat,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $obat = Obat::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil disimpan.',
            'data' => $obat,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $obat = is_numeric($id) 
            ? Obat::find($id) 
            : Obat::where('kode_obat', $id)->first();

        if (!$obat) {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data obat ditemukan.',
            'data' => $obat,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $obat = is_numeric($id) 
            ? Obat::find($id) 
            : Obat::where('kode_obat', $id)->first();

        if (!$obat) {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak ditemukan.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'kode_obat' => 'sometimes|required|string|max:50|unique:obats,kode_obat,' . $obat->id,
            'nama_obat' => 'sometimes|required|string|max:150',
            'stock_obat' => 'sometimes|required|integer|min:0',
            'tanggal_kadaluarsa' => 'sometimes|required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $obat->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil diperbarui.',
            'data' => $obat,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $obat = is_numeric($id) 
            ? Obat::find($id) 
            : Obat::where('kode_obat', $id)->first();

        if (!$obat) {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak ditemukan.',
            ], 404);
        }

        $obat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil dihapus.',
        ], 200);
    }
}
