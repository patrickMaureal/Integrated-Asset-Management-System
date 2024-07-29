$(function () {
	// holds the id when button delete click
	let this_id;
	// modal
	let modal = $('#high-value-crop-modal');
	// start => datatable
	let table = $("#high-value-crop-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/banner-programs/high-value-crops/table",
			dataType: "json",
			error: function (errors) {
				toast.fire({
					icon: 'error',
					title: 'Invalid Data Token.',
				})
			},
		},
		language: {
			searchPlaceholder: "Search Records..",
		},
		columns: [
			{ data: "farmer_name", name: "farmer_name" },
			{ data: "farmer_barangay", name: "farmer_barangay" },
			{ data: "crop_information", name: "crop_information",searchable: false },
			{ data: "insurance_or_renewal", name: "insurance_or_renewal" },
			{
				data: "action",
				name: "action",
				orderable: false,
				searchable: false,
			},
		],
	});
	// end
	// custom search
	$("#custom-search-field").keyup(function () {
		table.search($(this).val()).draw();
	});
	// custom page length
	$("#custom-page-length").change(function () {
		table.page.len($(this).val()).draw();
	}).trigger('change');
	// start => button delete
	$('body').on('click', '.delete-high-value-crop', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-high-value-crop', function () {
		$.ajax({
			url: "/banner-programs/high-value-crops/" + this_id,
			type: "DELETE",
			dataType: "json",
			beforeSend: function () {
				buttons('destroy-high-value-crop', 'start');
			}
		})
		.done(function (response) {
			table.ajax.reload();
			toast.fire({
				icon: 'success',
				title: response.message,
			});
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			toast.fire({
				icon: 'error',
				title: jqXHR.responseJSON.message,
			});
		})
		.always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
			buttons('destroy-high-value-crop', 'finish');
			modal.modal('hide');
		});
	});
	// end
});
