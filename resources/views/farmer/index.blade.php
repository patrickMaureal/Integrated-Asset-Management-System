<x-app-layout>
	<div class="text-center">
		<h1>
			<span class="badge bg-success">Farmer Profiling</span>
		</h1>

	</div>

	<a href="{{ route('farmers.create') }}" class="btn btn-primary">Add Farmer</a>

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



	<div class="col col-md-6 col-lg-3 col-xl-4 d-flex align-items-end">
    <div class="input-group">
        <div class="form-group flex-grow-1 mb-0 me-2">
            <label for="barangays">Barangays</label>
            <select class="form-control" id="custom-barangay-filter" name="barangays" aria-label="Barangays" data-live-search="true" title="Choose Barangays" required>
								<option value="">All</option>
                @foreach (config('constants.barangays') as $barangays)
                <option value="{{ $barangays }}">
                    {{ $barangays }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
	</div>


	<div class="row mt-4">
		<div class="col-lg-12">

			<div class="card">
				<div class="card-body table-wrapper table-responsive">
					<!-- Table with stripped rows -->
					<table class="table table-hover" id="farmer-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Gender</th>
								<th>Banner Program</th>
								<th>Barangay</th>
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

	<x-modal modal-id="farmer-modal" button-id="destroy-farmer" type="delete" label="farmer"/>

	@push('scripts')
		<script src="{{ asset('js/page/farmer/index.js') }}"></script>
	@endpush
</x-app-layout>
