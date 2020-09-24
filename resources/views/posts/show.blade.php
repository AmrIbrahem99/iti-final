@foreach($post as $comment)
    <p>{{$comment->user->user_name}}</p>
    <p>{{$comment->user->avatar}}</p>
    <br>
<p>{{$comment->commet}}</p>
    @endforeach
