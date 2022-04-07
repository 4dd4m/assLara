<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Model
{
    use HasFactory;


    //this model returns the structure items for dynamic rendering
    //also, returns with a count of each structure items in the database


    public function index(){
        //return all sidebar items
        $data = DB::table('sructures')->get();
        return $data;
    }

    public function getTopicCountArray(){
        //return as counting all topics we have in the database
        //[2,3,4,5,6,2,0,0,4,5]

        $topicCount = [];

        $approved = Auth::check() == 0 ? "where isApproved=1" : ""; 
        $count = DB::select("SELECT structureId as id, COUNT(*) as count FROM laravel.comments $approved group by structureId;");
        


        return $count;

    }
}
