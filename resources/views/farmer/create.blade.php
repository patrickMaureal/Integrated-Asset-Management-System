<x-app-layout>
	<div class="pagetitle mb-4">
		<h1>Farmer Profile</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('farmers.index') }}">Farmer</a></li>
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
						<form class="row g-3" method="POST" action="{{ route('farmers.store') }}">
							@csrf

							<div class="col-md-12">
								<label for="name" class="form-label">Name<x-asterisk/></label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
								@error('name')
                <x-input-error message="{{ $message }}" />
                @enderror
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-select" id="gender" aria-label="gender" name="gender" required>
										<option selected value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
									<label for="floatingSelect">Gender</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-select" id="banner_program" aria-label="banner_program" name="banner_program" required>
										<option selected value="Corn Program">Corn Program</option>
										<option value="Rice Program">Rice Program</option>
										<option value="High Value Crops Program">High Value Crops Program</option>
										<option value="Fisheries Program">Fisheries Program</option>
										<option value="Livestock Program">Livestock Program</option>
									</select>
									<label for="floatingSelect">Banner Program</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('barangays') is-invalid @enderror" id="barangays"
										name="barangays" aria-label="Barangays" data-live-search="true" title="Choose Barangays" required>
										@foreach (config('constants.barangays') as $barangays)
										<option value="{{ $barangays }}" {{ old('barangays')==$barangays ? 'selected' : '' }}>
											{{ $barangays }}
										</option>
										@endforeach
									</select>
									@error('barangays')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Barangays</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="Age" min="0" required>
									@error('age')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Age</label>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('education_level') is-invalid @enderror" id="education_level"
										name="education_level" aria-label="education_level" data-live-search="true" title="Choose Educational Level" required>
										@foreach (config('constants.educational_level') as $education_level)
										<option value="{{ $education_level }}" {{ old('education_level')==$education_level ? 'selected' : '' }}>
											{{ $education_level }}
										</option>
										@endforeach
									</select>
									@error('education_level')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Educational Level</label>
							</div>
							<div class="text-start">
								<a href="{{ route('farmers.index') }}" class="btn btn-secondary">Back</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form><!-- End Multi Columns Form -->

					</div>
				</div>
			</div>
		</div>
	</section>
</x-app-layout>
