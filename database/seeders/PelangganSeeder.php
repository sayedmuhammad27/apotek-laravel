<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        $pelanggans = [
            [
                'id_pelanggan' => 'PLG-001',
                'nama' => 'Ahmad Fauzi',
                'alamat' => 'Jl. Merdeka No. 12, Banda Aceh',
                'no_hp' => '081234567890',
            ],
            [
                'id_pelanggan' => 'PLG-002',
                'nama' => 'Siti Nurhaliza',
                'alamat' => 'Jl. Diponegoro No. 45, Lhokseumawe',
                'no_hp' => '082198765432',
            ],
            [
                'id_pelanggan' => 'PLG-003',
                'nama' => 'Rizky Pratama',
                'alamat' => 'Jl. Teuku Umar No. 88, Meulaboh',
                'no_hp' => '085277889900',
            ],
            [
                'id_pelanggan' => 'PLG-004',
                'nama' => 'Cut Putri Rahma',
                'alamat' => 'Jl. Syiah Kuala No. 23, Banda Aceh',
                'no_hp' => '081344556677',
            ],
            [
                'id_pelanggan' => 'PLG-005',
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. T. Iskandar No. 10, Sigli',
                'no_hp' => '087811223344',
            ],
        ];

        foreach ($pelanggans as $data) {
            Pelanggan::updateOrCreate(
                ['id_pelanggan' => $data['id_pelanggan']],
                $data
            );
        }
    }
}
