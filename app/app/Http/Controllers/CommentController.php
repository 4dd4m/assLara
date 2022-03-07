<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Sidebar;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    //this is the main controller to display the site


    //rendering all the comments and
    //building the sidebar
    public function index() {
        //all comments
        $a = new Api();
        $data['comments'] = $a->index();

        //get sidebar elements
        $sidebar = new Sidebar();
        $data['sidebar'] = $sidebar->index();

        //get the structure counts
        $data['sidebarCount']  = $sidebar->getTopicCountArray();

        return view('home.index', $data);

    }
}
