<x-app-layout>

	<div class="pagetitle">
		<h1>Profile</h1>
	</div><!-- End Page Title -->

	<section class="section profile">
		<div class="row">
			<div class="col-xl-4">

				<div class="card">
					<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

						<img src="{{ asset('img/logo/tuburan-logo.png') }}" alt="Profile" class="rounded-circle">
						<h2>{{ auth()->user()->name }}</h2>
						{{-- <div class="social-links mt-2">
							<a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
							<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
							<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
							<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
						</div> --}}
					</div>
				</div>

			</div>

			<div class="col-xl-8">

				<div class="card">
					<div class="card-body pt-3">
						<!-- Bordered Tabs -->
						<ul class="nav nav-tabs nav-tabs-bordered">

							<li class="nav-item">
								<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
							</li>

							{{-- <li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
							</li> --}}

						</ul>
						<div class="tab-content pt-2">

							<div class="tab-pane fade show active profile-overview" id="profile-overview">

								<h5 class="card-title">Profile Details</h5>

								<div class="row">
									<div class="col-lg-3 col-md-4 label ">User Name</div>
									<div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Email</div>
									<div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
								</div>

								<!-- Change Password Form -->
								<form method="post" action="{{ route('password.update') }}">
									@csrf
									@method('put')

									<div class="row mb-3">
										<label for="currentPassword" class="col-md-4 col-lg-3 label">Current Password</label>
										<div class="col-lg-9 col-md-8">
											<input class="form-control @error('current_password') is-invalid @enderror" id="current_password"
											name="current_password" type="password" placeholder="Current Password" required>
											@error('current_password')
												<x-input-error message="{{ $message }}" />
											@enderror
										</div>
									</div>

									<div class="row mb-3">
										<label for="newPassword" class="col-md-4 col-lg-3 label">New Password</label>
										<div class="col-lg-9 col-md-8">
											<input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
											type="password" placeholder="New Password" required>
											@error('password')
												<x-input-error message="{{ $message }}" />
											@enderror
											<div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
												<i class="bi bi-info-circle me-1"></i>
												Password must be at least 8 characters in length and should include at least one uppercase letter, one number, and one special character.
											</div>
										</div>
									</div>

									<div class="row mb-3">
										<label for="renewPassword" class="col-md-4 col-lg-3 label">Re-enter New Password</label>
										<div class="col-lg-9 col-md-8">
											<input class="form-control" id="password_confirmation" name="password_confirmation" type="password"
											placeholder="Confirm Password" required>
										</div>
									</div>

									<div class="text-center">
										<button type="submit" class="btn btn-primary">Change Password</button>
									</div>
								</form><!-- End Change Password Form -->

							</div>

							@include('profile.partials.update-profile-information-form')


						</div><!-- End Bordered Tabs -->

					</div>
				</div>

			</div>
		</div>
	</section>

</x-app-layout>
