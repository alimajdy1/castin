@extends('layouts.app')
@section('title', 'Messages')
@section('style')
@endsection
@section('content')
    <div class="job clientprofile">
        <div class="user_profile">
            <div class="profile_top_header">
                <ul>
                    <li>
                        <a href="{{route('dashboard.client.job.search')}}">
                            <span>Reserch</span>
                            <img src="{{asset('assets/images/icon_search.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.client.message.index')}}">
                            <span>Message</span>
                            <img src="{{asset('assets/images/icon_mssage.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.client.profile.index')}}">
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
                    <h2>Research</h2>
                </div>
            </div>
        </div>
        <div class="client_job_list reserch_job_list">
            <h3 class="text-center">Choose the job and get access to all the models matching with what you expect </h3>
            <ul>
                @foreach(auth()->user()->jobs as $job)
                    <li>
                        <div class="job_name">
                            <p>{{$job->title}}</p>
                        </div>
                        <div class="job_description">
                            <p>{{$job->description}}</p>
                        </div>
                        <div class="job_country">
                            <p>{{$job->location}}</p>
                        </div>
                        <div class="job_date">
                            <p>{{$job->need_date}}</p>
                        </div>
                        <div class="job_price">
                            <p>{{$job->remuneration}} $</p>
                        </div>
                        <div class="job_edit">
                            <a href="#">
                                <img src="{{asset('assets/images/icon_search_pink.png')}}" alt="">
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                @endforeach


            </ul>
        </div>
    </div>
@endsection
@section('jquery_content')

@endsection
