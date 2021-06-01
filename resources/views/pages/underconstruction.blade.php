@extends('layouts-verticalmenu-light.master2')
@section('css')
		<!-- Internal Jquery.Coutdown css-->
		<link href="{{URL::asset('assets/plugins/jquery-countdown/jquery.countdown.css')}}" rel="stylesheet">
@endsection
@section('content')

		<!-- Page -->
		<div class="page main-signin-wrapper bg-primary construction">

			<div class="container ">
				<div class="construction1 text-center details text-white">
					<div class="">
						<img src="{{URL::asset('assets/img/brand/logo-light.png')}}" class="mb-5" alt="logo">
						<h4 class="text-center text-white tx-30 font-weight-bold ">We are Comming soon</h4>
						<p class="text-white-50 tx-15">We're making the system more awesome.we'll be back shortly.</p>
						<div id="launch_date"></div>
					</div>
					<div class="text-center">© 2020  <a href="https://www.spruko.com/" class="text-white-50">Spruko</a> All rights reserved.</div>
				</div>
			</div>

		</div>
		<!-- End Page -->

@endsection
@section('script')
		<!-- Internal Jquery.Coutdown js-->
		<script src="{{URL::asset('assets/plugins/jquery-countdown/jquery.plugin.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/jquery-countdown/jquery.countdown.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/jquery-countdown/countdown.js')}}"></script>
@endsection