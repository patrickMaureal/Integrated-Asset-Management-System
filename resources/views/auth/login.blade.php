<x-guest-layout>
	<div class="container">

		<section class="section register min-vh-100 py-4 d-flex flex-column align-center justify-content-center">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="login-logo">
							<img src="{{ asset('img/logo/mao-logo.png') }}" alt="">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card mb-3">

							<div class="card-body">

								<div class="pt-4 pb-2">
									<h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
									<p class="text-center small">Enter your email & password to login</p>
								</div>

								<form class="row g-3" method="POST" action="{{ route('login') }}">
									@csrf

									<div class="col-12">
										<label for="yourUsername" class="form-label">Email</label>
										<div class="input-group">
											<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
											@error('email')
												<x-input-error message="{{ $message }}" />
											@enderror
										</div>
									</div>

									<div class="col-12">
										<label for="yourPassword" class="form-label">Password</label>
										<input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
										@error('password')
											<x-input-error message="{{ $message }}" />
										@enderror
									</div>
									<!-- Remember Me -->
									<div class="block mt-4">
										<label for="remember_me" class="inline-flex items-center">
											<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
											<span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
										</label>
									</div>
									<div class="col-12">
										<button class="btn btn-primary w-100" type="submit">Login</button>
									</div>

									<div class="col-12">
										<p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
									</div>

								</form>

							</div>
						</div>
					</div>
				</div>
			</div>

		</section>

	</div>
</x-guest-layout>
