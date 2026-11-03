<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PostmanExportController extends Controller
{
    public function getCollectionData(): array
    {
        $baseUrl = '{{base_url}}';

        return [
            'info' => [
                '_postman_id' => 'apotek-laravel-api-collection',
                'name' => 'Apotek Laravel RESTful API Collection',
                'description' => 'Koleksi Postman untuk pengujian API Pelanggan, Staf Apotek, dan Daftar Obat (Projek Kelompok Apotek)',
                'schema' => 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json',
            ],
            'item' => [
                // Folder: Pelanggan
                [
                    'name' => '1. Pelanggan',
                    'item' => [
                        [
                            'name' => 'GET Semua Pelanggan',
                            'request' => [
                                'method' => 'GET',
                                'header' => [['key' => 'Accept', 'value' => 'application/json']],
                                'url' => ['raw' => "{$baseUrl}/api/pelanggan", 'host' => ['{{base_url}}'], 'path' => ['api', 'pelanggan']],
                            ],
                        ],
                        [
                            'name' => 'POST Tambah Pelanggan',
                            'request' => [
                                'method' => 'POST',
                                'header' => [
                                    ['key' => 'Accept', 'value' => 'application/json'],
                                    ['key' => 'Content-Type', 'value' => 'application/json'],
                                ],
                                'body' => [
                                    'mode' => 'raw',
                                    'raw' => json_encode([
                                        'id_pelanggan' => 'PLG-099',
                                        'nama' => 'Muhammad Syahrial',
                                        'alamat' => 'Jl. Syiah Kuala No. 100, Banda Aceh',
                                        'no_hp' => '081299887766',
                                    ], JSON_PRETTY_PRINT),
                                ],
                                'url' => ['raw' => "{$baseUrl}/api/pelanggan", 'host' => ['{{base_url}}'], 'path' => ['api', 'pelanggan']],
                            ],
                        ],
                        [
                            'name' => 'GET Detail Pelanggan',
                            'request' => [
                                'method' => 'GET',
                                'header' => [['key' => 'Accept', 'value' => 'application/json']],
                                'url' => ['raw' => "{$baseUrl}/api/pelanggan/PLG-001", 'host' => ['{{base_url}}'], 'path' => ['api', 'pelanggan', 'PLG-001']],
                            ],
                        ],
                        [
                            'name' => 'PUT Perbarui Pelanggan',
                            'request' => [
                                'method' => 'PUT',
                                'header' => [
                                    ['key' => 'Accept', 'value' => 'application/json'],
                                    ['key' => 'Content-Type', 'value' => 'application/json'],
                                ],
                                'body' => [
                                    'mode' => 'raw',
                                    'raw' => json_encode([
                                        'nama' => 'Ahmad Fauzi (Updated)',
                                        'alamat' => 'Jl. Merdeka No. 99, Banda Aceh',
                                        'no_hp' => '081234567899',
                                    ], JSON_PRETTY_PRINT),
                                ],
                                'url' => ['raw' => "{$baseUrl}/api/pelanggan/PLG-001", 'host' => ['{{base_url}}'], 'path' => ['api', 'pelanggan', 'PLG-001']],
                            ],
                        ],
                        [
                            'name' => 'DELETE Hapus Pelanggan',
                            'request' => [
                                'method' => 'DELETE',
                                'header' => [['key' => 'Accept', 'value' => 'application/json']],
                                'url' => ['raw' => "{$baseUrl}/api/pelanggan/PLG-099", 'host' => ['{{base_url}}'], 'path' => ['api', 'pelanggan', 'PLG-099']],
                            ],
                        ],
                    ],
                ],
                // Folder: Staf Apotek
                [
                    'name' => '2. Staf Apotek',
                    'item' => [
                        [
                            'name' => 'GET Semua Staf Apotek',
                            'request' => [
                                'method' => 'GET',
                                'header' => [['key' => 'Accept', 'value' => 'application/json']],
                                'url' => ['raw' => "{$baseUrl}/api/staff", 'host' => ['{{base_url}}'], 'path' => ['api', 'staff']],
                            ],
                        ],
                        [
                            'name' => 'POST Tambah Staf Apotek',
                            'request' => [
                                'method' => 'POST',
                                'header' => [
                                    ['key' => 'Accept', 'value' => 'application/json'],
                                    ['key' => 'Content-Type', 'value' => 'application/json'],
                                ],
                                'body' => [
                                    'mode' => 'raw',
                                    'raw' => json_encode([
                                        'id_staff' => 'STF-099',
                                        'nama' => 'Nadia Amanda, S.Farm',
                                        'alamat' => 'Jl. Pelajar No. 15, Banda Aceh',
                                        'tanggal_lahir' => '2001-05-20',
                                        'tempat_lahir' => 'Sigli',
                                        'no_hp' => '082366778899',
                                    ], JSON_PRETTY_PRINT),
                                ],
                                'url' => ['raw' => "{$baseUrl}/api/staff", 'host' => ['{{base_url}}'], 'path' => ['api', 'staff']],
                            ],
                        ],
                        [
                            'name' => 'GET Detail Staf Apotek',
                            'request' => [
                                'method' => 'GET',
                                'header' => [['key' => 'Accept', 'value' => 'application/json']],
                                'url' => ['raw' => "{$baseUrl}/api/staff/STF-001", 'host' => ['{{base_url}}'], 'path' => ['api', 'staff', 'STF-001']],
                            ],
                        ],
                        [
                            'name' => 'PUT Perbarui Staf Apotek',
                            'request' => [
                                'method' => 'PUT',
                                'header' => [
                                    ['key' => 'Accept', 'value' => 'application/json'],
                                    ['key' => 'Content-Type', 'value' => 'application/json'],
                                ],
                                'body' => [
                                    'mode' => 'raw',
                                    'raw' => json_encode([
                                        'nama' => 'Sayed Muhammad (Manager)',
                                        'alamat' => 'Jl. Kebon Jeruk No. 17, Banda Aceh',
                                        'tanggal_lahir' => '2001-08-15',
                                        'tempat_lahir' => 'Banda Aceh',
                                        'no_hp' => '081122334400',
                                    ], JSON_PRETTY_PRINT),
                                ],
                                'url' => ['raw' => "{$baseUrl}/api/staff/STF-001", 'host' => ['{{base_url}}'], 'path' => ['api', 'staff', 'STF-001']],
                            ],
                        ],
                        [
                            'name' => 'DELETE Hapus Staf Apotek',
                            'request' => [
                                'method' => 'DELETE',
                                'header' => [['key' => 'Accept', 'value' => 'application/json']],
                                'url' => ['raw' => "{$baseUrl}/api/staff/STF-099", 'host' => ['{{base_url}}'], 'path' => ['api', 'staff', 'STF-099']],
                            ],
                        ],
                    ],
                ],
                // Folder: Daftar Obat
                [
                    'name' => '3. Daftar Obat',
                    'item' => [
                        [
                            'name' => 'GET Semua Obat',
                            'request' => [
                                'method' => 'GET',
                                'header' => [['key' => 'Accept', 'value' => 'application/json']],
                                'url' => ['raw' => "{$baseUrl}/api/obat", 'host' => ['{{base_url}}'], 'path' => ['api', 'obat']],
                            ],
                        ],
                        [
                            'name' => 'POST Tambah Obat',
                            'request' => [
                                'method' => 'POST',
                                'header' => [
                                    ['key' => 'Accept', 'value' => 'application/json'],
                                    ['key' => 'Content-Type', 'value' => 'application/json'],
                                ],
                                'body' => [
                                    'mode' => 'raw',
                                    'raw' => json_encode([
                                        'kode_obat' => 'OBT-099',
                                        'nama_obat' => 'Dexamethasone 0.5mg',
                                        'stock_obat' => 50,
                                        'tanggal_kadaluarsa' => '2028-11-30',
                                    ], JSON_PRETTY_PRINT),
                                ],
                                'url' => ['raw' => "{$baseUrl}/api/obat", 'host' => ['{{base_url}}'], 'path' => ['api', 'obat']],
                            ],
                        ],
                        [
                            'name' => 'GET Detail Obat',
                            'request' => [
                                'method' => 'GET',
                                'header' => [['key' => 'Accept', 'value' => 'application/json']],
                                'url' => ['raw' => "{$baseUrl}/api/obat/OBT-001", 'host' => ['{{base_url}}'], 'path' => ['api', 'obat', 'OBT-001']],
                            ],
                        ],
                        [
                            'name' => 'PUT Perbarui Obat',
                            'request' => [
                                'method' => 'PUT',
                                'header' => [
                                    ['key' => 'Accept', 'value' => 'application/json'],
                                    ['key' => 'Content-Type', 'value' => 'application/json'],
                                ],
                                'body' => [
                                    'mode' => 'raw',
                                    'raw' => json_encode([
                                        'nama_obat' => 'Paracetamol Forte 650mg',
                                        'stock_obat' => 150,
                                        'tanggal_kadaluarsa' => '2028-12-31',
                                    ], JSON_PRETTY_PRINT),
                                ],
                                'url' => ['raw' => "{$baseUrl}/api/obat/OBT-001", 'host' => ['{{base_url}}'], 'path' => ['api', 'obat', 'OBT-001']],
                            ],
                        ],
                        [
                            'name' => 'DELETE Hapus Obat',
                            'request' => [
                                'method' => 'DELETE',
                                'header' => [['key' => 'Accept', 'value' => 'application/json']],
                                'url' => ['raw' => "{$baseUrl}/api/obat/OBT-099", 'host' => ['{{base_url}}'], 'path' => ['api', 'obat', 'OBT-099']],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    public function getEnvironmentData(): array
    {
        return [
            'id' => 'apotek-environment-local',
            'name' => 'Apotek Local Environment',
            'values' => [
                [
                    'key' => 'base_url',
                    'value' => url('/'),
                    'type' => 'default',
                    'enabled' => true,
                ],
            ],
            '_postman_variable_scope' => 'environment',
        ];
    }

    public function downloadCollection()
    {
        $data = $this->getCollectionData();
        return response()->json($data, 200, [
            'Content-Disposition' => 'attachment; filename="Apotek_API.postman_collection.json"',
        ]);
    }

    public function downloadEnvironment()
    {
        $data = $this->getEnvironmentData();
        return response()->json($data, 200, [
            'Content-Disposition' => 'attachment; filename="Apotek_Environment.postman_environment.json"',
        ]);
    }
}
