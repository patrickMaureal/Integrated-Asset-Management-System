<!-- ======= Header ======= -->
<header class="header fixed-top d-flex align-items-center" id="header">

	<div class="d-flex align-items-center justify-content-between">
			<a class="logo d-flex align-items-center" href="{{ route('dashboard') }}">
					<img src="{{ asset('img/logo/mao-logo.png') }}" alt="">
					<span class="d-none d-lg-block">Tuburan MAO</span>
			</a>
			<i class="bi bi-list toggle-sidebar-btn"></i>
	</div><!-- End Logo -->

	<nav class="header-nav ms-auto">
			<div class="nav-link nav-profile d-flex align-items-center pe-3">
					<img class="rounded-circle" src="{{ asset('img/logo/mao-logo.png') }}" alt="Profile">
					<span class="d-none d-md-block ps-2">{{ auth()->user()->name }}</span>
			</div><!-- End Profile Iamge Icon -->
	</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

@push('scripts')
	<script type="text/javascript" src="{{ asset('js/page/navbar/index.js') }}"></script>
@endpush
