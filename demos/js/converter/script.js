var allowed = [
		[0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
		['a', 'b', 'c', 'd', 'e', 'f']
	];

function dec_to_bin(input) {
	input = String(input);

	// test input
	var valid = true,
		count = 0;

	for (var i = 0; i < input.length; i++) {
		for (var j = 0; j < (allowed[0]).length; j++) {
			if (input[i] == allowed[0][j]) {
				count++;
			}
		}
		if (count == 0) {
			valid = false;
		} else {
			count = 0;
		}
	}

	if (valid == true) {
		// result
		var bin = (+input).toString(2);
		return bin;
	} else {
		return '<div class="invalid">Invalid Input!</div>';
	}
}

function bin_to_dec(input) {
	input = String(input);

	// test input
	var valid = true,
		count = 0;

	for (var i = 0; i < input.length; i++) {
		for (var j = 0; j < 2; j++) {
			if (input[i] == allowed[0][j]) {
				count++;
			}
		}
		if (count == 0) {
			valid = false;
		} else {
			count = 0;
		}
	}

	if (valid == true) {
		// result
		var dec = parseInt(input, 2);
		return dec;
	} else {
		return '<div class="invalid">Invalid Input!</div>';
	}
}

function dec_to_hex(input) {
	input = String(input);

	// test input
	var valid = true,
		count = 0;

	for (var i = 0; i < input.length; i++) {
		for (var j = 0; j < (allowed[0]).length; j++) {
			if (input[i] == allowed[0][j]) {
				count++;
			}
		}
		if (count == 0) {
			valid = false;
		} else {
			count = 0;
		}
	}

	if (valid == true) {
		// result
		var hex = (+input).toString(16);
		return hex;
	} else {
		 return '<div class="invalid">Invalid Input!</div>';
	}
}

function hex_to_dec(input) {
	input = String(input);

	// test input
	var valid = true,
		count = 0;

	for (var i = 0; i < input.length; i++) {
		for (var j = 0; j < (allowed[0].length+allowed[1].length); j++) {
			if (j < allowed[0].length) {
				if (input[i] == allowed[0][j]) {
					count++;
				}
			} else {
				if (input[i] == allowed[1][j-allowed[0].length]) {
					count++;
				}
			}
		}
		if (count == 0) {
			valid = false;
		} else {
			count = 0;
		}
	}

	if (valid == true) {
		// reesult
		var dec = parseInt(input, 16);
		return dec;
	} else {
		return '<div class="invalid">Invalid Input!</div>';
	}
}