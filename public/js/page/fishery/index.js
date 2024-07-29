$(function () {
	// holds the id when button delete click
	let this_id;
	// modal
	let modal = $('#fishery-modal');
	// start => datatable
	let table = $("#fishery-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/banner-programs/fisheries/table",
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
			{ data: "fisherman_name", name: "fisherman_name" },
			{ data: "fisherman_barangay", name: "fisherman_barangay" },
			{ data: "fishing_activities", name: "fishing_activities" ,searchable: false},
			{ data: "aquaculture_details", name: "aquaculture_details", searchable: false },
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
	$('body').on('click', '.delete-fishery', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-fishery', function () {
		$.ajax({
			url: "/banner-programs/fisheries/" + this_id,
			type: "DELETE",
			dataType: "json",
			beforeSend: function () {
				buttons('destroy-fishery', 'start');
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
			buttons('destroy-fishery', 'finish');
			modal.modal('hide');
		});
	});
	// end
});
