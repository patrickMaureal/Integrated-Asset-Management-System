<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>Rice Program</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('bannerPrograms') }}">Banner Program</a></li>
				<li class="breadcrumb-item"><a href="{{ route('rices.index') }}">Rice Program</a></li>
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
						<form class="row g-3" method="POST" action="{{ route('rices.update', $rice) }}">
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
										name="farmer_barangay" aria-label="Farmer barangays" data-live-search="true" title="Choose Barangay" required>
										@foreach (config('constants.barangays') as $barangays)
										<option value="{{ $barangays }}" {{ old('barangays')|| $rice->farmer_barangay==$barangays ? 'selected' : '' }}>
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
									<textarea class="form-control" placeholder="Details Here..." name="farm_details" id="floatingTextarea" style="height: 100px;">{{ $rice->farm_details }}</textarea>
									<label for="floatingTextarea">Farm Details</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('rice_type') is-invalid @enderror" id="rice_type"
										name="rice_type" aria-label="Rice Type" data-live-search="true" title="Choose Rice Type" required>
										@foreach (config('constants.rice_types') as $rice_type)
										<option value="{{ $rice_type }}" {{ old('rice_type')|| $rice->rice_type==$rice_type ? 'selected' : '' }}>
											{{ $rice_type }}
										</option>
										@endforeach
									</select>
									@error('rice_type')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Rice Type</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<input type="number" class="form-control @error('hectares_field') is-invalid @enderror" id="hectares_field" name="hectares_field" placeholder="Hectares of Field" min="1" value="{{ $rice->hectares_field }}">
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
										<option value="{{ $currentOrganicType }}" {{ old('organic_type')|| $rice->organic_type==$currentOrganicType ? 'selected' : '' }}>
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

							<x-insurance.status-update :insuranceStatus="$insuranceStatus" />

							<div class="text-start">
								<a href="{{ route('rices.index') }}" class="btn btn-secondary">Back</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form><!-- End Multi Columns Form -->

					</div>
				</div>
			</div>
		</div>
	</section>
</x-app-layout>
