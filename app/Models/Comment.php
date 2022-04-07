<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['lastName','firstName','comment','tone','email','structureId'];


    //Api Controller redirects here to query
    //the response goes back to Api Controller

    //get all comments
    public function index($structureId=""){
        $data = DB::table('comments')
            ->join('sructures', 'comments.structureId', '=' ,'sructures.id')
            ->select('comments.*','sructures.code','sructures.name')
            ->orderBy('comments.structureId','asc')
            ->orderBy('comments.id','desc');

        if(Auth::check() == 0){
            $data->where('isApproved',1);
        }

        if($structureId != ""){
            $data->where('structureId',$structureId);
        }
        $data = $data->get();
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

    public function deleteComment($id){
        //delete a single comment
        $deleted = Comment::find($id);
        $deleted->delete();
        return $deleted ? true : false;
    }

    function toggleApprove($id){
        //approves a comment Auth check in ajax
        $oldState = DB::table('comments')->where('id',$id)->get(['isApproved']); 
        $newState = $oldState[0]->isApproved == 1 ? 0 : 1;
        DB::table('comments')->where('id',$id) 
                             ->update(['isApproved' => $newState]);

    }
}