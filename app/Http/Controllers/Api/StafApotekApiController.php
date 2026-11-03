<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StafApotek;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StafApotekApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = StafApotek::query();

        if ($search = $request->get('search')) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('id_staff', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%")
                  ->orWhere('tempat_lahir', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%");
        }

        $staf = $query->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data staf apotek berhasil diambil.',
            'total' => $staf->count(),
            'data' => $staf,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
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
            'no_hp.required' => 'Nomor HP staf wajib diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $staf = StafApotek::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil disimpan.',
            'data' => $staf,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $staf = is_numeric($id) 
            ? StafApotek::find($id) 
            : StafApotek::where('id_staff', $id)->first();

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf apotek tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data staf apotek ditemukan.',
            'data' => $staf,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $staf = is_numeric($id) 
            ? StafApotek::find($id) 
            : StafApotek::where('id_staff', $id)->first();

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf apotek tidak ditemukan.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_staff' => 'sometimes|required|string|max:50|unique:staf_apoteks,id_staff,' . $staf->id,
            'nama' => 'sometimes|required|string|max:150',
            'alamat' => 'sometimes|required|string',
            'tanggal_lahir' => 'sometimes|required|date',
            'tempat_lahir' => 'sometimes|required|string|max:100',
            'no_hp' => 'sometimes|required|string|max:25',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $staf->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil diperbarui.',
            'data' => $staf,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $staf = is_numeric($id) 
            ? StafApotek::find($id) 
            : StafApotek::where('id_staff', $id)->first();

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf apotek tidak ditemukan.',
            ], 404);
        }

        $staf->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil dihapus.',
        ], 200);
    }
}
