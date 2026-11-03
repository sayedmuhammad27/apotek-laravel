<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\StafApotek;
use App\Models\Obat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function landing()
    {
        try {
            $totalPelanggan = Pelanggan::count();
            $totalStaf = StafApotek::count();
            $totalObat = Obat::count();
            $totalStok = (int) Obat::sum('stok');
        } catch (\Throwable $e) {
            $totalPelanggan = 0;
            $totalStaf = 0;
            $totalObat = 0;
            $totalStok = 0;
        }

        return view('landing', compact(
            'totalPelanggan',
            'totalStaf',
            'totalObat',
            'totalStok'
        ));
    }

    public function index(Request $request)
    {
        $activeTab = $request->get('tab', 'pelanggan');

        $pelanggans = Pelanggan::latest()->paginate(10, ['*'], 'pelanggan_page');
        $stafs = StafApotek::latest()->paginate(10, ['*'], 'staf_page');
        $obats = Obat::orderBy('nama_obat', 'asc')->paginate(10, ['*'], 'obat_page');

        $totalPelanggan = Pelanggan::count();
        $totalStaf = StafApotek::count();
        $totalObat = Obat::count();

        return view('dashboard', compact(
            'pelanggans',
            'stafs',
            'obats',
            'totalPelanggan',
            'totalStaf',
            'totalObat',
            'activeTab'
        ));
    }
}
