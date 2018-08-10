@extends('layouts.app')
@section('title', 'Edit Casting')
@section('style')
    <link href="{{asset('assets/css/bootstrap-datetimepicker.css')}}" type="text/css" rel="stylesheet">
    <style>
        .attr_outer label {
            width: 122px !important;
        }
    </style>
@endsection
@section('content')
    <div class="edit_profile edit_casting">
        @if(auth()->user()->jobs()->count()>0)
            <a href="{{ route('dashboard.client.profile.index') }}">
                <img src="{{asset('assets/images/close_btn.png')}}" class="closebtn">
            </a>
        @else
            <a href="{{ route('login') }}">
                <img src="{{asset('assets/images/close_btn.png')}}" class="closebtn">
            </a>
        @endif

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
        <div class="edit_profile_hed">
            <h2>Edit casting</h2>
        </div>
        <form method="post" id="jobForm" action="{{ route('dashboard.client.job.store') }}">
            {{csrf_field()}}
            <h5 class="text-center looking">Looking for</h5>
            <div class="gender">
                <label class="container_radio">Male
                    <input type="radio" name="gender" value="0" >
                    <span class="checkmark"></span>
                </label>
                <label class="container_radio female">Female
                    <input type="radio" name="gender" value="1" checked="checked">
                    <span class="checkmark"></span>
                </label>
                <div class="clearfix"></div>
            </div>
            <div class="rangeList">
                <div class="range_group">
                    <label>Height</label>
                    <div class="range_inner">
                        <p class="mimValue">120</p>
                        <div class="range_slider">
                            <input type="range" id="height">
                            <input type="hidden" id="real_height" name="height">
                        </div>
                        <p class="maxValue">220</p>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="range_group">
                    <label>Weight</label>
                    <div class="range_inner">
                        <p class="mimValue">40</p>
                        <div class="range_slider">
                            <input type="range" id="weight">
                            <input type="hidden" id="real_weight" name="weight">
                        </div>

                        <p class="maxValue">140</p>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="range_group">
                    <label>Bust/Chest</label>
                    <div class="range_inner">
                        <p class="mimValue">65</p>
                        <div class="range_slider">
                            <input type="range" id="bust">
                            <input type="hidden" id="real_chest" name="chest">
                        </div>
                        <p class="maxValue">195</p>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="range_group">
                    <label>Waist</label>
                    <div class="range_inner">
                        <p class="mimValue">65</p>
                        <div class="range_slider">
                            <input type="range" id="waist" name="waist">
                            <input type="hidden" id="real_waist" name="waist">
                        </div>
                        <p class="maxValue">130</p>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="range_group">
                    <label>Hips</label>
                    <div class="range_inner">
                        <p class="mimValue">78</p>
                        <div class="range_slider">
                            <input type="range" id="hips" name="hips">
                            <input type="hidden" id="real_hips" name="hips">
                        </div>
                        <p class="maxValue">135</p>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="range_group">
                    <label>Size</label>
                    <div class="range_inner">
                        <p class="mimValue">35</p>
                        <div class="range_slider">
                            <input type="range" id="size" name="size">
                            <input type="hidden" id="real_size" name="size">
                        </div>
                        <p class="maxValue">51</p>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="profile_attr">
                <div class="attr_left">
                    <div class="attr_outer">
                        <label>Hair Color</label>
                        <select class="attr_control" name="hair_color" required="required">
                            <option value="">Choose Option</option>
                            @foreach($hair_colors as $hair_color)
                                <option {{$user->hair_color==$hair_color->id?'selected':''}} value="{{$hair_color->id}}">{{$hair_color->name}}</option>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Hair Style</label>
                        <select class="attr_control" name="hair_style" required="required">
                            <option value="">Choose Option</option>
                            @foreach($hair_styles as $hair_style)
                                <option {{$user->hair_style==$hair_style->id?'selected':''}} value="{{$hair_style->id}}">{{$hair_style->name}}</option>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Eyes Color</label>
                        <select class="attr_control" name="eyes_color" required="required">
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
                        <label>Skin Color</label>
                        <select class="attr_control" name="skin_color" required="required">
                            <option value="">Choose Option</option>
                            @foreach($skin_colors as $skin_color)
                                <option {{$user->skin_color==$skin_color->id?'selected':''}} value="{{$skin_color->id}}">{{$skin_color->name}}</option>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Hair Cut</label>
                        <select class="attr_control" name="hair_cut" required="required">
                            <option value="">Choose Option</option>
                            @foreach($hair_cuts as $hair_cut)
                                <option {{$user->hair_cut==$hair_cut->id?'selected':''}} value="{{$hair_cut->id}}">{{$hair_cut->name}}</option>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="attr_outer">
                        <label>Tattoo</label>
                        <select class="attr_control" name="tattoo" required="required">
                            <option value="">Choose Option</option>
                            <option value="1" {{$user->tattoo==1?'selected':''}}>Yes</option>
                            <option value="0" {{$user->tattoo==0?'selected':''}}>No</option>
                        </select>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="edit_casting_more">
                <div class="form_input">
                    <input type="text" class="form_control" placeholder="Job title" name="title" required="required">
                </div>
                <div class="form_input">
                    <textarea class="form_control" placeholder="Job description" name="description" required="required"></textarea>
                </div>
                <div class="form_input">
                    <input type="text" class="form_control" id="location" placeholder="Location" name="location" required="required">
                </div>
                <div class="form_input">
                    <input required="required" class="form_date form_control datepicker" placeholder="Date" autocomplete="off"
                           name="need_date"
                           data-date-format="mm/dd/yyyy">
                </div>
                <div class="form_input">
                    <input type="text" class="form_control" placeholder="Remuneration" name="remuneration" required="required">
                </div>
            </div>
            <div class="form_input text-center">
                <button class="btn btn_pink" type="submit">Done</button>
            </div>
        </form>
    </div>
@endsection
@section('jquery_content')
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/ion.rangeSlider.js')}}" type="text/javascript"></script>
    <script type="text/javascript"
            src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>

    <script>
        var autocomplete = new google.maps.places.Autocomplete($("#location")[0], {});
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            console.log(place.address_components);
        });
        $('.form_date').datetimepicker({
            format: 'mm/dd/yyyy',
            minView: 2,
            maxView: 4,
            autoclose: true
        });
    </script>
    <script type="text/javascript">

        $("#height").ionRangeSlider({
            type: "double",
            min: 120,
            max: 220,
            from: 150,
            to: 200,
            onChange: function (item) {
                $('#real_height').val(item.from + "," + item.to);
            }
            , onStart: function (item) {
                $('#real_height').val(item.from + "," + item.to);
            }
        });
        $("#weight").ionRangeSlider({
            type: "double",
            min: 40,
            max: 140,
            from: 60,
            to: 100,
            onChange: function (item) {
                $('#real_weight').val(item.from + "," + item.to);
            }
            , onStart: function (item) {
                $('#real_weight').val(item.from + "," + item.to);
            }
        });
        $("#bust").ionRangeSlider({
            type: "double",
            min: 65,
            max: 195,
            from: 82,
            to: 150,
            onChange: function (item) {
                $('#real_chest').val(item.from + "," + item.to);
            },
            onStart: function (item) {
                $('#real_chest').val(item.from + "," + item.to);
            }

        });
        $("#waist").ionRangeSlider({
            type: "double",
            min: 65,
            max: 130,
            from: 80,
            to: 120,
            onChange: function (item) {
                $('#real_waist').val(item.from + "," + item.to);
            }
            , onStart: function (item) {
                $('#real_waist').val(item.from + "," + item.to);
            }
        });
        $("#hips").ionRangeSlider({
            type: "double",
            min: 78,
            max: 135,
            from: 84,
            to: 120,
            onChange: function (item) {
                $('#real_hips').val(item.from + "," + item.to);
            }
            , onStart: function (item) {
                $('#real_hips').val(item.from + "," + item.to);
            }
        });
        $("#size").ionRangeSlider({
            type: "double",
            min: 35,
            max: 51,
            from: 37,
            to: 45,
            onChange: function (item) {
                $('#real_size').val(item.from + "," + item.to);
            }
            , onStart: function (item) {
                $('#real_size').val(item.from + "," + item.to);
            }
        });
    </script>
    <script>
//        $('#jobForm').validate({
//            rules: {
//                gender: "required",
//                location: "required",
//                hair_color: "required",
//                hair_style: "required",
//                eyes_color: "required",
//                skin_color: "required",
//                hair_cut: "required",
//                tattoo: "required",
//                title: "required",
//                description: "required",
//                need_date: {
//                    required: true,
//                },
//                remuneration: {
//                    required: true,
//                    number: true
//                },
//
//            },
//            errorPlacement: function (error, element) {
//                var elem = $(element);
//                error.insertAfter(element);
//                error.css('color', 'red');
//            },
//            submitHandler: function (form) {
//                form.submit();
//            }
//        });

    </script>
@endsection
