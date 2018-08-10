@extends('layouts.app')
@section('title', 'Edit Profile')
@section('style')
    <style>
        .images{
            width: 610px;
            margin: 0 auto;
        }
        .img{
            margin-bottom: 75px !important;
        }
        .attr_outer label{
            width: 122px !important;
        }
    </style>
@endsection
@section('content')
    <div class="profile">
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
            </div>
            <div class="user_info">
                <div class="user_img">
                    <img src="{{route('dashboard.media.image.default',['profile',$user->image])}}" alt="">
                </div>
                <div class="username">
                    <h3>{{$user->name}}</h3>
                    <a href="{{route('dashboard.model.profile.edit')}}"><img src="{{asset('assets/images/icon_setting.png')}}" alt=""></a>
                </div>
                <div class="user_location">
                    <i class="fa fa-map-marker"></i>
                    <span>{{$user->location}}</span>
                </div>
                <div class="rating_img">
                    <img src="{{asset('assets/images/stars.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="user_more_info">
            @if(isset($user->images))
            <div class="upload_imges">
                <div class="images">
                    @foreach($user->images as $index=>$image)
                    <div class="img" style="background-image: url({{route('dashboard.media.image.default',['profile_images',$image->name])}});"></div>
                    @endforeach
                    {{--<div class="img" style="background-image: url({{asset('assets/images/upload_01.png')}});"></div>--}}
                    {{--<div class="img" style="background-image: url({{asset('assets/images/upload_02.png')}});"></div>--}}
                    {{--<div class="img" style="background-image: url({{asset('assets/images/upload_03.png')}})"></div>--}}
                </div>
            </div>
            @endif
            <div class="profile_attr">
                <div class="attr_left">
                    <div class="attr_outer">
                        <label>Height</label>
                        <input type="text" readonly="readonly" value="{{$user->height}} cm" class="attr_control"/>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Weight</label>
                        <input type="text" readonly="readonly" value="{{$user->weight}} kg" class="attr_control" name="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Bust/Chest</label>
                        <input type="text" readonly="readonly" value="{{$user->chest}} cm" class="attr_control" name="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Hair Color</label>
                        <input type="text" readonly="readonly" value="{{$user->hair_color}}" class="attr_control" name="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Hair Style</label>
                        <input type="text" readonly="readonly" value="{{$user->hair_style}}" class="attr_control"/>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Eyes Color</label>
                        <input type="text" readonly="readonly" value="{{$user->eyes_color}}" class="attr_control"/>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="attr_right">
                    <div class="attr_outer">
                        <label>Hips</label>
                        <input type="text" value="{{$user->hips}} cm" readonly="readonly" class="attr_control" name="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Size</label>
                        <input type="text" value="{{$user->size}}" readonly="readonly" class="attr_control" name="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Waist</label>
                        <input type="text" value="{{$user->waist}} cm" readonly="readonly" class="attr_control" name="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Skin Color</label>
                        <input type="text" value="{{$user->skin_color}}" readonly="readonly" class="attr_control" name="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Hair Cut</label>
                        <input type="text" value="{{$user->hair_cut}}" readonly="readonly" class="attr_control" name="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Tattoo</label>
                        <input type="text" value="{{$user->tattoo==1?'Yes':'No'}}" readonly="readonly" class="attr_control" name="">
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
@section('jquery_content')
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=en"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>
@endsection
