<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

echo "=== MEMULAI TEST INTERNAL LARAVEL APOTEK (MYSQL XAMPP) ===\n";

function makeRequest($kernel, $method, $uri, $data = []) {
    $request = Illuminate\Http\Request::create(
        $uri,
        $method,
        [],
        [],
        [],
        ['HTTP_ACCEPT' => 'application/json', 'CONTENT_TYPE' => 'application/json'],
        !empty($data) ? json_encode($data) : null
    );
    $response = $kernel->handle($request);
    $content = $response->getContent();
    $status = $response->getStatusCode();
    echo "[{$method} {$uri}] -> Status: {$status}\n";
    return ['status' => $status, 'json' => json_decode($content, true)];
}

$suffix = time();

// 1. Test Dashboard
$res = makeRequest($kernel, 'GET', '/');
assert($res['status'] === 200, "Dashboard harus 200");

// 2. Test API Pelanggan GET
$res = makeRequest($kernel, 'GET', '/api/pelanggan');
assert($res['status'] === 200, "API Pelanggan harus 200");
echo "Data Pelanggan Total: " . count($res['json']['data']) . "\n";

// 3. Test API Pelanggan POST
$testPlg = "PLG-T" . substr($suffix, -4);
$res = makeRequest($kernel, 'POST', '/api/pelanggan', [
    'id_pelanggan' => $testPlg,
    'nama' => 'Test Pasien Apotek',
    'alamat' => 'Jl. Pengujian No. 99',
    'no_hp' => '081234567890'
]);
assert($res['status'] === 201, "API POST Pelanggan harus 201");
echo "Berhasil tambah pelanggan: " . $res['json']['data']['nama'] . "\n";

// 4. Test API Staf GET
$res = makeRequest($kernel, 'GET', '/api/staff');
assert($res['status'] === 200, "API Staf harus 200");
echo "Data Staf Total: " . count($res['json']['data']) . "\n";

// 5. Test API Staf POST
$testStf = "STF-T" . substr($suffix, -4);
$res = makeRequest($kernel, 'POST', '/api/staff', [
    'id_staff' => $testStf,
    'nama' => 'Apt. Dokter Uji, S.Farm',
    'alamat' => 'Jl. Laboratorium Farmasi No. 1',
    'tanggal_lahir' => '1995-10-10',
    'tempat_lahir' => 'Banda Aceh',
    'no_hp' => '082155556666'
]);
assert($res['status'] === 201, "API POST Staf harus 201");
echo "Berhasil tambah staf: " . $res['json']['data']['nama'] . "\n";

// 6. Test API Obat GET
$res = makeRequest($kernel, 'GET', '/api/obat');
assert($res['status'] === 200, "API Obat harus 200");
echo "Data Obat Total: " . count($res['json']['data']) . "\n";

// 7. Test API Obat POST
$testObt = "OBT-T" . substr($suffix, -4);
$res = makeRequest($kernel, 'POST', '/api/obat', [
    'kode_obat' => $testObt,
    'nama_obat' => 'Amoxicillin Trihydrate 500mg',
    'stock_obat' => 75,
    'tanggal_kadaluarsa' => '2028-12-31'
]);
assert($res['status'] === 201, "API POST Obat harus 201");
echo "Berhasil tambah obat: " . $res['json']['data']['nama_obat'] . "\n";

echo "=== SEMUA PENGUJIAN API LARAVEL & MYSQL XAMPP BERHASIL 100% ===\n";
