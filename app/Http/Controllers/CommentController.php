<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Sidebar;
use App\Http\Controllers\AjaxController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller{

    //this is the main controller to display the site


    //rendering all the comments and
    //building the sidebar
    public function index(){
        //all comments
        //$a = new AjaxController();
        //$data['comments'] = $a->all();

        //get sidebar elements
        $sidebar = new Sidebar();
        $data['sidebar'] = $sidebar->index();

        //get the structure counts
        $data['sidebarCount']  = $sidebar->getTopicCountArray();

        return view('home.index', $data);
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
