<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageElements extends TestCase {

    public function renderMainPage(){

        $response = $this->get('/');

        //navbar
        $response->assertSeeText('All');
        //Add new buttons
        $response->assertSeeText('Add a new');
        //Add form rendered
        $response->assertSeeText('Contributor\'s First Name');
    }
}
