<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Post;
use App\User;
use App\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SavesController extends Controller
{

    use softDeletes;



    public function save($post_id){


        DB::table('user_posts')->insert(
            [
                'user_id' => Auth::user()->id,
                'post_id' => $post_id ,
                'created_at' => NOW()
                ]
            );


            // Bug Back .. should bo return current view without reload
            return  redirect(route('posts')) ;

    }


    public function allSaved(){

        $user = Auth::user();
        $saved = $user->posts;

        return view('users.profile', compact('saved') )  ;
        // return redirect(route('users.profile' , $id));

    }

    public function unsave($id){

        DB::table('user_posts')->where( 'post_id' , '=' , $id )->delete() ;

        return  redirect(route('posts')) ;

    }



}
