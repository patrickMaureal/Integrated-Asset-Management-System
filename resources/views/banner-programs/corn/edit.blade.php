<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>Corn Program</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('bannerPrograms') }}">Banner Program</a></li>
				<li class="breadcrumb-item"><a href="{{ route('corns.index') }}">Corn Program</a></li>
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
						<form class="row g-3" method="POST" action="{{ route('corns.update', $corn) }}">
							@csrf
							@method('PUT')

							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('farmer_name') is-invalid @enderror" id="farmer_name"
										name="farmer_name" aria-label="farmer_name" data-live-search="true" title="Select Farmer" disabled>
										<option value="{{ $selectedFarmerName }}">{{ $selectedFarmerName }}</option>
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
										<option value="{{ $barangays }}" {{ old('barangays')|| $corn->farmer_barangay==$barangays ? 'selected' : '' }}>
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
									<select class="form-control @error('corn_type') is-invalid @enderror" id="corn_type"
										name="corn_type" aria-label="Corn Type" data-live-search="true" title="Choose Corn Type" required>
										@foreach (config('constants.corn_types') as $currentCornType)
										<option value="{{ $currentCornType }}" {{ old('currentCornType')|| $corn->corn_type==$currentCornType ? 'selected' : '' }}>
											{{ $currentCornType }}
										</option>
										@endforeach
									</select>
									@error('corn_type')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Corn Type</label>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-floating mb-3">
									<textarea class="form-control" placeholder="Details Here..." name="farm_details" id="floatingTextarea" style="height: 100px;">{{ $corn->farm_details }}</textarea>
									<label for="floatingTextarea">Farm Details</label>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-floating mb-3">
									<input type="number" class="form-control @error('hectares_field') is-invalid @enderror" id="hectares_field" name="hectares_field" placeholder="Hectares of Field" min="1" value="{{ $corn->hectares_field }}">
									@error('hectares_field')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingInput">Hectares of Field in (ha)</label>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('organic_type') is-invalid @enderror" id="organic_type"
										name="organic_type" aria-label="Organic Type" data-live-search="true" title="Choose Organic Type" required>
										@foreach (['Organic', 'Inorganic'] as $currentOrganicType)
										<option value="{{ $currentOrganicType }}" {{ old('organic_type')|| $corn->organic_type==$currentOrganicType ? 'selected' : '' }}>
											{{ $currentOrganicType }}
										</option>
										@endforeach
									</select>
									@error('organic_type')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Organic Type</label>
								</div>
							</div>

							{{-- Component for Insurance Application Edit Status --}}
							<x-insurance.status-update :insuranceStatus="$insuranceStatus" />

							<div class="text-start">
								<a href="{{ route('corns.index') }}" class="btn btn-secondary">Back</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form><!-- End Multi Columns Form -->

					</div>
				</div>
			</div>
		</div>
	</section>
</x-app-layout>
