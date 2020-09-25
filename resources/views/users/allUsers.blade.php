@extends('layout')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/allUsers.css') }}">
@endsection

@section('title')
    Users
@endsection

@section('content')

    <div class="my-5">
        <div class="my-4">
            <input type="text" class="form-control w-50 m-auto" placeholder=" &#x1F50E;  Search" id="keyword">
        </div>


        <div class="row bg-light w-50 m-auto "  id="allUsers" >

            @foreach ($users as $user)
                <div class="col-12 row my-2 py-2">
                    <div class="col-2 ">
                        <a href = "{{route('users.profile' , $user->id )}}" >
                            <img src="{{asset('img/users/' . $user->avatar)}}" height="60px" class="rounded-circle w-100 " alt="">
                        </a>

                    </div>
                    <div class="col-6 mt-1 pl-0">
                        <a href = "{{route('users.profile' , $user->id )}}" class="text-decoration-none text-dark">
                            <h5 class="m-0">{{$user->user_name}}</h5>
                        </a>
                        <p class="m-0 text-muted">{{$user->full_name}}</p>

                    </div>
                    <div class="col-4 text-right mt-1 pr-0">
                        <a href = "{{route('users.profile' , $user->id )}}" class="btn btn-primary "> View Profile </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection



@section('scripts')
    <script>
        $('#keyword').keyup(function(){
            let keyword = $(this).val() ;
            let url = "{{route('users.search')}}" + "?keyword=" + keyword ;


            $.ajax({
                type : "GET" ,
                url : url ,
                contentType : false ,
                processDate : false ,
                success : function(data){
                    $('#allUsers').empty();

                    if (data === undefined || data.length == 0) {
                            $('#allUsers').append(`
                                <div class="alert alert-danger w-100 text-center"> No Result found</div>
                            `)
                        }
                    for (user of data) {


                        $('#allUsers').append(`
                            <div class="col-12 row my-2 py-2">
                                <div class="col-2 ">
                                    <a href = " <?php echo URL::to('users/${user.id}'); ?>" >
                                        <img src=" <?php echo asset( 'img/users/${user.avatar} ' )  ; ?>" height="60px" class="rounded-circle w-100 " alt="">

                                    </a>

                                </div>
                                <div class="col-6 mt-1 pl-0">
                                    <a href = " <?php echo URL::to('users/${user.id}'); ?>"  class="text-decoration-none text-dark" >
                                        <h5 class="m-0">    ${user.user_name}      </h5>
                                    </a>
                                    <p class="m-0 text-muted">${user.full_name}</p>

                                </div>
                                <div class="col-4 text-right mt-1 pr-0">
                                    <a href = " <?php echo URL::to('users/${user.id}'); ?>" class="btn btn-primary "> View Profile </a>
                                </div>
                            </div>


                        `)






                    }

                }
            })



        })
    </script>
@endsection
