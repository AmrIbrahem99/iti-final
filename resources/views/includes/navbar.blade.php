

<?php use Illuminate\Support\Facades\Auth; ?>
{{-- 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Users
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">View Users </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">New User</a>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Posts
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">View Posts</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">New Post</a>
                </div>
            </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
@guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    @endguest
    </ul>
    </div>
    </nav> --}}

    <nav style='z-index:50' class="navbar position-fixed w-100 navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href="#"><img class="brand" src="{{asset('img/insta-logo.svg.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            @if(Auth::check())
            <li class="nav-item active">
            <a class="nav-link mt-2" href="{{route('posts')}}"> <i style="font-size: 20px;"class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user mt-2" src="{{asset('img/users/' . Auth::user()->avatar)}}" alt="Amin">
              </a> 
                {{-- {{asset('img/users/' . $user->avatar)}} --}}
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('users.profile' ,Auth::user()->id )}}">Profile</a>
              {{-- {{route('users.profile' , $user->id)}} --}}
                <a class="dropdown-item" href="#">Saved</a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
            
              </div>    
            </li>
            @endif

           @if(!Auth::check())

           @if (Route::currentRouteName() !== 'login')
            <li class="nav-item active">
                <a class="nav-link mt-2" href="{{route('login')}}"> <button class="btn btn-primary">Login</button><span class="sr-only">(current)</span></a>
            </li>
            @endif
            @if (Route::currentRouteName() !== 'register')
            <li class="nav-item active">
                <a class="nav-link mt-2" href="{{route('register')}}"> <button class="btn btn-primary">Register</button><span class="sr-only">(current)</span></a>
            </li>
            @endif

            @endif
          </ul>
    
        </div>
    </div>
    </nav>
