<div class="tab-pane fade pt-3" id="profile-change-password">
	<!-- Change Password Form -->
	<form method="post" action="{{ route('password.update') }}">
		@csrf
		@method('put')

		<div class="row mb-3">
			<label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
			<div class="col-md-8 col-lg-9">
				<input class="form-control @error('current_password') is-invalid @enderror" id="current_password"
				name="current_password" type="password" placeholder="Current Password" required>
				@error('current_password')
					<x-input-error message="{{ $message }}" />
				@enderror
			</div>
		</div>

		<div class="row mb-3">
			<label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
			<div class="col-md-8 col-lg-9">
				<input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
				type="password" placeholder="New Password" required>
				@error('password')
					<x-input-error message="{{ $message }}" />
				@enderror
			</div>
		</div>

		<div class="row mb-3">
			<label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
			<div class="col-md-8 col-lg-9">
				<input class="form-control" id="password_confirmation" name="password_confirmation" type="password"
				placeholder="Confirm Password" required>
			</div>
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-primary">Change Password</button>
		</div>
	</form><!-- End Change Password Form -->

</div>
