<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>High Value Crop Program</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('bannerPrograms') }}">Banner Program</a></li>
				<li class="breadcrumb-item"><a href="{{ route('high-value-crops.index') }}">High Value Crop Program</a></li>
				<li class="breadcrumb-item active">Create</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Add Farmer</h5>

						<!-- Multi Columns Form -->
						<form class="row g-3" method="POST" action="{{ route('high-value-crops.store') }}">
							@csrf

							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('farmer_name') is-invalid @enderror" id="farmer_name"
										name="farmer_name" aria-label="farmer_name" data-live-search="true" title="Select Farmer" required>
										@forelse ($farmers as $farmer)
											<option value="{{ $farmer->id }}">
												{{ $farmer->name }}
											</option>
										@empty
											<option value="" selected disabled>No Farmer Found</option>
										@endforelse
									</select>
									@error('farmer_name')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Farmer Name</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('farmer_barangay') is-invalid @enderror" id="farmer_barangay"
										name="farmer_barangay" aria-label="Farmer Barangays" data-live-search="true" title="Choose Barangay" required>
										@foreach (config('constants.barangays') as $barangays)
										<option value="{{ $barangays }}">
											{{ $barangays }}
										</option>
										@endforeach
									</select>
									@error('farmer_barangay')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Barangays</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<textarea class="form-control" placeholder="Details Here..." name="crop_information" id="floatingTextarea" style="height: 100px;"></textarea>
									<label for="floatingTextarea">Crop Information</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('crop_type') is-invalid @enderror" id="crop_type"
										name="crop_type" aria-label="Farmer Barangays" data-live-search="true" title="Choose Crops" required>
										@foreach (config('constants.crop_types') as $crop_type)
										<option value="{{ $crop_type }}">
											{{ $crop_type }}
										</option>
										@endforeach
									</select>
									@error('crop_type')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Crop Type</label>
								</div>
							</div>

							<x-insurance.status />

							<div class="text-start">
								<a href="{{ route('high-value-crops.index') }}" class="btn btn-secondary">Back</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form><!-- End Multi Columns Form -->

					</div>
				</div>
			</div>
		</div>
	</section>
</x-app-layout>
