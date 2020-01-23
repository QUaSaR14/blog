<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-eqiv="Content-Type" content="text/html"; charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", rel="stylesheet", integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN", crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- jQuery KeyBoard  -->
    <!-- Styles -->
    <!-- <linl href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" > -->
    <linl href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" >
    <link href="http://mottie.github.com/Keyboard/css/keyboard.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://mottie.github.com/Keyboard/js/jquery.keyboard.js"></script>
    <script src="https://mottie.github.com/Keyboard/layouts/keyboard-layouts-greywyvern.js"></script>

    <!-- Fonts & Icons -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custom style -->
    <style>
        html{
            height: 100%;
        }

        body{
            background: url(https://cdn.pixabay.com/photo/2019/12/13/09/46/umbrella-4692572_1280.jpg);
 
            /* background: url(https://images.unsplash.com/photo-1578540244871-974894517b7a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=925&q=80); */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            /* font-family: 'Lato', san-serif; */
            /* color: #ff7733; */
            font-weight: '300';
            color: #f5f6fa;
        }	


        .navbar-default{
            background-color: transparent;
            border-color: #7ed6df;
        }

        .navbar-light .navbar-brand, .navbar-light .navbar-brand:focus, .navbar-light .navbar-brand:hover {
            color: #3399ff;
        }

        .btn-link {
            font-weight: 400;
            color: #00a8ff;
            background-color: transparent;
            padding: 0;
        }

        .navbar-light .navbar-nav .nav-link {
           color: aqua;
        }

        .card-header , .col-form-label {
            color: #535c68;
        }


        /* Keyboard style */
        .ui-keyboard {
            background: "#636e72";
            border-radius: 30%;
            left: 25%;
            top: auto;
            position: relative;
            /* align-items: 'center'; */
            width: 50%;
        }
        .ui-keyboard-preview {
            width: 75%;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <i class="fab fa-superpowers"></i> {{ config('app.name') }}
                   <!-- {{ config('app.name') }} -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }} <i class="fas fa-sign-in-alt"></i></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }} <i class="fas fa-user-plus"></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item" >
                                <a href="/home" class="nav-link">{{ Auth::user()->name }} <i class="fas fa-user"></i></a>
                            </li>
                            <li class="nav-item" style=" padding-left: 10px; ">
                                    <a href="{{ route('logout') }}" class="nav-link"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>    
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <main class="py-4">
            <div class="container">
                @include('flash-message')
            <div>

            @yield('content')
        </main>
    </div>

    
    <script type='text/javascript'>
        $(".alert").fadeTo(2500, 500).slideUp(250, function() {
            $(this).alert('close');
        });
    </script>

    <!-- <script>
        var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Hindi&key=4d5831c3de6feb69a6b150946753065c'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
    </script> -->

</body>
</html>
