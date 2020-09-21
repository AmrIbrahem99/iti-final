@extends('layout')



@section('title')
    Home
@endsection


@section('content')
    {{-- New Post --}}
    <section>

        <a type="button" href="{{route('posts.create')}}" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
            New Post
        </a>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" class="m-auto" action="{{ route('posts.store') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="modal-body">


                            <div class="form-group">
                                <textarea type="text" name="body" class="form-control" placeholder="Body ... " rows="4" ></textarea>
                            </div>


                            <div class="form-group my-5">
                                <input type="file" class="" name="image">
                            </div>

                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Post Now</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>

    </section>












    <section class="row home">

        <div class="col-lg-8 col-md-12  ">

            @foreach($posts as $post)
                <div class="post my-5">
                    <header class="row px-3 py-2">
                        <div class="col-1 ">
                            <img src="{{asset('uploads/profile/11.jpg')}}" class="rounded-circle w-100 pt-1" alt="">
                        </div>
                        <div class="col-11 row justify-content-between px-0">
                            <div class="col-9">
                                <h6 class="pt-2"> {{$post->user->user_name}} </h6>
                            </div>
                            <div class="col-3 p-0">
                                {{-- @auth --}}
                                <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-outline-primary"> Edit</a>
                                <a href="{{route('posts.delete' , $post->id)}}" class="btn btn-outline-danger"> Delete</a>
                                {{-- @endauth --}}



                            </div>
                        </div>
                    </header>
                    <div>
                        <img src="{{asset('uploads/posts/'.$post->image)}}" class="w-100  pb-3"  alt="">
                    </div>
                    <footer class="">
                        <header class="row justify-content-between icones py-2 px-3">
                            <div class="px-3">
                                <a href="" class="pr-2"><i class="far fa-heart"></i></a>
                                <a href="" class="pr-2"><i class="far fa-comment"></i></a>
                                <a href="" class="pr-2"><i class="fas fa-location-arrow"></i></a>
                            </div>
                            <div class="px-3">
                                <a href=""><i class="far fa-bookmark"></i></a>
                            </div>
                        </header>
                        <div class="px-3">
                            <p> {{$post->body}} </p>
                        </div>
                        <footer class="">
                            <form action="">
                                <div class="input-group ">
                                    <input type="text" class="form-control " placeholder="Comment... " >
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">Post</button>
                                    </div>
                                </div>
                            </form>
                        </footer>
                    </footer>
                </div>
            @endforeach

        </div>






        <aside class="col-lg-3 d-none d-lg-block offset-1 my-5  sideDiv">
            <header class="row justify-content-between p-3">
                <div>
                    <p class="text-muted ">Suggestions For You</p>
                </div>
                <div>
                    <a href="" class="allFolwers" > <p class="text-dark "> See All</p></a>
                </div>
            </header>

                @foreach($suggests as $suggest)
                    <div class="row px-3">

                        <div class="col-10 p-0 row">

                            <div class="col-4">
                                <a class="newAcc" href="{{--route('' , $suggest->id)--}}">
                                    <img src="{{asset('uploads/profile/11.jpg')}}" class="rounded-circle w-100 pt-1" alt="">
                                </a>
                                </div>
                                <div class="col-8 pt-4">
                                    <a class="newAcc" href="{{--route('' , $suggest->id)--}}">
                                        <h6 class="">{{$suggest->full_name}}</h6>
                                    </a>
                                </div>
                            </a>

                        </div>

                        <div class="col-2 text-right py-4 pr-0">
                            <a href="{{route('user.follow' , $suggest->id)}}" class="">Follow</a>
                        </div>

                    </div>
                @endforeach






            <footer>

            </footer>
        </aside>
    </section>


@endsection
