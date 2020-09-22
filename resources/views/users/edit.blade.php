
@extends('layout')

@section('title')  
    Edit Profile  
@endsection

@section('content')
      
<div style="padding: 2rem 0;" class="container py-5">
    <div class="row">
        
         <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                 Edit Profile
                </a>
                <!-- <a href="#" class="list-group-item list-group-item-action">Change Password</a> -->
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action">Logout</a>
                
              </div>   
         </div>
         <div class="col-md-8">
               <div class="container">
               <div class="row">
                    <div class="col-md-2">
                        <img class="edit-img" src="{{asset('img/users/' . $user->avatar)}}" alt=""> 
                    </div>

                    <div class="col-md-10">
                        <h6 class="mt-2" style="font-weight: 700;">{{$user->user_name}}</h6>
                        <i type="button" class=" update-color" data-toggle="modal" data-target="#exampleModalCenter">
                            Change Profile Photo
                        </i>
                    </div>

               </div> 
            </div> 

             <!-- Button trigger modal -->
 
  
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
              

            <div class="container py-4">
                <form method="POST" action="{{route('users.update' , ['id' => $user->id])}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                  <div class="form-group">
                      <div class="row">
                       <div class="col-md-2">
                        <label class="m-2 form-labels">Name</label>
                       </div>   
                       <div class="col-md-10">
                        <input type="text" class="form-control" name="full_name" value="{{old('full_name') ?? $user->full_name}}">
                       </div>
                    
                  </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Username</label>
                     </div>   
                     <div class="col-md-10">
                      <input type="text" class="form-control" name="user_name" value="{{old('user_name') ?? $user->user_name}}">
                     </div>
                  
                </div>
                </div>

                <div class="form-group">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Email</label>
                     </div>   
                     <div class="col-md-10">
                      <input type="email" class="form-control" name="email" value="{{old('email') ?? $user->email}}">
                     </div>
                  
                </div>
                </div>

                <div class="form-group">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Website</label>
                     </div>   
                     <div class="col-md-10">
                      <input type="text" class="form-control" name="website" >
                     </div>
                  
                </div>
                </div>

                <div class="form-group">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Bio</label>
                     </div>   
                     <div class="col-md-10">
                      <textarea type="text" class="form-control" name="bio" >{{old('bio') ?? $user->bio}}
                      </textarea>
                     </div>
                  
                </div>
                </div>

                <div class="form-group">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Phone</label>
                     </div>   
                     <div class="col-md-10">
                      <input type="number" class="form-control" name="phone" value="{{old('phone') ?? $user->phone}}" >
                     </div>
                  
                </div>
                </div>

                <div class="form-group">
                    <div class="row">
                     <div class="col-md-2">
                      <label class="m-2 form-labels">Gender</label>
                     </div>   
                     <div class="col-md-10">
                      <input type="text" class="form-control" name="gender" value="{{old('gender') ?? $user->gender}}">
                     </div>
                  
                </div>
                </div>
  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </div>
                 
                </form>
              </div>
   
             
         </div>                       
 


    </div>



</div>

      
@endsection


