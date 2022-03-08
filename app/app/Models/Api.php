<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Nette\Schema\Elements\Structure;

class Api extends Model
{
    use HasFactory;

    protected $fillable = ['lastName','firstName','comment','tone','email','structureId'];


    //Api Controller redirects here to query
    //the response goes back to Api Controller

    //get all comments
    public function index(){
        $data = DB::table('comments')->join('sructures', 'comments.structureId', '=' ,'sructures.id')->orderBy('comments.structureId','asc')->get();
        return $data;
    }

}
