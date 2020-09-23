<?php

namespace App\Http\Controllers;

use App\SavePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SavesController extends Controller
{


    // public function index(){

    //     $savePosts = SavePost::get() ;

    //     return view('index')->compact($savePosts) ;

    // }

    public function save($post_id){

        DB::table('user_post')->insert(
            [
                'user_id' => Auth::user()->id,
                'post_id' => $post_id ,
                'created_at' => NOW()
            ]
        );

        // Bug Back .. should bo return current view without reload
        return redirect()->back();


    }


}
