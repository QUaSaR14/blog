<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Purrfect</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <style>
        body{
            background: url(https://images.unsplash.com/photo-1502860372601-2a663136d5a2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c1266fd1b0e8dd3330a2b34531cf19c0&auto=format&fit=crop&w=2032&q=80);
            /* background: url(https://images.unsplash.com/photo-1578540244871-974894517b7a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=925&q=80); */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: 'Lato', san-serif;
            color: #ff7733;
        }	

        html{
            height: 100%;
        }

        hr{
            width: 40%;
            background-color: #4d4d4d;
        }


        #content{
            text-align: center;
            padding-top: 25%;
            text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                        0px 8px 13px rgba(0,0,0,0.1),
                        0px 18px 23px rgba(0,0,0,0.1);

        }

        h1{
            font-size: 4.5em;
            font-weight: 700;
        }

        .navbar-default .navbar-brand{
            color: #3399ff;
        }

        .navbar-default{
            background-color: transparent;
        }

        .btn-default {
            color: #e6ffff;
            background-color: transparent;
            border-color: #ccc;
        }

        .btn-default:hover{
            background-color: #ff9999;
        }

        .navbar-default .navbar-nav>li>a {
            color: #63c0c4;
        /* background-color:  #63c0c4;*/
        }

        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
            color: 	  #b26b52;
            background-color: 	  #deffff;
        }

        .navbar-default .navbar-toggle {
            border-color: 	  #555;
        }
    </style>    
</head>
<body>
	
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
		     	</button>
				<!-- <a href="{{ url('/') }}" class="navbar-brand"><i class="fas fa-venus-mars"></i> Purrfect</a> -->
				<a href="{{ url('/') }}" class="navbar-brand"><i class="fab fa-superpowers"></i> Purrfect</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
				<ul class="nav navbar-nav">
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">{{ Auth::user()->name }} <i class="fas fa-user"></i></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login <i class="fas fa-user"></i></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register <i class="fas fa-user-plus"></i></a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="content">
					<h1>Purrfect</h1>
					<h3>The Social App</h3>
					<hr>
					<!-- <button class="btn btn-default btn-lg"><i class="fas fa-user-friends"></i>Get Started!</button> -->
				</div>
			</div>
		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</body>
</html>
