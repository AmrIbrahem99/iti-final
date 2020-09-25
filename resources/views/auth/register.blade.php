
@extends('layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/signInStyle.css') }}">
@endsection


@section('title')
    Register
@endsection

@section('content')

    <div style="padding: 2rem 0">
        <div class="text-center m-auto">
    <span id="root">
      <section class="section-all">

        <!-- 1-Role Main -->
        <main class="main" role="main">
          <div class="wrapper">
            <article class="article">
              <div class="content">
                <div class="login-box">
                  <div class="header">
                      <div class="m-auto">
                    <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Instagram_logo.svg/1200px-Instagram_logo.svg.png" alt="Instagram">
                </div>
                </div><!-- Header end -->
                  <div class="form-wrap">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-box">
                                    <input placeholder="full name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus>
                            @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                           <div class="input-box">
                                    <input id="user_name" placeholder="username" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                            @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                           <div class="input-box">
                                    <input id="phone" placeholder="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>



                           <div class="input-box">
                               <input id="email"  placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>



                           <div class="input-box">
                               <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>



                        <div class="input-box">
                                    <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">


                        </div>

                            {{-- <div class="input-box ">

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                                <input class="form-check-input signInRemember " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            </div> --}}


                        <span class="button-box my-5">
                            <button type="submit" class="btn btn-primary">
                                {{ __('sign up') }}
                            </button>
                        </span>
                         <span class="button-box my-5">
                            <a href="{{url('/redirect/facebook')}}"><button type="button" class="btn btn-outline-secondary">Login with Facebook  </button></a>
                                  </span>

                    </form>
                  </div> <!-- Form-wrap end -->
                </div> <!-- Login-box end -->

                <div class="app">
                  <p>Get the app.</p>
                  <div class="app-img">
                    <a href="https://itunes.apple.com/app/instagram/id389801252?pt=428156&amp;ct=igweb.loginPage.badge&amp;mt=8">
                      <img src="https://www.instagram.com/static/images/appstore-install-badges/badge_ios_english-en.png/4b70f6fae447.png" >
                    </a>
                    <a href="https://play.google.com/store/apps/details?id=com.instagram.android&amp;referrer=utm_source%3Dinstagramweb%26utm_campaign%3DloginPage%26utm_medium%3Dbadge">
                      <img src="https://www.instagram.com/static/images/appstore-install-badges/badge_android_english-en.png/f06b908907d5.png">
                    </a>
                  </div>  <!-- App-img end-->
                </div> <!-- App end -->
              </div> <!-- Content end -->
            </article>
          </div> <!-- Wrapper end -->
        </main>

          <!-- 2-Role Footer -->
        <footer class="footer" role="contentinfo">
          <div class="footer-container">

            <nav class="footer-nav" role="navigation">
              <ul>
                <li><a href="">About Us</a></li>
                <li><a href="">Support</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">Press</a></li>
                <li><a href="">Api</a></li>
                <li><a href="">Jobs</a></li>
                <li><a href="">Privacy</a></li>
                <li><a href="">Terms</a></li>
                <li><a href="">Directory</a></li>
                <li>
                  <span class="language">Language
                    <select name="language" class="select" onchange="la(this.value)">
                      <option value="#">English</option>
                      <option value="http://ru-instafollow.bitballoon.com">Russian</option>
                    </select>
                  </span>
                </li>
              </ul>
            </nav>

            <span class="footer-logo">&copy; 2020 Instagram</span>
          </div> <!-- Footer container end -->
        </footer>

      </section>
    </span> <!-- Root -->
        </div>
    </div>
    <!-- Select Link -->
    <script type="text/javascript">
        function la(src) {
            window.location=src;
        }
    </script>



@endsection
