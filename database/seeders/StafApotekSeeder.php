<?php

namespace Database\Seeders;

use App\Models\StafApotek;
use Illuminate\Database\Seeder;

class StafApotekSeeder extends Seeder
{
    public function run(): void
    {
        $stafs = [
            [
                'id_staff' => 'STF-001',
                'nama' => 'Sayed Muhammad',
                'alamat' => 'Jl. Kebon Jeruk No. 17, Banda Aceh',
                'tanggal_lahir' => '2001-08-15',
                'tempat_lahir' => 'Banda Aceh',
                'no_hp' => '081122334455',
            ],
            [
                'id_staff' => 'STF-002',
                'nama' => 'Apt. Sarah Maulida, S.Farm',
                'alamat' => 'Komplek Keude Cunda, Lhokseumawe',
                'tanggal_lahir' => '1998-04-12',
                'tempat_lahir' => 'Lhokseumawe',
                'no_hp' => '081233445566',
            ],
            [
                'id_staff' => 'STF-003',
                'nama' => 'Dedi Kurniawan, A.Md.Farm',
                'alamat' => 'Jl. Sudirman Blok B No. 9, Langsa',
                'tanggal_lahir' => '2000-11-20',
                'tempat_lahir' => 'Langsa',
                'no_hp' => '085344556677',
            ],
            [
                'id_staff' => 'STF-004',
                'nama' => 'Rina Andriani',
                'alamat' => 'Jl. Hasanuddin No. 34, Banda Aceh',
                'tanggal_lahir' => '2002-02-28',
                'tempat_lahir' => 'Sabang',
                'no_hp' => '082255667788',
            ],
        ];

        foreach ($stafs as $data) {
            StafApotek::updateOrCreate(
                ['id_staff' => $data['id_staff']],
                $data
            );
        }
    }
}
