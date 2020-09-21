<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowersControllers extends Controller
{

    public function follow($suggest_id){

        DB::table('followers')->insert(
            [
                'user_id' => 1,
                'follower_id' => $suggest_id
            ]
        );


        return  redirect('posts') ;
    }


}
