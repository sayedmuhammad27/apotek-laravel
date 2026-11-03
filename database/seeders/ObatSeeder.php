<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    public function run(): void
    {
        $obats = [
            [
                'kode_obat' => 'OBT-001',
                'nama_obat' => 'Paracetamol 500mg (Strip)',
                'stock_obat' => 120,
                'tanggal_kadaluarsa' => '2028-12-31',
            ],
            [
                'kode_obat' => 'OBT-002',
                'nama_obat' => 'Amoxicillin 500mg (Kapsul)',
                'stock_obat' => 85,
                'tanggal_kadaluarsa' => '2027-10-15',
            ],
            [
                'kode_obat' => 'OBT-003',
                'nama_obat' => 'Antasida Doen (Tablet Kunyah)',
                'stock_obat' => 95,
                'tanggal_kadaluarsa' => '2028-06-20',
            ],
            [
                'kode_obat' => 'OBT-004',
                'nama_obat' => 'Cetirizine HCl 10mg',
                'stock_obat' => 60,
                'tanggal_kadaluarsa' => '2027-08-30',
            ],
            [
                'kode_obat' => 'OBT-005',
                'nama_obat' => 'OBH Sirup Batuk & Flu 100ml',
                'stock_obat' => 45,
                'tanggal_kadaluarsa' => '2026-11-25',
            ],
            [
                'kode_obat' => 'OBT-006',
                'nama_obat' => 'Vitamin C 500mg IPI',
                'stock_obat' => 150,
                'tanggal_kadaluarsa' => '2029-01-01',
            ],
            [
                'kode_obat' => 'OBT-007',
                'nama_obat' => 'Ibuprofen 400mg',
                'stock_obat' => 70,
                'tanggal_kadaluarsa' => '2027-05-18',
            ],
            [
                'kode_obat' => 'OBT-008',
                'nama_obat' => 'Betadine Antiseptic Solution 60ml',
                'stock_obat' => 30,
                'tanggal_kadaluarsa' => '2028-03-10',
            ],
        ];

        foreach ($obats as $data) {
            Obat::updateOrCreate(
                ['kode_obat' => $data['kode_obat']],
                $data
            );
        }
    }
}
