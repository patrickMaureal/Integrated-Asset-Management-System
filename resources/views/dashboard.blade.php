<x-app-layout>

	<div class="pagetitle mb-4">
		<h1>Dashboard</h1>
	</div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">
			<div class="col-md-12">
				<div class="row">

					<!-- Sales Card -->
					<div class="col-md-3">
						<div class="card info-card sales-card">
							<div class="card-body">
								<h5 class="card-title">Total Farmers</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-person"></i>
									</div>
									<div class="ps-3">
										<h6 class="fw-bold">{{ $totalFarmers }}</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End Total Banner Programs Card -->

					<div class="col-md-3">
						<div class="card info-card customers-card">
							<div class="card-body">
								<h5 class="card-title">Total Banner Programs</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-list"></i>
									</div>
									<div class="ps-3">
										<h6 class="fw-bold">6</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End Total Banner Programs Card -->

					<div class="col-md-3">
						<div class="card info-card revenue-card">
							<div class="card-body">
								<h5 class="card-title">Number of Barangays</h5>



								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-houses"></i>
									</div>
									<div class="ps-3">
										<h6 class="fw-bold">54</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End number of Barangays Card -->
					<div class="col-md-3">
						<div class="card info-card customers-card">
							<div class="card-body">
								<h5 class="card-title">Insurance Application/Renewal</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-journal-text"></i>
									</div>
									<div class="ps-3">
										<h6 class="fw-bold">{{ $totalInsurance }}</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End Insurance Card -->

				</div>
			</div>
			<div class="col-md-12">
				<div class="card border-0 shadow mb-5">
					<div class="card-body p-2">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group mb-2">
								<label for="yearFilter">Select Year:</label>
								<select class="form-select fmxw-200 d-md-inline" id="yearFilter">
									@foreach($years as $year)
										<option value="{{ $year }}">{{ $year }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

						<h5 class="card-title">Number of Farmers per Barangay</h5>

						<div class="chart-container">
							<canvas id="farmer-chart"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@push('styles')
		<link rel="stylesheet" type="text/css" href="{{ asset('css/theme/admin/dashboard/index.css') }}">
	@endpush
	@push('scripts')
		<script type="text/javascript" src="{{ asset('js/page/dashboard/farmer.js') }}"></script>
	@endpush
</x-app-layout>
