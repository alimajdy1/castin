@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="login_bg">
			<div class="login_top_bar">
				<a href="{{ url('signup') }}">Sign up</a>
			</div>
			<div class="logo">
				<a href="#">
					<img src="{{ asset('assets/images/logo.png') }}" alt="logo">
				</a>
			</div>

			<div class="login_form">
				<form method="post" action="{{ url('login_user') }}">
					{{ csrf_field() }}
					<div class="login_input">
						<img src="{{ asset('assets/images/icon_user.png') }}" alt="">
						<input type="text" class="login_control" placeholder="Username" name="login" value="{{ old('login') }}" required>
					</div>
					<div class="login_input">
						<img src="{{ asset('assets/images/icon_lock.png') }}" alt="">
						<input type="password" class="login_control" placeholder="Password" name="password" value="{{ old('password') }}" required>
					</div>
					@isset($errors)
		             <div class="reg_form_err">
		                <ul>
		                    @foreach ($errors->all() as $error)
		                        <li class="alert alert-danger single_err">{{ $error }}</li>
		                    @endforeach
		                </ul>
		             </div>
		            @endisset
					<div class="login_input text-center">
						<input class="btn btn_pink" type="submit" value="Login" />
						<a class="forgot_pass" href="#">Forgot Password</a>
					</div>
				</form>
				 
			</div>
</div>
@endsection
