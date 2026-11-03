<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pelanggan;
use App\Models\StafApotek;
use App\Models\Obat;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApotekApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Dashboard page renders successfully.
     */
    public function test_dashboard_renders(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('PROJEK KELOMPOK');
    }

    /**
     * Test API Pelanggan (CRUD).
     */
    public function test_api_pelanggan_crud(): void
    {
        // 1. POST
        $createRes = $this->postJson('/api/pelanggan', [
            'id_pelanggan' => 'PLG-TEST-1',
            'nama' => 'Test Pelanggan',
            'alamat' => 'Jl. Uji Coba No. 1',
            'no_hp' => '08123456789',
        ]);
        $createRes->assertStatus(201)
                  ->assertJsonPath('success', true)
                  ->assertJsonPath('data.nama', 'Test Pelanggan');

        // 2. GET index
        $getRes = $this->getJson('/api/pelanggan');
        $getRes->assertStatus(200)
               ->assertJsonPath('success', true);

        // 3. GET show
        $showRes = $this->getJson('/api/pelanggan/PLG-TEST-1');
        $showRes->assertStatus(200)
                ->assertJsonPath('data.id_pelanggan', 'PLG-TEST-1');

        // 4. PUT update
        $updateRes = $this->putJson('/api/pelanggan/PLG-TEST-1', [
            'nama' => 'Pelanggan Updated',
            'alamat' => 'Jl. Baru No. 2',
            'no_hp' => '08999999999',
        ]);
        $updateRes->assertStatus(200)
                  ->assertJsonPath('data.nama', 'Pelanggan Updated');

        // 5. DELETE
        $delRes = $this->deleteJson('/api/pelanggan/PLG-TEST-1');
        $delRes->assertStatus(200)
               ->assertJsonPath('success', true);
    }

    /**
     * Test API Staf Apotek (CRUD).
     */
    public function test_api_staf_crud(): void
    {
        // 1. POST
        $createRes = $this->postJson('/api/staff', [
            'id_staff' => 'STF-TEST-1',
            'nama' => 'Staf Farmasi Uji',
            'alamat' => 'Jl. Apoteker No. 5',
            'tanggal_lahir' => '1999-05-15',
            'tempat_lahir' => 'Banda Aceh',
            'no_hp' => '0811223344',
        ]);
        $createRes->assertStatus(201)
                  ->assertJsonPath('success', true);

        // 2. GET index
        $getRes = $this->getJson('/api/staff');
        $getRes->assertStatus(200);

        // 3. GET show
        $showRes = $this->getJson('/api/staff/STF-TEST-1');
        $showRes->assertStatus(200);

        // 4. PUT update
        $updateRes = $this->putJson('/api/staff/STF-TEST-1', [
            'nama' => 'Staf Farmasi Updated',
            'alamat' => 'Jl. Apoteker Baru No. 10',
            'tanggal_lahir' => '1999-05-15',
            'tempat_lahir' => 'Banda Aceh',
            'no_hp' => '0811223344',
        ]);
        $updateRes->assertStatus(200)
                  ->assertJsonPath('data.nama', 'Staf Farmasi Updated');

        // 5. DELETE
        $delRes = $this->deleteJson('/api/staff/STF-TEST-1');
        $delRes->assertStatus(200);
    }

    /**
     * Test API Obat (CRUD).
     */
    public function test_api_obat_crud(): void
    {
        // 1. POST
        $createRes = $this->postJson('/api/obat', [
            'kode_obat' => 'OBT-TEST-1',
            'nama_obat' => 'Amoxicillin Test 500mg',
            'stock_obat' => 50,
            'tanggal_kadaluarsa' => '2028-10-10',
        ]);
        $createRes->assertStatus(201)
                  ->assertJsonPath('success', true);

        // 2. GET index
        $getRes = $this->getJson('/api/obat');
        $getRes->assertStatus(200);

        // 3. GET show
        $showRes = $this->getJson('/api/obat/OBT-TEST-1');
        $showRes->assertStatus(200)
                ->assertJsonPath('data.kode_obat', 'OBT-TEST-1');

        // 4. PUT update
        $updateRes = $this->putJson('/api/obat/OBT-TEST-1', [
            'nama_obat' => 'Amoxicillin Forte Test',
            'stock_obat' => 100,
            'tanggal_kadaluarsa' => '2028-10-10',
        ]);
        $updateRes->assertStatus(200)
                  ->assertJsonPath('data.stock_obat', 100);

        // 5. DELETE
        $delRes = $this->deleteJson('/api/obat/OBT-TEST-1');
        $delRes->assertStatus(200);
    }

    /**
     * Test Validation Failure (HTTP 422).
     */
    public function test_api_validation_error(): void
    {
        $response = $this->postJson('/api/pelanggan', []);
        $response->assertStatus(422)
                 ->assertJsonPath('success', false);
    }

    /**
     * Test Postman Collection Download.
     */
    public function test_postman_collection_download(): void
    {
        $response = $this->get('/postman/collection.json');
        $response->assertStatus(200)
                 ->assertHeader('Content-Disposition', 'attachment; filename="Apotek_API.postman_collection.json"');
    }
}
