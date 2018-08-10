@extends('layouts.app')
@section('title', 'Add Profile')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}">
    <style>
        .msg-style {
            width: 350px;
            display: block;
            margin: 0 auto;
        }
        .alert{
            font-size: 17px;
        }
        .error{
            font-size: 17px !important;
        }

    </style>
@endsection
@section('content')
    <div class="edit_profile">
        <a href="{{ route('login') }}">
            <img src="{{asset('assets/images/close_btn.png')}}" class="closebtn">
        </a>
        @if($errors->any())
            <div class="alert alert-danger msg-style">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible msg-style">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('message') }}
            </div>
        @endif
        <h2>Add profile</h2>
        <form method="post" id="modelProfileForm" action="{{ route('dashboard.model.profile.update') }}"
              enctype="multipart/form-data">
            <input type="hidden" name="type" value="edit_profile">
            {{csrf_field()}}
            @method('PATCH')
            <div class="profile_image">
                <div class="avatar-upload">
                    <label class="addPicture" for="imageUpload" style="display: {{empty($user->image)?'':'none'}}">
                        <img class="img-style"
                             src="{{asset('assets/images/plus.png')}}"
                             alt="">
                        PICTURE
                    </label>
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" name="img" accept=".png, .jpg, .jpeg"/>
                        <label class="edirPicture" for="imageUpload"
                               style="display: {{empty($user->image)?'':'inline-block'}}"></label>
                    </div>
                    <div class="avatar-preview">
                        @if(!empty($user->image))
                            <div id="imagePreview"
                                 style="background-image: url({{route('dashboard.media.image.default',['profile',$user->image])}})">
                            </div>
                        @else
                            <div id="imagePreview">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="gender">
                <label class="container_radio">Male
                    <input type="radio" name="gender"
                           value="0" {{( $user->utype=='user')?'checked':''}}>
                    <span class="checkmark"></span>
                </label>
                <label class="container_radio female">Female
                    <input type="radio" name="gender"
                           value="1" {{($user->utype=='model')?'checked':''}}>
                    <span class="checkmark"></span>
                </label>
                <div class="clearfix"></div>
            </div>
            <div class="location">
                <input type="text" class="form_control" placeholder="Location" id="location" value="{{$user->location}}"
                       name="location">
            </div>
            <div class="profile_attr">
                <div class="attr_left">
                    <div class="attr_outer">
                        <label>Height (120~220)</label>
                        <input type="text" max="220" min="120" name="height" class="attr_control"
                               value="{{$user->height}}"/>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Weight (40~140)</label>
                        <input type="text" max="140" min="40" class="attr_control" name="weight"
                               value="{{$user->weight}}">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Bust/Chest (65~195)</label>
                        <input type="text" max="195" min="65" class="attr_control" name="chest"
                               value="{{$user->chest}}">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Hair Color</label>
                        <select class="attr_control" name="hair_color">
                            <option value="">Choose Option</option>
                            @foreach($hair_colors as $hair_color)
                                <option {{$user->hair_color==$hair_color->id?'selected':''}} value="{{$hair_color->id}}">{{$hair_color->name}}</option>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Hair Style</label>
                        <select class="attr_control" name="hair_style">
                            <option value="">Choose Option</option>
                            @foreach($hair_styles as $hair_style)
                                <option {{$user->hair_style==$hair_style->id?'selected':''}} value="{{$hair_style->id}}">{{$hair_style->name}}</option>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Eyes Color</label>
                        <select class="attr_control" name="eyes_color">
                            <option value="">Choose Option</option>
                            @foreach($eyes_colors as $eyes_color)
                                <option {{$user->eyes_color==$eyes_color->id?'selected':''}} value="{{$eyes_color->id}}">{{$eyes_color->name}}</option>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="attr_right">
                    <div class="attr_outer">
                        <label>Hips (78~135)</label>
                        <input type="text" max="135" min="78" class="attr_control" name="hips" value="{{$user->hips}}">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Size (35~51)</label>
                        <input type="text" max="51" min="35" class="attr_control" name="size" value="{{$user->size}}">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Waist (65~130)</label>
                        <input type="text" max="130" min="65" class="attr_control" name="waist"
                               value="{{$user->waist}}">
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Skin Color</label>
                        <select class="attr_control" name="skin_color">
                            <option value="">Choose Option</option>
                            @foreach($skin_colors as $skin_color)
                                <option  {{$user->skin_color==$skin_color->id?'selected':''}} value="{{$skin_color->id}}">{{$skin_color->name}}</option>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Hair Cut</label>
                        <select class="attr_control" name="hair_cut">
                            <option value="">Choose Option</option>
                            @foreach($hair_cuts as $hair_cut)
                                <option {{$user->hair_cut==$hair_cut->id?'selected':''}} value="{{$hair_cut->id}}">{{$hair_cut->name}}</option>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Tattoo</label>
                        <select class="attr_control" name="tattoo">
                            <option value="">Choose Option</option>
                            <option value="1" {{$user->tattoo==1?'selected':''}}>Yes</option>
                            <option value="0" {{$user->tattoo==0?'selected':''}}>No</option>
                        </select>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="photo_list">
                <div class="images">
                    @if(isset($user->images))
                        @foreach($user->images as $image)
                            <div class="img"
                                 style="background-image: url({{route('dashboard.media.image.default',['profile_images',$image->name])}})">
                                <span data-name="{{$image->name}}" class="remove-btn delete">Remove</span>
                            </div>
                        @endforeach
                    @endif
                    <div class="pic">
                        <div>
                            <img class="add-image" src="{{asset('assets/images/plus.png')}}" alt="">
                            PICTURE
                        </div>
                    </div>
                </div>
            </div>
            <div class="form_input text-center">
                <button class="btn btn_pink" type="submit">Done</button>
            </div>
        </form>
    </div>
    <div id="uploadModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">
                    </div>
                    <div id='content' class="tab-content">
                        <form action="{{route('dashboard.model.profile.upload')}}" class="dropzone" id="imageUpload">
                            {{ csrf_field() }}
                            <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                            <div class="fallback">
                                <input name="file" type="file" multiple/>
                            </div>
                        </form>
                        <div class="row" id="prevUploaded">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jquery_content')
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=en"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        $(".dropzone").dropzone({
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            maxFiles: 6,
            init: function () {
                this.on("success", function (file, res) {
                    if (res.status) {
                        var last_img = $(".images .img:last ");
                        if (last_img.length > 0) {
                            last_img.after(res.view);
                        } else {
                            $('.pic').parent().prepend(res.view);
                        }
                    } else {
                        $('.modal-body').prepend('<div class="alert alert-danger drop-alert">You can not upload more than 6 images</div>');

                        setTimeout(function () {
                            $('.drop-alert').fadeOut();
                        }, 300);
                    }
                });
                this.on("complete", function (res) {
                    this.removeFile(res);
                });
            }
        });
        $(document).on('click', '.delete', function () {
            var _this = $(this);
            var name = _this.data('name');
            $.ajax({
                        method: "POST",
                        url: "/dashboard/media/image/" + name + "/remove",
                        data: {name: name, '_token': '{{csrf_token()}}'}
                    })
                    .done(function (data) {
                        _this.parent().remove();
                    });
        });
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);
        $(document).on('click', '.images .pic', function (e) {
            $("#uploadModal").modal('show');
        });


        $('#modelProfileForm').validate({
            rules: {
                gender: "required",
                location: "required",
                height: {
                    required: true,
                    range: [120, 220]
                },
                weight: {
                    required: true,
                    range: [40, 140]
                },
                chest: {
                    required: true,
                    range: [65, 195]
                },
                hair_color: "required",
                hair_style: "required",
                eyes_color: "required",
                hips: {
                    required: true,
                    range: [78, 135]
                },
                size: {
                    required: true,
                    range: [35, 51]
                },
                waist: {
                    required: true,
                    range: [65, 130]
                },
                skin_color: "required",
                hair_cut: "required",
                tattoo: "required"

            },
            errorPlacement: function (error, element) {
                var elem = $(element);
                if (elem.hasClass("select")) {
                    error.appendTo(element.parent());
                } else {
                    error.insertAfter(element);
                }
                error.css('color', 'red');
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    </script>

@endsection
