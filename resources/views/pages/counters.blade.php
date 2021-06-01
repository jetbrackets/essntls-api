@extends('layouts-verticalmenu-light.master')
@section('css')
@endsection
@section('content')

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Counters</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Advanced UI</a></li>
									<li class="breadcrumb-item active" aria-current="page">Counters</li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
									  <i class="fe fe-download mr-2"></i> Import
									</button>
									<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
									  <i class="fe fe-filter mr-2"></i> Filter
									</button>
									<button type="button" class="btn btn-primary my-2 btn-icon-text">
									  <i class="fe fe-download-cloud mr-2"></i> Download Report
									</button>
								</div>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-sm-12 col-md-4">
								<div class="card custom-card">
									<div class="card-body text-center">
										<h2 class="counter number-font mb-0">2569</h2>
										<div>
											<h6 class="main-content-label mg-t-10">Numbers counter</h6>
											<div class="text-muted mt-3 tx-13">To take a trivial example, which of us ever undertakes laborious physical exerciser , except to obtain some advantage from it...</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<div class="card custom-card">
									<div class="card-body text-center">
										<h2 class="counter number-font mb-0">2,56989.32</h2>
										<div>
											<h6 class="main-content-label mg-t-10">Floating counter</h6>
											<div class="text-muted mt-3 tx-13">To take a trivial example, which of us ever undertakes laborious physical exerciser , except to obtain some advantage from it...</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<div class="card custom-card">
									<div class="card-body text-center">
										<h2 class="counter number-font mb-0">0.8998</h2>
										<div>
											<h6 class="main-content-label mg-t-10">Numbers counter</h6>
											<div class="text-muted mt-3 tx-13">To take a trivial example, which of us ever undertakes laborious physical exerciser , except to obtain some advantage from it...</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-sm-12 col-md-4">
								<div class="card custom-card overflow-hidden">
									<a href="#" class="ht-100p"><img class="card-img-top  " src="{{URL::asset('assets/img/media/18.jpg')}}" alt="img"></a>
									<div class="card-body d-flex flex-column">
										<label class="main-content-label mb-2">Time Counting From 0</label>
										<div class="text-muted">To take a trivial example, which of us ever undertakes laborious physical exerciser , except to obtain some advantage from it...</div>
										<div class="bg-primary p-3 rounded-5 mt-4 text-center">
											<span id="timer-countup" class="h5 text-white mb-0"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<div class="card custom-card overflow-hidden">
									<a href="#" class="ht-100p"><img class="card-img-top  " src="{{URL::asset('assets/img/media/14.jpg')}}" alt="img"></a>
									<div class="card-body d-flex flex-column">
										<label class="main-content-label mb-2">Time Counting From 0</label>
										<div class="text-muted">To take a trivial example, which of us ever undertakes laborious physical exerciser , except to obtain some advantage from it...</div>
										<div class="bg-danger p-3 rounded-5 mt-4 text-center">
											<span id="timer-countinbetween" class="h4 mb-0 text-white"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<div class="card custom-card overflow-hidden">
									<a href="#" class="ht-100p"><img class="card-img-top  " src="{{URL::asset('assets/img/media/16.jpg')}}" alt="img"></a>
									<div class="card-body d-flex flex-column">
										<label class="main-content-label mb-2">Time Counting From 0</label>
										<div class="text-muted">To take a trivial example, which of us ever undertakes laborious physical exerciser , except to obtain some advantage from it...</div>
										<div class="bg-success p-3 rounded-5 mt-4 text-center">
											<span id="timer-countercallback" class="h4 mb-0 text-white"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-sm-12 col-md-12">
								<div class="card bg-info text-white custom-card">
									<div class="card-body text-center">
										<div class="row row-sm">
											<div class="col-sm-12 col-md-12">
												<div class="">
													<span id="timer-outputpattern" class="my-auto h4"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

@endsection
@section('script')
		<!-- Internal Check-all-mail js-->
		<script src="{{URL::asset('assets/js/check-all-mail.js')}}"></script>

		<!-- Internal Counter js-->
		<script src="{{URL::asset('assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/counters/waypoints.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/counters/counter.js')}}"></script>
@endsection