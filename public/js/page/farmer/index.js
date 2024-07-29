$(function () {
	// holds the id when button delete click
	let this_id;
	// modal
	let modal = $('#farmer-modal');
	// start => datatable
	let table = $("#farmer-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/farmers/table",
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
			{ data: "name", name: "name" },
			{ data: "gender", name: "gender" },
			{ data: "banner_program", name: "banner_program" },
			{ data: "barangay", name: "barangay" },
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

	$('#custom-barangay-filter').change(function () {
		if ($(this).val() === 'All') {
			table.column(3).search('').draw();
    } else {
			table.column(3).search($(this).val()).draw();
    }
	}).trigger('change');

	// start => button delete
	$('body').on('click', '.delete-farmer', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-farmer', function () {
		$.ajax({
			url: "/farmers/" + this_id,
			type: "DELETE",
			dataType: "json",
			beforeSend: function () {
				buttons('destroy-farmer', 'start');
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
			buttons('destroy-farmer', 'finish');
			modal.modal('hide');
		});
	});
	// end
});
