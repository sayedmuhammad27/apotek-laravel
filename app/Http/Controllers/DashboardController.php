<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\StafApotek;
use App\Models\Obat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $activeTab = $request->get('tab', 'pelanggan');
        $viewMode = $request->get('mode', 'modern'); // 'modern' or 'lampiran' (PDF style)

        $pelanggans = Pelanggan::latest()->paginate(10, ['*'], 'pelanggan_page');
        $stafs = StafApotek::latest()->paginate(10, ['*'], 'staf_page');
        $obats = Obat::orderBy('nama_obat', 'asc')->paginate(10, ['*'], 'obat_page');

        // Stats
        $totalPelanggan = Pelanggan::count();
        $totalStaf = StafApotek::count();
        $totalObat = Obat::count();
        $totalStock = Obat::sum('stock_obat');
        $obatKadaluarsa = Obat::where('tanggal_kadaluarsa', '<=', now())->count();
        $obatHampirKadaluarsa = Obat::whereBetween('tanggal_kadaluarsa', [now(), now()->addMonths(3)])->count();

        return view('dashboard', compact(
            'pelanggans',
            'stafs',
            'obats',
            'totalPelanggan',
            'totalStaf',
            'totalObat',
            'totalStock',
            'obatKadaluarsa',
            'obatHampirKadaluarsa',
            'activeTab',
            'viewMode'
        ));
    }
}
