@extends('layouts.app')
@section('title', 'Signup')
@section('content')
    <div class="model_bg">
			<a href="{{ url('/') }}">
				<img src="{{ asset('assets/images/close_btn.png') }}" class="closebtn">
			</a>
			<div class="logo">
				<a href="#">
					<img src="{{ asset('assets/images/logo.png') }}" alt="">
				</a>
			</div>
			<div class="title">
				<h3>You are</h3>
			</div>
			<div class="model_list">
				<ul>
					<li>
						<a href="javascript:void(0)" onclick="changeUrl('{{ url('/model-signup') }}')">
							<div class="model_img">
								<img src="{{ asset('assets/images/model1.png') }}" alt="">
							</div>
							<p>A MODEL</p>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)"  onclick="changeUrl('{{ url('/user-signup') }}')">
							<div class="model_img">
								<img src="{{ asset('assets/images/model2.png') }}" alt="">
							</div>
							<p>LOOKING FOR MODEL</p>
						</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="model_btn">
				<a href="{{ url('') }}" class="btn btn_pink done_btn">Done</a>
			</div>
		</div>

@endsection
@section('jquery_content')
<script type="text/javascript">
function changeUrl(link) {
  $('.done_btn').attr('href', link);
}

</script>
@endsection
