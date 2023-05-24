<?php

namespace Tests\Unit;

use App\Models\Kendaraan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     use RefreshDatabase;

    //  public function testGetStokKendaraan()
    //  {
    //      // Simulate data kendaraan
    //     //  Kendaraan::factory()->count(3)->create();
     
    //      // Make an HTTP GET request to the getStokKendaraan() endpoint
    //      $response = $this->get('/api/kendaraan/stok');
     
    //      // Ensure a 200 OK response
    //      $response->assertStatus(200);
     
    //      // Ensure the JSON response contains the kendaraan stock data
    //     //  $response->assertJsonCount(3, 'data');
    //  }

    public function test_example()
    {
        $response = $this->get('api/kendaraan/stok');

        $response->assertStatus(200);
    }
}
