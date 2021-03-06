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
                    <h2>Message</h2>
                </div>
            </div>
        </div>
        <div class="message">
            <div class="message_left">
                <div class="message_serch">
                    <input type="text" placeholder="search" name="">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <div class="message_right">
                <div class="messagebox">

                </div>
                <div class="messagetype">
                    <div class="message_text">
                        <input type="text" class="message_in_text" name="">
                        <button class="btn"><img src="{{asset('assets/images/send_icon.png')}}" alt=""></button>
                    </div>
                    @php
                    $image = auth()->user()->image;
                    @endphp
                    <img class="avtar" src="{{!empty($image)?route('dashboard.media.image.default',['client_profile',$image]):asset('assets/images/avat.png')}}" align="">
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
@section('jquery_content')

@endsection
