<x-app-layout>
	{{-- modal --}}
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form action="{{ route('farmers.destroy', $farmer) }}" method="POST">

					@csrf
					@method('DELETE')

					<div class="modal-header">
						<h2 class="h6 modal-title">Confirmation</h2>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this farmer?</p>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Yes</button>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="pagetitle mb-4">
		<h1>Farmer Profile</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('farmers.index') }}">Farmer</a></li>
				<li class="breadcrumb-item active">Update</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section">
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Update Farmer</h5>

						<!-- Multi Columns Form -->
						<form class="row g-3" method="POST" action="{{ route('farmers.update', $farmer) }}">

							@csrf
							@method('PUT')

							<div class="col-md-12">
								<label for="name" class="form-label">Name<x-asterisk/></label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $farmer->name) }}" required>
								@error('name')
                <x-input-error message="{{ $message }}" />
                @enderror
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-select" id="gender" aria-label="gender" name="gender" required>
									@foreach (['Male', 'Female'] as $currentGender)
										<option value="{{ $currentGender }}" {{ $farmer->gender == $currentGender ? 'selected' : '' }}>{{ $currentGender }}</option>
									@endforeach
									</select>
									<label for="floatingSelect">Gender</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-select" id="banner_program" aria-label="banner_program" name="banner_program" required>
										@foreach(['Corn Program', 'Rice Program', 'High Value Crops Program', 'Fisheries Program', 'Livestock Program'] as $currentBannerProgram)
											<option value="{{ $currentBannerProgram }}" {{ $farmer->banner_program == $currentBannerProgram ? 'selected' : '' }}>{{ $currentBannerProgram }}</option>
										@endforeach
									</select>
									<label for="floatingSelect">Banner Program</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('barangays') is-invalid @enderror" id="barangays"
										name="barangays" aria-label="Barangays" data-live-search="true" title="Choose Barangays" required>
										@foreach (config('constants.barangays') as $barangays)
										<option value="{{ $barangays }}" {{ old('barangays')|| $farmer->barangay==$barangays ? 'selected' : '' }}>
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
									<input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age', $farmer->age) }}" required>
									@error('age')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingTextarea">Age</label>
							</div>
							<div class="col-md-12">
								<div class="form-floating mb-3">
									<select class="form-control @error('education_level') is-invalid @enderror" id="education_level"
										name="education_level" aria-label="education_level" data-live-search="true" title="Choose Education Level" required>
										@foreach (config('constants.educational_level') as $education_level)
										<option value="{{ $education_level }}" {{ old('education_level')|| $farmer->education_level==$education_level ? 'selected' : '' }}>
											{{ $education_level }}
										</option>
										@endforeach
									</select>
									@error('education_level')
									<x-input-error message="{{ $message }}" />
									@enderror
									<label for="floatingSelect">Barangays</label>
								</div>
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
