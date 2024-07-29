$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

function buttons(button, type) {
    var spinner = $('.spinner');

    if (type == 'start') {
        spinner.addClass('text-danger spinner-grow').attr('role', 'status');
        spinner.html('<span class="visually-hidden">Loading...</span>').show();
        $('#close-button').prop('disabled', true);
        $('#' + button).prop('disabled', true);
    }

    if (type == 'finish') {
        spinner.hide().removeClass('text-danger spinner-grow');
        $('#close-button').prop('disabled', false);
        $('#' + button).prop('disabled', false);
    }
}


const toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 5000
});
