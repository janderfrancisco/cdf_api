<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EssayTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   
    public function testList()
    {
      
        
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('essay');
        
        dd($response->ge());
       
        $response->assertStatus(200);
  
 
    }
     
    /*
    public function testCreate()
    {
       

        $dados = [
            'student_id' => rand(1,9),
            'title' => 'teste',
            'content' => 'texto',
            'file' => 'file.jpg',
            'folder' => '04-2020'

        ];

        $this->post('api/v1/essay', $dados)
            ->assertStatus(200);
  
   
    }

    */

}
