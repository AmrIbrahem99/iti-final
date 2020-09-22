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
                    <li><span class="profile-stat-count">164</span> posts</li>
                    <li><span class="profile-stat-count">188</span> followers</li>
                    <li><span class="profile-stat-count">206</span> following</li>
                </ul>

            </div>

            <div class="profile-bio">

                <p><span style="display: block;"class="profile-real-name">{{$user->full_name}}</span>
                     {{$user->bio}} </p>
                    @if(!Auth::check() || $user->id !== Auth::user()->id )
                     <button class="btn btn-primary">Follow</button>
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