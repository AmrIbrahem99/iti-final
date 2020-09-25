<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UserController extends Controller
{
    public function profile ($id){  

      
        $cuser = Auth::user();
        $saved = $cuser->posts;
       
       
        $user = User::findOrFail($id);
        $users = User::all();
        return view('users.profile' , compact('user' , 'users' , 'saved'));
    }

    public function edit ($id) {
            $user = User::findorfail($id);


                // if(Auth::user()->id !== $id) 
                //    return redirect(route('users.profile' , Auth::user()->id)); 



             return view('users.edit' , compact('user') );
    }
    public function update (Request $req , $id) {

        $req->validate([
           'user_name' => 'required|string|max:20' ,
           'full_name' => 'required|string' ,
        //    'password' => 'required|password' , 
           'email' =>  'required|email' ,
           'gender' => '' , 
           'phone' => 'numeric',
           'website' => '' ,
           'bio' => 'string'
        ]);
              
        User::findOrFail($id)->update(

        [ 'user_name' => $req->user_name ,
        'full_name' => $req->full_name ,
        // 'password' => $req->password , 
        'email' => $req->email ,
        'gender' => $req->gender , 
        'phone' => $req->phone,
        'website' => $req->website ,
        'bio' => $req->bio ]
        );
        return redirect(route('users.profile' , $id));  
       }

    public function updateImg(Request $req , $id) {
        $req->validate([
            
            'avatar' => 'image|mimes:jpg,jpeg,png'
         ]); 
      
          $img = $req->file('img');
          $ext = $img->getClientOriginalExtension();
          $name = 'users-' . uniqid() .".$ext" ; 
          $img->move(public_path('img/users') , $name) ;

          $user = User::findOrFail($id);
          if ($user->avatar !== 'def.jpg')
          unlink(public_path('img/users/') . $user->avatar);

         User::findorfail($id)->update([
          'avatar' => $name ]) ;  
          
         
          return redirect(route('users.profile' , $id)) ;

    }
    public function deleteImg ($id) {
         
        $user = User::findOrFail($id);
        
        if ($user->avatar !== 'def.jpg')
           unlink(public_path('img/users/') . $user->avatar);



           User::findorfail($id)->update([
            'avatar' => 'def.jpg' ]) ;  

      
     return redirect(route('users.profile' , $id));

    }
    
     
    public function viewpost($id) {
       
        $post = Post::findOrFail($id);
        return view('users.viewpost' , compact('post'));

    }

    public function logout () {
        //logout user
       
        Auth::logout();
   // redirect to homepage
      return redirect('login');
    }
}
