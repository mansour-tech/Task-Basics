<!doctype html>
<html dir="rtl"  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">

   <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
   <!-- CSS -->
   <meta name="theme-color"  content="#016833">
   <link href="images/icon.ico" rel="shortcut icon" type="image/x-icon">
   <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
   <link rel="stylesheet" href="={{ asset('css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/Fonts.css') }}">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="description" content="@yield('description')">
   <title>@yield('title')</title>
</head>
<body>
    <div id="app">
        <nav dir="ltr" class="navbar navbar-expand-lg navbar-light bg-gradinet ">
            <a style="font-family: SST Arabic" class="navbar-brand text-left" href="{{route('task.index') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </nav>
        <ul class="nav nav-pills shadow-sm py-3  bg-white w-100">
            @guest
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('login') }}">تسجيل الدخول </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success"  href="{{ route('register') }}">إنشاء حساب </a>
                </li>
            @endif
            @else
                <div class="d-flex justify-content-center w-100">
                    <li class="nav-item">
                        <a class="btn btn-success" href="#">
                        <svg width="19px" height="19px" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                        إنشاء مهمة </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger  mr-2" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">
                        <svg width="19px" height="19px" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                            <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        {{ ('تسجيل الخروج') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </div>
            @endguest
        </ul>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
