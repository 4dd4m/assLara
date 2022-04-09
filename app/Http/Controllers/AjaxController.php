<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
Use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller {
    //ajax controller always returns json datatype
    //show returns all records
    public function all(){
        $c = new Comment();
        $data = ['isAuth' => Auth::check(), 'comments' => $c->index()];
        return response()->json($data,200);
    }

    //show one record
    public function show($commentId){

        $c = new Comment();
        $result =  $c->show($commentId);
        return response()->json($result);
    }

    //create a record
    public function create(Request $request){
        $c = new Comment();
        $request->validate([
            'lastName' => 'min:3|max:25|required',
            'firstName' => 'min:3|max:25|required',
            'comment' => 'min:3|required',
            'email' => 'min:3|max:25|required',
            'tone' => 'required',
            'structureId' => 'required'
        ],
        ['structureId' => 'Structure']
        );


        $c->lastName = $request->input('lastName');
        $c->comment = $request->input('comment');
        $c->structureId = $request->input('structureId');
        $c->tone = $request->input('tone');
        $c->email = $request->input('email');
        $c->firstName = $request->input('firstName');
        $c->created_at = now();
        $c->updated_at = now();
        $c->save();
        $data = $c->all();
        return response()->json($data);
    }

    //edit a post
    public function update(Request $request){
        $c = new Comment();

        $request->validate([
            'lastName' => 'min:3|max:25|required',
            'firstName' => 'min:3|max:25|required',
            'comment' => 'min:3|required',
            'email' => 'min:3|max:25|required',
            'tone' => 'required',
            'structureId' => 'required'
        ],
        ['structureId' => 'Structure']
        );

        $data = [

            "lastName" => $request->input('lastName'),
            "comment" => $request->input('comment'),
            "structureId" => $request->input('structureId'),
            "tone" => $request->input('tone'),
            "email" => $request->input('email'),
            "firstName" => $request->input('firstName'),
            "updated_at" => now()];

        $c->where('id',$request->input('commentId'))->update($data);
        $updatedPost = $c->where('id',$request->input('commentId'))->get();

        return response()->json($updatedPost,200);

    }



    //delete a record
    public function delete($id){
        $c = new Comment();
        $result = $c->deleteComment($id);
        $code = $result == true ? 200 : 400;
        $data['message'] = $code == 200 ? "success" : "error";
        $data = $c->index();
        return response()->json($data,$code);
    }

    function lastComment(){
        return response()->json(Comment::lastComment(),200);
    }

    function getCommentsByStructureId($id){
        //returns just the selected catgory of comments
        $c = new Comment();
        return response()->json(['isAuth' => Auth::check(), 'comments' =>$c->index($id)],200); 
    }

    function toggleApprove(Request $request){
        //approve a comment in the database
        if(Auth::check() == 0){
            return response()->json(['error','Not Authorized'],500);
        }
        $id = $request->input('id');
        if($id){
            $c = new Comment();
            $c->toggleApprove($id);
        }      
    }

    function isAuth(){
        //check whether the user is logged in
        if(Auth::check()  == 1){
            return 1;
        }
        else{
            return 0;
        }
    }

}
