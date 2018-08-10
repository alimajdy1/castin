@extends('layouts.app')
@section('title', 'User-Signup')
@section('content')
    <div class="main_bg">
        <div class="signup_outer">
            <a href="{{ url('signup') }}">
                <img src="{{ asset('assets/images/close_btn.png') }}" class="closebtn">
            </a>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2>Sign Up</h2>
            <form id="user-sign-form" class="user-sign-form" name="user-signup" method="post"
                  action="{{ url('/create-user') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form_input">
                    <input type="text" class="form_control" required="required" placeholder="Full name" name="name"
                           value="{{ old('name') }}">
                </div>
                <div class="form_input">
                    <input type="email" class="form_control" placeholder="Email" required="required" name="email"
                           value="{{ old('email') }}">
                </div>
                <div class="form_input">
                    <input type="text" class="form_control" required="required" placeholder="Username" name="username"
                           value="{{ old('username') }}">
                </div>
                <div class="form_input">
                    <input type="password" class="form_control" required="required" placeholder="Password"
                           name="password" value="{{ old('password') }}">
                </div>
                <div class="form_input">
                    <input type="text" class="form_control" required="required" pattern="[0-9]{1,15}"
                           placeholder="Phone" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="form_input">
                    <input type="text" id="location" class="form_control" required="required" placeholder="location"
                           name="location">
                </div>
                <div class="form_input">
                    <div class="box">
                        <input type="file" required="required" name="avtars" id="file-7" class="inputfile inputfile-6"/>
                        <label for="file-7"><span>ID Picture</span> <img src="{{ asset('assets/images/camera.png') }}"
                                                                         alt=""></label>
                    </div>
                </div>
                <div class="form_input">
                    <input type="hidden" class="form_control" name="utype" value="user">
                    <input class="btn btn_pink" name="sub-btn" type="submit" value="Done" />
                </div>
            </form>
        </div>
    </div>
@endsection
@section('jquery_content')
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=en"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);
    </script>

@endsection
