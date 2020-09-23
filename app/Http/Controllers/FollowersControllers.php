<?php

namespace App\Http\Controllers;

use App\Followers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowersControllers extends Controller
{

    public function follow($suggest_id){
        
         
        DB::table('followers')->insert(
            [
                'user_id' => Auth::user()->id,
                'follower_id' => $suggest_id
            ]
        );
       

     
        return  redirect(route('users.profile' , $suggest_id)) ;
    }

    public function unfollow($id){
        
        Followers::where(
        ['user_id'=> Auth::user()->id ,
         'follower_id' => $id  ] )->delete();
         
         
        return  redirect(route('users.profile' , $id)) ;
    }



}
