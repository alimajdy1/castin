@extends('layouts.app')
@section('title', 'Home')
@section('content')
 <div class="homepage">
   <div class="container">
        <h1>Home page will goes Here.</h1>
        <div class="row">
          <div class="col-md-6">
            <div class="box_pan"><a href="{{ url('login') }}" class="login_pan">Login</a></div>
          </div>
          <div class="col-md-6">
            <div class="box_pan"><a href="{{ url('signup') }}" class="login_pan">Signup</a></div>
          </div>
        </div>
   </div>
 </div>
@endsection
