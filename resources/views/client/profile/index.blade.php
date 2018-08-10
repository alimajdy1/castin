@extends('layouts.app')
@section('title', 'Add Profile')
@section('style')
@endsection
@section('content')
    <div class="profile clientprofile">
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
            </div>
            <div class="user_info">
                <div class="profile_image">
                    <div class="avatar-upload">
                        <label class="addPicture" for="imageUpload" style="display: {{empty(auth()->user()->image)?'':'none'}}">
                            <img src="{{asset('assets/images/plus.png')}}" alt="">
                            PICTURE
                        </label>
                        <div class="avatar-edit">
                            <form id="profileImage" action="post" enctype="multipart/form-data">
                            <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg"/>
                            <label class="edirPicture" for="imageUpload"  style="display: {{empty(auth()->user()->image)?'':'inline-block'}}"></label>
                            </form>
                        </div>
                        <div class="avatar-preview">
                            @if(!empty(auth()->user()->image))
                                <div id="imagePreview"
                                     style="background-image: url({{route('dashboard.media.image.default',['client_profile',auth()->user()->image])}})">
                                </div>
                                @else
                                <div id="imagePreview">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="username">
                    <h3>{{auth()->user()->name}}</h3>
                    <a class="delete_profile" href="#">
                        <img src="{{asset('assets/images/delete_icon.png')}}" alt="">
                    </a>
                    <div class="delete_overlay"></div>
                    <div class="delete_box">
                        <div class="box-header">
                            <i><img src="{{asset('assets/images/close_btn.png')}}" alt=""></i>
                            <h3>Do you want to delete <br> your profile ?</h3>
                        </div>
                        <div class="box-body">
                            <a  class="yes btn delete_btn">Yes</a>
                            <a href="javascript:void(0)" class="no btn">No</a>
                        </div>
                        <div class="box-footer">
                            <img src="{{asset('assets/images/delete_button.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="user_location">
                    <i class="fa fa-map-marker"></i>
                    <span>{{auth()->user()->location}}</span>
                </div>
                <div class="rating_img">
                    <img src="{{asset('assets/images/stars.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="client_job_list">
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
                        <a href="{{route('dashboard.client.job.edit',$job->id)}}">
                            <img src="{{asset('assets/images/icon_setting_black.png')}}" alt="">
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </li>
              @endforeach
            </ul>
            <div class="login_input text-center">
                <a class="btn btn_pink" href="{{route('dashboard.client.job.create')}}">Add a new job</a>
            </div>
        </div>
    </div>
@endsection
@section('jquery_content')
    <script>
        // upload image and serialize form data



        document.getElementById("imageUpload").onchange = function() {
        var formData = new FormData($("#profileImage")[0]);
        $.ajax({
            url: "{{route('dashboard.client.profile.upload')}}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (data, textStatus, jqXHR) {
//                if(data.status) {
//                    $('#user_profile').prepend('<div class="alert alert-success"></div>')
//                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#spinMe').addClass('hidden');
            }
        });
        };
    </script>
    <script>
        var isClick = 0;
        $(document).on('click', '.delete_btn', function () {
            if (!isClick) {
                isClick = 1;
                $.ajax({
                            type: "DELETE",
                            url: "{{route('dashboard.client.profile.destroy',$job->id)}}",
                            data: {'_token': '{{csrf_token()}}'}
                        })
                        .done(function (data) {
                            window.location.href = "{{route('logout')}}";
                        });
            }

        });
    </script>
@endsection
