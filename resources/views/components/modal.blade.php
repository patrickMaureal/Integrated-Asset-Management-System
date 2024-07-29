<div>
	<div class="modal fade" data-backdrop="static" data-keyboard="false" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				@if ($type == 'delete')
					<div class="modal-header">
						<h5 class="modal-title">Delete Confirmation</h5>
						<span class="pull-right">
							<div class="spinner-grow text-danger spinner" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
						</span>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this {{ $label }}?</p>
					</div>
					<div class="modal-footer">
						<button id="close-button" type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" >No</button>
						<button id="{{ $buttonId }}" class="btn btn-outline-danger" >Yes</button>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
