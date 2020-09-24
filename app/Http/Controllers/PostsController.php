<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index(){

        // $followrs = Follower::where('user_id', '=' , 'user_id' )->get();

        // $posts = Post::where('user_id' , '=' , 'follower_id' )->get() ;

        $posts = Post::get() ;
        $suggests = User::inRandomOrder()->limit(5)->get() ;
        $user = User::all();

        return view( 'index' , compact('posts' , 'suggests' , 'user')) ;
    }

    public function create(){
        return view(
            'posts.create', compact('id'));
    }

    public function store(Request $request){

        $request->validate([
            'body'=> 'string|max:100' ,
            'image' => 'required|image'
        ]);


        //move
        $img = $request->file('image') ;
        $ext = $img->getClientOriginalExtension() ;
        $name = uniqid() .".$ext" ;
        $img->move( public_path('img/posts') ,$name ) ;

        Post::create([
            'user_id' => Auth::user()->id,
            'body' => $request->body ,
            'image'=> $name
        ]) ;

        return redirect( route ('posts') ) ;
    }


    public function edit($id){
        $post = Post::findOrFail($id);

        return view(
            'posts.edit',
            compact('post')
        );
    }


    public function update(Request $request , $id) {

        $img = $request->file('image') ;
        $ext = $img->getClientOriginalExtension() ;
        $name = uniqid() .".$ext" ;
        $img->move( public_path('img/posts') ,$name ) ;

        Post::findOrFail($id)->update([
            'body'=> $request->body ,
            'image'=> $name
        ]) ;

        return redirect(route ('posts')) ;

    }

    public function delete($id) {

        Post::findOrFail($id)->delete() ;
        return redirect(route('posts')) ;

    }

    public function show($id)
    {
        $post= Post::find($id);
        return redirect(route('post.show',compact('post'))) ;
    }
}
