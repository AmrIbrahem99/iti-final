@extends('layout')
@section('title')
 {{$post->user['full_name']}} (@ {{$post->user->user_name}}) | Instagram
@endsection


@section('content')

<div class="container py-3">

    <div class="row">

        <div class="col-md-12 py-4">



    <div style="background-color:white;
    border-radius:4px; box-shadow: 1px 1px 2px gray; " class="row">
        <div  class="col-md-7">
            <img style="width: 80% ; height:500px" class="" src="{{asset('img/posts/' . $post->image)}}" alt="">
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

            {{-- na2s desgin --}}
            @foreach($post->comments as $comment)
                <div class="row">
                    <div class="col-md-3 py-2">
                        <img class="edit-img" src="{{asset('img/users/' .  $comment->user->avatar)}}" alt="">
                    </div>
                    <div class="col-md-2 py-3" >

                        <a href = "{{route('users.profile' , $comment->user->id )}}"> {{$comment->user->user_name}}</a>
                    </div>
                </div>

                <div class="col-md-2 py-3" >
                    <p class="text-muted">{{$comment->comment}}</p>
                </div>
                <hr>
                <hr>
            @endforeach
        </div>



{{--                <span>{{$comment->user->user_name}}</span>--}}
{{--                <img class="edit-img" style="margin-left: 200px" src="{{asset('img/users/' . $comment->user->avatar)}}" alt="">--}}
{{--            <br>--}}
{{--              <p>{{$comment->comment}}</p>--}}

        <form action="{{route('comment.add')}}" method="POST">
            @csrf
            <div class="input-group " style="padding-left: 379px">
                <input style="width: 600px" type="text" name="comment_body" id="comment_body" class="form-control " placeholder="Comment... " >
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" >Add comment</button>
                </div>
            </div>
        </form>


     </div>

        </div>

    </div>
        </div>


@endsection
