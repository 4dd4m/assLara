<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Api;

class CommentTest extends TestCase {

    use RefreshDatabase;

    public function newSuccessfulRecord(){

        $a = new Api();

        $data = [
            
            'comment' => 'One or more references have been ‘over-played’ in citation.',
            'firstName' => 'Alaln',
            'lastName' => 'Webb',
            'email' => 'jac.webb@ulster.ac.uk',
            'tone' => 1,
            'structureId' => 8
        ];
        
        $a->save($data);

        $this->post('/', $data);

        $this->assertDatabaseHas('sructures',['isApproved' => 1]);

    }

}
