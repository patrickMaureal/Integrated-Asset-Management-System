<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>livestocks Program</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('bannerPrograms') }}">Banner Program</a></li>
				<li class="breadcrumb-item"><a href="{{ route('livestocks.index') }}">livestocks Program</a></li>
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
						<form class="row g-3" method="POST" action="{{ route('livestocks.update', $livestock) }}">
							@csrf
							@method('PUT')

							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('farmer_name') is-invalid @enderror" id="farmer_name"
										name="farmer_name" aria-label="farmer_name" data-live-search="true" title="Select Farmer" disabled>
											<option value="{{ $livestock->farmer_name }}">{{ $selectedFarmerName }}</option>
									</select>
									<label for="floatingSelect">Farmer Name</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('farmer_barangay') is-invalid @enderror" id="farmer_barangay"
										name="farmer_barangay" aria-label="Farmer Barangays" data-live-search="true" title="Choose Barangay" required>
										@foreach (config('constants.barangays') as $barangays)
										<option value="{{ $barangays }}" {{ old('barangays')|| $livestock->farmer_barangay==$barangays ? 'selected' : '' }}>
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
									<select class="form-select" id="livestock_species" aria-label="livestock_species" name="livestock_species" required>
										@foreach (config('constants.livestock_species') as $livestock_species)
										<option value="{{ $livestock_species }}" {{ old('livestock_species')|| $livestock->livestock_species==$livestock_species ? 'selected' : '' }}>
											{{ $livestock_species }}
										</option>
										@endforeach
									</select>
									<label for="floatingSelect">Livestock Species</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<input type="number" class="form-control @error('livestock_number') is-invalid @enderror" id="livestock_number" name="livestock_number" placeholder="Livestock Number" value="{{ old('livestock_number', $livestock->livestock_number) }}">
									<label for="floatingTextarea">Livestock Number</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="Livestock Age" value="{{ old('age', $livestock->age) }}">
									<label for="floatingTextarea">Livestock Age(mos)</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" placeholder="Livestock Species" value="{{ old('color', $livestock->color) }}">
									<label for="floatingTextarea">Livestock Color</label>
								</div>
							</div>

							<x-insurance.status-update :insuranceStatus="$insuranceStatus" />

							<div class="text-start">
								<a href="{{ route('livestocks.index') }}" class="btn btn-secondary">Back</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form><!-- End Multi Columns Form -->

					</div>
				</div>
			</div>
		</div>
	</section>
</x-app-layout>
