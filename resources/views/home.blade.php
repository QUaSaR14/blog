@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <!-- <div class="card">
                <div class="card-body"> -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{route('users.edit')}}" data-toggle="tab" class="nav-link">Edit</a>
                </li> -->
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="mb-3"><i class="fa fa-hashtag"></i> <b>User Profile</b></h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6> {{Auth::user()->name}} ({{Auth::user()->hindi_name}}) <i class="fa fa-user"></i></h6>
                            <h6> {{Auth::user()->email}} <i class="fa fa-envelope"></i></h6>
                            <h6> {{Auth::user()->address}} <i class="fa fa-map-marker"></i></h6>
                            <h6> Date-of-Birth: {{Auth::user()->dob}} <i class="fa fa-birthday-cake"></i></h6>
                            <h6> Phone Number: {{Auth::user()->phone}} <i class="fa fa-phone"></i></h6>
                            <a href="{{route('users.edit')}}">Edit <i class="fa fa-edit"></i></a>
                        </div>
                        <div class="col-md-6">
                            <h6>Recent badges</h6>
                            <a href="#" class="badge badge-dark badge-pill">html5</a>
                            <a href="#" class="badge badge-dark badge-pill">react</a>
                            <a href="#" class="badge badge-dark badge-pill">codeply</a>
                            <a href="#" class="badge badge-dark badge-pill">angularjs</a>
                            <a href="#" class="badge badge-dark badge-pill">css3</a>
                            <a href="#" class="badge badge-dark badge-pill">jquery</a>
                            <a href="#" class="badge badge-dark badge-pill">bootstrap</a>
                            <a href="#" class="badge badge-dark badge-pill">responsive-design</a>
                            <hr>
                            <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                            <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                        </div>
                    </div>
                    <!--/row-->
                </div>
            </div>

        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="{{Auth::user()->image}}" class="mx-auto img-fluid img-circle d-block" alt="avatar" >
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- <span id="qpd_banner">Hindi Typing On This Site Is Powered By <a href="http://www.quillpad.in/" target="_blank">Quillpad</a>.</span> -->
@endsection
