<?php
namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['lastName','firstName','comment','tone','email','structure_id'];

    public function index($strId=""){
        //get all comments
        $data = Comment::WithCategory()
            ->orderBy('structures.id','asc')
            ->orderBy('comments.id','desc');

        //if not logged in render only approved comment
        Auth::check() == 0 ? $data->where('isApproved',1) : "";

        //if category id supplied, only include that cat
        $strId != "" ? $data->where('structure_id',$strId) : "";

        return $data->get();
    }

    public function show($id){
        //show one record
        return Comment::WithCategory()
            ->where('comments.id','=',$id)->get();
    }

    public static function last(){
        //get the last record (after new post is created)
        return Comment::WithCategory()
                ->orderBy('comments.created_at','desc')
                ->first()
                ->get();
    }

    public function deleteComment($id){
        //delete a single comment
        return Comment::find($id)->delete();
    }

    public static function toggleApprove($id){
        //approves a comment Auth check in ajax
        $oldState = Comment::where('id',$id)->get(['isApproved']); 
        $newState = $oldState[0]->isApproved == 1 ? 0 : 1;
        Comment::where('id',$id)->update(['isApproved' => $newState]);
    }

    public static function lastComment(){
        //return the last updated comment
        return Comment::latest('updated_at','desc')->first();
    }

    public function structure(){
        return $this->belongsTo(Structure::class);
    }

    public function scopeWithCategory($query){
        return $query->join('structures', 'comments.structure_id','=','structures.id')
                     ->select('comments.*','structures.code','structures.name');
    }
}
