<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Api extends Model
{
    use HasFactory;


    //Api Controller redirects here to query
    //the response goes back to Api Controller


    public function index(){

        $data = DB::table('comments')->join('sructures', 'comments.structureId', '=' ,'sructures.id')->get();
        return $data;

    }
}
