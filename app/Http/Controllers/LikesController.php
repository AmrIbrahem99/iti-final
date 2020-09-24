<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function like($post_id){


        DB::table('likes')->insert(
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
