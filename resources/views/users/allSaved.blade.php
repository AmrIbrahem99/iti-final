<h1>all saved</h1>

<hr>
<div class="row">

{{--
    @foreach ($arr as $post)
        <div class="col-md-4">

            <p>{{$post[0]->body}}</p>
            <img src="{{asset('img/posts/'.$post[0]->image)}}"  alt="">
        </div>
    @endforeach --}}

    @foreach ($posts as $post)
    <div class="col-md-4">

        <p>{{$post->body}}</p>
        <img src="{{asset('img/posts/'.$post->image)}}"  alt="">
    </div>
@endforeach





</div>
