@extends('layout')
@section('title')
 {{$post->user['full_name']}} (@ {{$post->user->user_name}}) | Instagram
@endsection


@section('content')

<div class="container">

    <div class="row">
 
        <div class="col-md-12 py-4">
              
          

    <div style="background-color:white; 
    border-radius:4px; box-shadow: 1px 1px 2px gray; " class="row">
        <div class="col-md-7">
            <img style="width: 80% ;" class="" src="{{asset('img/posts/' . $post->image)}}" alt="">
        </div> 
 
        <div class="col-md-5">
              
            <div class="row">
                <div class="col-md-2 py-2">
                 <img class="edit-img" src="{{asset('img/users/' . $post->user->avatar)}}" alt="">  
                </div>
                <div class="col-md-2 py-3" >
                    
                 <span class="mt-2 ml-2" style="font-weight: 700;">{{$post->user->user_name}}</span>
                  
                </div>
            </div>
            <hr>
         
         </div>      
         
       
  
     </div>
 
        </div>

    </div>
</div>

@endsection