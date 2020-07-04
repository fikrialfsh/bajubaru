<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Barang;


class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_store(){
        $barang = Barang::create([
            'name' => 'Tshirt one',
            'description' => 1,
            'price' => 2000,
            'weight' => 1000,
            'stok' => 21,
            'categories_id' => 'test test'
        ]);

        $this->assertDatabaseHas('barangs', [
            'name' => 'Tshirt one',
            'description' => 1,
            'price' => 2000,
            'weight' => 1000,
            'stok' => 21,
            'categories_id' => 'test test'
        ]);
    }	
        public function test_destroy(){
            $barang = Barang::destroy(4);
            $this->assertDatabaseMissing('barangs',[
                'id' => 4
            ]);
        }
    
        public function test_update(){
            $barang = Barang::create([
                'name' => 'Tshirt one',
                'description' => 1,
                'price' => 2000,
                'weight' => 1000,
                'stok' => 21,
                'categories_id' => 'test test'
            ]);
    
            $barang = Barang::find(1);
            $barang->name = 'Tshirt x';
            $barang->description = 1;
            $barang->price = 2000;
            $barang->weight = 1000;
            $barang->stok = 21;
            $barang->categories_id = 'test test';
            $barang->save();
    
            $this->assertDatabaseHas('barangs', [
                'name' => 'Tshirt x',
                'description' => 1,
                'price' => 2000,
                'weight' => 1000,
                'stok' => 21,
                'categories_id' => 'test test'
            ]);	
        }
        
}
