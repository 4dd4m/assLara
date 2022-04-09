<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class TestController extends Controller
{
    
    public function test(){
        $c = new Comment();
        return $c->index2(); 
    }
}
