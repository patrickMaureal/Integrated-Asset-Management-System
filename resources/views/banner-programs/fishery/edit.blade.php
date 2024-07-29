<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>Fisheries Program</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('bannerPrograms') }}">Banner Program</a></li>
				<li class="breadcrumb-item"><a href="{{ route('fisheries.index') }}">Fisheries Program</a></li>
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
						<form class="row g-3" method="POST" action="{{ route('fisheries.update', $fishery) }}">
							@csrf
							@method('PUT')

							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('fisher_name') is-invalid @enderror" id="fisherman_name"
										name="fisherman_name" aria-label="fisherman_name" data-live-search="true" title="Select Fishermen" disabled>
										<option value="{{ $selectedFishermanName }}" >{{ $selectedFishermanName }}</option>
									</select>
									<label for="floatingSelect">Fisherman Name</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('fisherman_barangay') is-invalid @enderror" id="fisherman_barangay"
										name="fisherman_barangay" aria-label="Farmer Barangays" data-live-search="true" title="Choose Barangay" required>
										@foreach (config('constants.barangays') as $barangays)
										<option value="{{ $barangays }}" {{ old('barangays')|| $fishery->fisherman_barangay==$barangays ? 'selected' : '' }}>
											{{ $barangays }}
										</option>
										@endforeach
									</select>
									@error('fisherman_barangay')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Barangays</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<textarea class="form-control" placeholder="Details Here..." name="fishing_activities" id="floatingTextarea" style="height: 100px;">{{ $fishery->fishing_activities }}</textarea>
									<label for="floatingTextarea">Fishing Activities</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<textarea class="form-control" placeholder="Details Here..." name="aquaculture_details" id="floatingTextarea" style="height: 100px;">{{ $fishery->aquaculture_details }}</textarea>
									<label for="floatingTextarea">Aquaculture Details</label>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('form_of_fishing') is-invalid @enderror" id="form_of_fishing"
										name="form_of_fishing" aria-label="Farmer Barangays" data-live-search="true" title="Choose Fishing Form" required>
										@foreach (config('constants.form_of_fishing') as $currentFishingForm)
										<option value="{{ $currentFishingForm }}" {{ old('currentFishingForm')|| $fishery->form_of_fishing==$currentFishingForm ? 'selected' : '' }}>
											{{ $currentFishingForm }}
										</option>
										@endforeach
									</select>
									@error('form_of_fishing')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Form Of Fishing</label>
								</div>
							</div>

							<x-insurance.status-update :insuranceStatus="$insuranceStatus" />

							<div class="text-start">
								<a href="{{ route('fisheries.index') }}" class="btn btn-secondary">Back</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form><!-- End Multi Columns Form -->

					</div>
				</div>
			</div>
		</div>
	</section>
</x-app-layout>
