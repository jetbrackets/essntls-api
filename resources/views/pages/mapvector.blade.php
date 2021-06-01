@extends('layouts-verticalmenu-light.master')
@section('css')
		<!-- Internal Jqvmp css-->
		<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('content')

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Vector Maps</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Maps & Tables</a></li>
									<li class="breadcrumb-item active" aria-current="page">Vector Maps</li>
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
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<div>
											<h6 class="main-content-label mb-1">Vector Map: World</h6>
											<p class="text-muted card-sub-title">Below is an example of displaying the world map.</p>
										</div>
										<div class="ht-300 ht-lg-400" id="vmap"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-6">
								<div class="card custom-card">
									<div class="card-body">
										<div>
											<h6 class="main-content-label mb-1">Vector Map: Canada</h6>
											<p class="text-muted card-sub-title">Below is an example of displaying the canada map.</p>
										</div>
										<div class="ht-300" id="vmap3"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="card custom-card">
									<div class="card-body">
										<div>
											<h6 class="main-content-label mb-1">Vector Map: USA</h6>
											<p class="text-muted card-sub-title">Below is an example of displaying the usa map.</p>
										</div>
										<div class="ht-300" id="vmap2"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

@endsection
@section('script')
		<!-- Internal Jqvmap js-->
		<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.canada.js')}}"></script>
		<script src="{{URL::asset('assets/js/vector-map.js')}}"></script>
		<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection