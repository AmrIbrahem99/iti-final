@extends('layout')
@section('title')
 {{$user->full_name}} (@ {{$user->user_name}}) | Instagram
@endsection


@section('content')
     
<section class="py-1">
    <div class="container">


        <div class="profile">

            <div class="profile-image">
                <i type="button" class="" data-toggle="modal" data-target="#exampleModalCenter">
                   <img style="margin-left: 50px" class="user-img" src="{{asset('img/users/' . $user->avatar)}}" alt="">
                </i>
            
                @if(Auth::check() && $user->id == Auth::user()->id ) 
                  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <ul class="list-group text-center">
            <form method="POST" action="{{route('users.updateImg' , ['id' => $user->id])}}" enctype="multipart/form-data">
              @method('PUT') 
              @csrf
                   <li class="list-group-item">  
                    <input class="form-control-file" name="img" type="file">
                    <a class="update-color des-pop" href="#"> <button class="btn btn-primary" type="submit">Upload Photo</button> </a> </li>
                    
                    </form>
                
                <li class="list-group-item"> <a style="font-weight: 600;" class="des-pop text-danger"
                   href="{{route('users.deleteImg' , $user->id)}}">
                  Remove Current Photo</a> </li>
               <li class="list-group-item"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></li> 
              </ul>

        </div>
        
      </div>
    </div>
  </div>

                    @endif

            </div>

            <div class="profile-user-settings">

            <h1 class="profile-user-name">{{$user->user_name}}</h1>
               @if(Auth::check() && $user->id == Auth::user()->id)
               <a href="{{route('users.edit' , ['id' => Auth::user()->id ])}}"> <button class="btn profile-edit-btn"> Edit Profile</button> </a>
                @endif
                <!-- <button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button> -->

            </div>

            <div class="profile-stats">

                <ul>
                <li><span class="profile-stat-count">{{$user->post()->count()}}</span> posts</li>
                <li data-toggle="modal" data-target="#exampleModalCenter1"><span class="profile-stat-count">{{$user->followings()->count()}}</span> followers</li>
                <li data-toggle="modal" data-target="#exampleModalCenter2"><span class="profile-stat-count">{{$user->followers()->count()}}</span> following</li>
                </ul>

                {{-- try to display the following and followers list --}}
              

                {{-- <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                       
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="text-center">
                          <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active">
                              Followers
                            </a>
                            @foreach ($user->followers as $follow)
                            <a href="#" class="list-group-item list-group-item-action"> 
                              <div class="row">

                             
                            <img style="width: 10%" class="edit-img" src="{{asset('img/try.jpg')}}" alt="">
                              <h6 class="m-2 mt-2" style="font-weight: 600 ">{{$follow->user_id}}</h6>  
                            </div> 
                            </a>
                             @endforeach
                          </div>
                      </div>
                      </div>
                      
                    </div>
                  </div>
                </div>


                <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                       
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        hi 2
                      </div>
                      
                    </div>
                  </div>
                </div>
  --}}




            </div>

            <div class="profile-bio">

                <p><span style="display: block;"class="profile-real-name">{{$user->full_name}}</span>
                     {{$user->bio}} </p>
                    @if(!Auth::check() || $user->id !== Auth::user()->id )
                          <?php $tmp = false;  ?>
                       @foreach ($users as $u)   
                    @foreach($u->followers as $follow)
                        
                         @if (Auth::user()->id == $follow->user_id && $user->id == $follow->follower_id)
                                 <?php $tmp = true;  ?>
                         @endif 

                     @endforeach    
                      @endforeach
                      @if ($tmp) 
                     <a href="{{route('user.unfollow' , $user->id)}}"> <button class="btn btn-danger">Unfollow</button> </a>
                      @else 
                    <a href="{{route('user.follow' , $user->id)}}"> <button class="btn btn-primary">Follow</button> </a>
                    @endif 
                    @endif
            </div>

            

        </div>
         




    </div>
      
 </section>  

 <div class="container">
    
 <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
     
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> 
          <i class="fas fa-th"></i> Posts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
        <i class="far fa-bookmark"></i> Saved</a>
    </li>

  </ul>
  
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          
        <!-- posts place -->

          <div class="container py-1">
              <div class="row">
                 
               @foreach ($user->post as $item)
                   
                  <div class="col-md-4 mb-2">
                      <div class="user-post">
                          
                      <a href="{{route('users.viewpost' , ['id' => $item->id ])}}"> 
                         <img class="w-100 img-element" src="{{asset('img/posts/' . $item->image)}}" alt=""> 
                      </a>

                       </div>
                 </div>
                 @endforeach
                </div>
             </div>
        

    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> Saved



    </div>
    
  </div>

</div>
     
@endsection