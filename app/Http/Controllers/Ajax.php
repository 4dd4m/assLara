<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Ajax extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $c = new Comment();
        $data = ['isAuth' => Auth::check(), 'comments' => $c->index()];
        return response()->json($data,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r) {
        $c = new Comment();
        $r->validate([
            'lastName' => 'min:3|max:25|required',
            'firstName' => 'min:3|max:25|required',
            'comment' => 'min:3|required',
            'email' => 'min:3|max:25|required',
            'tone' => 'required',
            'structure_id' => 'required'
        ],
        ['structure_id' => 'Structure']
        );


        $c->lastName = $r->input('lastName');
        $c->comment = $r->input('comment');
        $c->structure_id = $r->input('structure_id');
        $c->tone = $r->input('tone');
        $c->email = $r->input('email');
        $c->firstName = $r->input('firstName');
        $c->created_at = now();
        $c->updated_at = now();
        $c->save();
        $data = $c->all();
        return response()->json($data);
    }
       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r, $id) {
        $c = new Comment();
        $result =  $c->show($id);
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
         $c = new Comment();

        $r->validate([
            'lastName' => 'min:3|max:25|required',
            'firstName' => 'min:3|max:25|required',
            'comment' => 'min:3|required',
            'email' => 'min:3|max:25|required',
            'tone' => 'required',
            'structure_id' => 'required'
        ],
        ['structure_id' => 'Structure']
        );

        $data = [

            "lastName" => $r->input('lastName'),
            "comment" => $r->input('comment'),
            "structure_id" => $r->input('structure_id'),
            "tone" => $r->input('tone'),
            "email" => $r->input('email'),
            "firstName" => $r->input('firstName'),
            "updated_at" => now()];

        $c->where('id',$r->input('commentId'))->update($data);
        $updatedPost = $c->where('id',$r->input('commentId'))->get();

        return response()->json($updatedPost,200);

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $r) {
        $c = new Comment();
        $result = $c->deleteComment($r->input('id'));
        $code = $result == true ? 200 : 400;
        $data['message'] = $code == 200 ? "success" : "error";
        $data = $c->index();
        return response()->json($data,$code);
    }

    function getCommentsByStructureId($id){
        //returns just the selected catgory of comments
        $c = new Comment();
        return response()->json(['isAuth' => Auth::check(), 'comments' =>$c->index($id)],200); 
    }
}
