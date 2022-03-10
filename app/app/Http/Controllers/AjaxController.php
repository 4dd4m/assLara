<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class AjaxController extends Controller {

    //ajax controller always returns json datatype

    //show returns all records
    public function all(){
        $c = new Comment();
        $data = $c->index();
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
        $data = Comment::last();
        return response()->json($data);
    }


    //delete a record
    public function delete($id){

        $c = new Comment();
        $data = $c->deleteComment($id);
        $code = $data == true ? 200 : 400;

        if($data == true){
            $data = $c->all();
        }
        
        return response()->json($data,$code);
    }
}
