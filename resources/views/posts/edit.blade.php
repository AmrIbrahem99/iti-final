@extends('layout')

@section('content')
<div class="container my-5 text-center">


    <form method="POST" class="m-auto" action="{{ route('posts.update' , $post->id) }}" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <textarea type="text" name="body" class="form-control" placeholder="Body ... " rows="4" >{{$post->body}}</textarea>
        </div>


        <div class="form-group my-5">
            <input type="file" class="" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection
