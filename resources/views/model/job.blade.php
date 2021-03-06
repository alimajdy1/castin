@extends('layouts.app')
@section('title', 'Edit Profile')
@section('style')

@endsection
@section('content')
    <div class="job">
        <div class="user_profile">
            <div class="profile_top_header">
                <ul>
                    <li>
                        <a href="{{route('dashboard.model.job.index')}}">
                            <span>Job</span>
                            <img src="{{asset('assets/images/icon_search.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.model.message.index')}}">
                            <span>Message</span>
                            <img src="{{asset('assets/images/icon_mssage.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.model.profile.show')}}">
                            <span>Profile</span>
                            <img src="{{asset('assets/images/icon_profile.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}">
                            <span>Log out</span>
                            <img src="{{asset('assets/images/icon_logout.png')}}" alt="">
                        </a>
                    </li>
                </ul>
                <div class="page_title">
                    <h2>Job</h2>
                </div>
            </div>
        </div>
        <div class="job_list">
            <div class="no_job">
                <p>No job yet</p>
            </div>
        </div>
    </div>
@endsection
@section('jquery_content')
@endsection
