<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['lastName','firstName','comment','tone','email','structureId'];


    //Api Controller redirects here to query
    //the response goes back to Api Controller

    //get all comments
    public function index(){
        $data = DB::table('comments')
            ->join('sructures', 'comments.structureId', '=' ,'sructures.id')
            ->select('comments.*','sructures.code','sructures.name')
            ->orderBy('comments.structureId','asc')
            ->orderBy('comments.id','desc')
            ->where('isApproved',1)
            ->get();
        return $data;
    }


    //show one record
    public function show($id){
        $data = DB::table('comments')
            ->join('sructures', 'comments.structureId', '=' ,'sructures.id')
            ->select('comments.*','sructures.code','sructures.name')
            ->where('comments.id','=',$id)
            ->get();
        return $data;
    }

    //get the last record (after new post is created)
    public static function last(){

        $data = DB::table('comments')
            ->join('sructures', 'comments.structureId', '=' ,'sructures.id')
            ->select('comments.*','sructures.code','sructures.name')
            ->orderBy('comments.created_at','desc')
            ->first();
        return $data;
    }

    //delete a single comment
    public function deleteComment($id){
        $deleted = Comment::find($id);
        $deleted->delete();
        return $deleted ? true : false;
    }






}
