<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['lastName','firstName',
        'comment','tone','email','structureId'];


    //Api Controller redirects here to query
    //the response goes back to Api Controller

    public function index($structureId=""){
        //get all comments or by strucutre ID
        //Logged in -> all Comments
        //Logged off -> just approved
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


    public function show($id){
        //returns one record based on id
        $data = DB::table('comments')
            ->join('sructures', 'comments.structureId', '=' ,'sructures.id')
            ->select('comments.*','sructures.code','sructures.name')
            ->where('comments.id','=',$id)
            ->get();
        return $data;
    }

    public static function last(){
        //get the last record 

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
