<div class="tab-pane fade profile-edit pt-3" id="profile-edit">

	<!-- Profile Edit Form -->
	<form method="post" action="{{ route('profile.update') }}" >
		@csrf
		@method('patch')

		<div class="row mb-3">
			<label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
			<div class="col-md-8 col-lg-9">
				<input name="name" type="text" class="form-control" id="name" value="{{ auth()->user()->name }}">
			</div>
		</div>

		<div class="row mb-3">
			<label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
			<div class="col-md-8 col-lg-9">
				<input name="email" type="email" class="form-control" id="email" value="{{ auth()->user()->email }}">
			</div>
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-primary">Save Changes</button>
		</div>
	</form><!-- End Profile Edit Form -->

</div>
