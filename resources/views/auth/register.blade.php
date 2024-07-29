<x-guest-layout>
	<div class="container">

		<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8 col-md-12 d-flex flex-column align-items-center justify-content-center">

						<div class="card mb-3 p-2">

							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="pt-4 pb-2">
											<h5 class="card-title text-left pb-0 fs-4 mb-3">Sign Up</h5>

											<form class="row g-3" action="{{ route('register') }}" method="POST">
												@csrf

												<div class="col-12">
													<label for="yourName" class="form-label">Your Name</label>
													<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required>
													@error('name')
														<x-input-error message="{{ $message }}" />
													@enderror
												</div>

												<div class="col-12">
													<label for="yourEmail" class="form-label">Your Email</label>
													<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
													@error('email')
														<x-input-error message="{{ $message }}" />
													@enderror
												</div>

												<div class="col-12">
													<label for="yourPassword" class="form-label">Password</label>
													<input type="password" name="password" class="form-control @error('password') is-invalid @enderror " id="password" required>
													@error('password')
														<x-input-error message="{{ $message }}" />
													@enderror
												</div>

												<div class="col-12">
													<label for="yourPassword" class="form-label">Confirm Password</label>
													<input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror " id="password_confirmation" required>
													@error('password_confirmation')
														<x-input-error message="{{ $message }}" />
													@enderror
												</div>

												<div class="col-12">
													<div class="form-check">
														<input class="form-check-input @error('terms') is-invalid @enderror" name="terms" type="checkbox" value="" id="acceptTerms" required>
														<label class="form-check-label" for="acceptTerms" data-bs-toggle="modal" data-bs-target="#termsModal">I agree and accept the <a href="#">terms and conditions</a></label>
														@error('terms')
															<x-input-error message="{{ $message }}" />
														@enderror
													</div>
												</div>

												<div class="col-12">
													<button class="btn btn-primary w-100" type="submit">Create Account</button>
												</div>
											</form>
										</div>
									</div>
									<div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
										<div class="register-logo">
											<img src="{{ asset('img/logo/mao-logo.png') }}" class="img-fluid" alt="">
										</div>
										<div class="login mt-3">
											<a href="{{ route('login') }}" class="text-black text-decoration-underline"> I am already a member</a>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>

		</section>

	</div>

	<!-- Terms and Conditions Modal -->
	<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- Your terms and conditions content goes here -->
					<p>Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use:</p>
					<ol>
						<li>The content of the pages of this website is for your general information and use only. It is subject to change without notice.</li>
						<li>This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the following personal information may be stored by us for use by third parties: [list of information].</li>
						<li>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness, or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.</li>
						<li>Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services, or information available through this website meet your specific requirements.</li>
						<li>This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance, and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.</li>
						<li>All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.</li>
						<li>Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offense.</li>
					</ol>
					<p>Your use of this website and any dispute arising out of such use of the website is subject to the laws of Philippines.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</x-guest-layout>
