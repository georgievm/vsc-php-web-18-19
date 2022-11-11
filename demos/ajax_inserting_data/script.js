$('.print').click(function() {
	var num = $('#num').val(),
		no;

	if (num.trim() === '') {
		alert('Empty field!');
	} else if (num < 1 || num > 5) {
		alert('Invalid participants number, [1-5]');
	} else {
		for (let panel of $('.participant-pnl')) {
			panel.remove();
		}
		for (var i = 0; i < num; i++) {
			no = $('.participant-pnl').length + 1;

			($('<div>').addClass('participant-pnl')
				.append($('<div>')
					.addClass('pnl-name')
					.text("Participant " + no))
				.append($('<div>')
					.addClass('form-group')
					.append($('<label>').text('Name'))
					.append($('<input type="text" class="form-control" id="p'+no+'-name" name="name" placeholder="Name">')))
				.append($('<div>')
					.addClass('form-group')
					.append($('<label>').text('Address'))
					.append($('<input type="text" class="form-control" id="p'+no+'-address" name="address" placeholder="Address">')))
			).insertBefore($('.submit'));
		}
		$('.submit').css('display', 'block');
	}
});
$(document).ready(function() {
	$('form').submit(function(e) {
		e.preventDefault();
		var empty = false,
			names = [],
			addresses = [];

		$('input[name=name], input[name=address]').each(function() {
			if ($(this).val().trim() === '') {
				empty = true;
			}
		});
		if (!empty) {
			$('input[name=name]').each(function() {
				names.push($(this).val());
			});
			$('input[name=address]').each(function() {
				addresses.push($(this).val());
			});

			$.ajax({
				url: 'insert.php',
				type: 'POST',
				data: {
					'names': names,
				 	'addresses': addresses
				},
				success: function (response) {
					alert("The request has been successfully submitted!");
					alert(response);
				},
				error: function(xhr){
        			alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
    			}
			});
		} else {
			alert('Empty field(s)!');
		}
	});
});
