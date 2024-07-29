$(function () {
	// holds the id when button delete click
	let this_id;
	// modal
	let modal = $('#organic-agriculture-modal');
	// start => datatable
	let table = $("#organic-agriculture-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/banner-programs/organic-agricultures/table",
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
			{ data: "organic_type", name: "organic_type" },
			{ data: "created_at", name: "created_at",searchable: false },
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
	$('body').on('click', '.delete-organic-agriculture', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-organic-agriculture', function () {
		$.ajax({
			url: "/banner-programs/organic-agricultures/" + this_id,
			type: "DELETE",
			dataType: "json",
			beforeSend: function () {
				buttons('destroy-organic-agriculture', 'start');
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
			buttons('destroy-corn', 'finish');
			modal.modal('hide');
		});
	});
	// end
});
