<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Integrated Asset Management System</title>

		<link href="{{ asset('img/favicon.ico') }}" rel="icon">
		<link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

		<link href="https://fonts.gstatic.com" rel="preconnect">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

		{{-- CSS --}}
		<link type="text/css" href="{{ asset('css/theme/admin/style.css') }}" rel="stylesheet">
		<link type="text/css" href="{{ asset('css/theme/guest/custom.css') }}" rel="stylesheet">


		{{-- Bootstrap --}}
		<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">


	</head>

	<body>
		<main class="py-4">
			<div class="container-fluid">
				<section class="section min-vh-100 py-4 d-flex flex-column align-center justify-content-center">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
							<img src="{{ asset('img/logo/mao-logo.png') }}" alt="">
							<h1 class="text-center mb-5 fw-bold">Integrated Asset Management System</h1>

							@if (Route::has('login'))
								@auth
									<h4 class="text-center">You are currently logged in!</h4>
									<a href="{{ url('/dashboard') }}" class="btn btn-info w-25">Dashboard</a>
								@else
									<a href="{{ route('login') }}" class="btn btn-success w-25">Login</a>
								@endauth
							@endif
						</div>
					</div>
				</section>
			</div>
		</main>

		<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

		<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	</body>

</html>
