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

    //get all comments
    public function index(){
        $data = DB::table('comments')->join('sructures', 'comments.structureId', '=' ,'sructures.id')->orderBy('updated_at','desc')->get();
        return $data;
    }

    //building an array based on categories
    //so we can still render and add comment button even if the 
    //category is empty (which will never happen if we work with plain
    //select * from...
    public function getCommentsGroupedByTitle(){
        $data = [];
        $query = DB::table('comments')->join('sructures', 'comments.structureId', '=' ,'sructures.id')->get();
        $categoryNames = $this->getCategoryNames();
        if(count($query) == 0){
            return "Empty Category"; 
        }

        //initialize the array keys
        foreach($categoryNames as $name){
                $data[$name] = [];
        }

        //iterate and fill categories
        foreach($query as $item){
            $replacedCategory = str_replace(" ","_",$item->name);
            array_push($data[$replacedCategory],$item);
        }
        return $data;
    }

    //get all category names and retruns an array
    //[cat1,cat2,cat3]
    //all " " (space) characters will replaced with "_"
    public function getCategoryNames(){
        $data = [];
        $query = DB::table('sructures')->select('name')->get();
        foreach($query as $category){
            $replacedCategory = str_replace(" ","_",$category->name);
            array_push($data, $replacedCategory);
        }
        return $data;
    }
}
