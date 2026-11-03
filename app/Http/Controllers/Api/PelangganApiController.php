<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelangganApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Pelanggan::query();

        if ($search = $request->get('search')) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('id_pelanggan', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%");
        }

        $pelanggan = $query->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data pelanggan berhasil diambil.',
            'total' => $pelanggan->count(),
            'data' => $pelanggan,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required|string|max:50|unique:pelanggans,id_pelanggan',
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:25',
        ], [
            'id_pelanggan.required' => 'Id Pelanggan wajib diisi.',
            'id_pelanggan.unique' => 'Id Pelanggan sudah terdaftar.',
            'nama.required' => 'Nama pelanggan wajib diisi.',
            'alamat.required' => 'Alamat pelanggan wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $pelanggan = Pelanggan::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil disimpan.',
            'data' => $pelanggan,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $pelanggan = is_numeric($id) 
            ? Pelanggan::find($id) 
            : Pelanggan::where('id_pelanggan', $id)->first();

        if (!$pelanggan) {
            return response()->json([
                'success' => false,
                'message' => 'Data pelanggan tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data pelanggan ditemukan.',
            'data' => $pelanggan,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $pelanggan = is_numeric($id) 
            ? Pelanggan::find($id) 
            : Pelanggan::where('id_pelanggan', $id)->first();

        if (!$pelanggan) {
            return response()->json([
                'success' => false,
                'message' => 'Data pelanggan tidak ditemukan.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'sometimes|required|string|max:50|unique:pelanggans,id_pelanggan,' . $pelanggan->id,
            'nama' => 'sometimes|required|string|max:150',
            'alamat' => 'sometimes|required|string',
            'no_hp' => 'sometimes|required|string|max:25',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $pelanggan->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil diperbarui.',
            'data' => $pelanggan,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $pelanggan = is_numeric($id) 
            ? Pelanggan::find($id) 
            : Pelanggan::where('id_pelanggan', $id)->first();

        if (!$pelanggan) {
            return response()->json([
                'success' => false,
                'message' => 'Data pelanggan tidak ditemukan.',
            ], 404);
        }

        $pelanggan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil dihapus.',
        ], 200);
    }
}
