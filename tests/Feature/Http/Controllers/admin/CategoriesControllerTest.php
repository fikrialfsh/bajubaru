<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Categories;


class CategoriesControllerTest extends TestCase
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
        $categories = Categories::create([
            'name' => 'Tshirt'
            
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'Tshirt'
            
        ]);
    }	
    public function test_destroy(){
        $categories = Categories::destroy(4);
        $this->assertDatabaseMissing('categories',[
            'id' => 4
        ]);
    }

    public function test_update(){
        $categories = Categories::create([
            'name' => 'Tshirt'
           
        ]);

        $categories = Categories::find(1);
        $categories->name = 'Tshirt';
        
        
        $categories->save();

        $this->assertDatabaseHas('categories', [
            'name' => 'Tshirt',
            
        ]);	
    }
        
}
