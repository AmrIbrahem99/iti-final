<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/homeStyle.css') }}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  {{-- <link rel="shortcut icon" type="image/png" href="{{asset('img/insta-title.svg.png')}}"> --}}
  <link rel="shortcut icon" type="image/png" href="{{asset('img/insta.png')}}"> 


  @yield('styles')

</head>
<body>
  @include('includes.navbar')
  <div class="container py-5">
    @yield('content')
  </div>

  <script src="{{ asset('js/all.min.js') }}"></script>
  <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>

  @yield('scripts')

</body>
</html>
