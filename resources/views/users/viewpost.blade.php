@extends('layout')
@section('title')
 {{$post->user['full_name']}} (@ {{$post->user->user_name}}) | Instagram
@endsection





@section('content')
    <div class="my-5 py-5">

        <div class="container bg-light p-4" >
            <div class="row">
                <div class="col-8 ">
                    <img  class="w-100 " src="{{asset('img/posts/' . $post->image)}}" alt="">
                </div>

                <div class="col-4 row flex-column justify-content-between">


                    <div class="row ">
                        <div class="col-4 pr-0 pl-5">
                            <img class="w-100 rounded-circle " height="70px" src="{{asset('img/users/' . $post->user->avatar)}}" alt="">
                        </div>
                        <div class="col-8">
                            <h5 class="pl-0 mt-3" >{{$post->user->user_name}}</h5>
                        </div>
                    </div>


                    <div class="row ">
                        @foreach($post->comments as $comment)
                            <div class="col-3 pl-5">
                                <a href = "{{route('users.profile' , $comment->user->id )}}" class="text-decoration-none text-dark font-weight-bold">
                                    <img class="edit-img mx-2" src="{{asset('img/users/' .  $comment->user->avatar)}}" alt="">
                                </a>

                            </div>
                            <div class="col-3 mt-1">
                                <a href = "{{route('users.profile' , $comment->user->id )}}" class="text-decoration-none text-dark font-weight-bold"> {{$comment->user->user_name}}</a>
                            </div>
                            <div class="col-6 mt-1">
                                <p class="text-muted">{{$comment->comment}}</p>
                            </div>
                        @endforeach
                    </div>

                    <footer>
                        <form action="{{route('comment.add')}}" class="ml-5" method="POST">
                            @csrf
                            <div class="input-group ">
                                <input  type="text" name="comment_body" id="comment_body" class="form-control " placeholder="Comment... " >
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit" >Comment</button>
                                </div>
                            </div>
                        </form>
                    </footer>






                </div>
            </div>

        </div>

    </div>



@endsection



