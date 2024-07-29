<x-app-layout>
	<a href="{{ route('bannerPrograms') }}" class="btn btn-secondary">Back</a>

	<div class="text-center">
		<h1>
			<span class="badge bg-success">Fisheries Program</span>
		</h1>

	</div>

	<a href="{{ route('fisheries.create') }}" class="btn btn-primary">Add Farmer to Program</a>

	<div class="table-settings mb-4 mt-4">
		<div class="row align-items-center justify-content-between">
			<div class="col-4 col-md-2 col-xl-1">
				<select id="custom-page-length" class="form-select d-md-inline" aria-label="Message select example 2">
					<option value="5" selected>5</option>
					<option value="10">10</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</div>
			<div class="col col-md-6 col-lg-3 col-xl-4">
				<div class="input-group me-2 me-lg-3">
					<input id="custom-search-field" type="text" class="form-control" placeholder="Search Farmer..">
					<span class="input-group-text">
						<i class="icon icon-xs bi bi-search"></i>
					</span>
				</div>
			</div>
		</div>
	</div>


	<div class="row mt-4">
		<div class="col-lg-12">

			<div class="card">
				<div class="card-body table-wrapper table-responsive">
					<!-- Table with stripped rows -->
					<table class="table table-hover" id="fishery-table">
						<thead>
							<tr>
								<th>Fisher's Name</th>
								<th>Barangay</th>
								<th>Fishing Activities</th>
								<th>Aquaculture Details</th>
								<th>Insurance Application/Renewal</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
					<!-- End Table with stripped rows -->
				</div>
			</div>

		</div>


	</div>

	<x-modal modal-id="fishery-modal" button-id="destroy-fishery" type="delete" label="Fishery"/>

	@push('scripts')
		<script src="{{ asset('js/page/fishery/index.js') }}"></script>
	@endpush
</x-app-layout>
