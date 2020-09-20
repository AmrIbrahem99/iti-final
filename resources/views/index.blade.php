@extends('layout')



@section('title')
    Home
@endsection


@section('content')
    <section class="row home">
        <div class="col-lg-8 col-md-12  ">

            <div class="post">
                <header class="row px-3 pt-2">
                    <div class="col-1 ">
                        <img src="{{asset('uploads/profile/11.jpg')}}" class="rounded-circle w-100 pt-1" alt="">
                    </div>
                    <div class="col-11 row justify-content-between px-0">
                        <div class="col-11">
                            <h6 class="pt-2"> Mohamed Walid</h6>
                        </div>
                        <div class="col-1 p-0">
                            <p class="text-center pt-2">00</p>
                        </div>
                    </div>
                </header>
                <div>
                    <img src="{{asset('uploads/profile/11.jpg')}}" class="w-100  pb-3"  alt="">
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
                        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos alias quidem reiciendis aspernatur aperiam cumque deserunt, accusamus assumenda, iusto libero incidunt autem in dolores quia, rem minima quaerat praesentium excepturi! Assumenda excepturi impedit quasi explicabo dolor voluptate similique </p>
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

        </div>
        <div class="col-lg-3 d-none d-lg-block offset-1 my-5  sideDiv">
            <header class="row justify-content-between p-3">
                <div>
                    <p class="text-muted ">Suggestions For You</p>
                </div>
                <div>
                    <a href="" class="allFolwers" > <p class="text-dark "> See All</p></a>
                </div>
            </header>

                <div class="row px-3">
                    <div class="col-2 p-0">
                        <img src="{{asset('uploads/profile/11.jpg')}}" class="rounded-circle w-100 pt-1" alt="">
                    </div>
                    <div class="col-10 row justify-content-between py-4">
                        <div class="col-11 ">
                            <h6 class=""> Mohamed Walid</h6>
                        </div>
                        <div class="col-1 p-0">
                            <a href="" class="">Follow</a>
                        </div>
                    </div>
                </div>
                <div class="row px-3">
                    <div class="col-2 p-0">
                        <img src="{{asset('uploads/profile/11.jpg')}}" class="rounded-circle w-100 pt-1" alt="">
                    </div>
                    <div class="col-10 row justify-content-between py-4">
                        <div class="col-11 ">
                            <h6 class=""> Mohamed Walid</h6>
                        </div>
                        <div class="col-1 p-0">
                            <a href="" class="">Follow</a>
                        </div>
                    </div>
                </div>
                <div class="row px-3">
                    <div class="col-2 p-0">
                        <img src="{{asset('uploads/profile/11.jpg')}}" class="rounded-circle w-100 pt-1" alt="">
                    </div>
                    <div class="col-10 row justify-content-between py-4">
                        <div class="col-11 ">
                            <h6 class=""> Mohamed Walid</h6>
                        </div>
                        <div class="col-1 p-0">
                            <a href="" class="">Follow</a>
                        </div>
                    </div>
                </div>





            <footer>

            </footer>
        </div>
    </section>


@endsection
