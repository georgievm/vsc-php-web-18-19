var num,
	units,
	eleven_to_nineteen,
	tens,
	result;
	
num = String(999);
units = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'];
eleven_to_nineteen = ['eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
tens = ['twenty', 'thirty', 'fourty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

if (num.length == 1) {
	result = units[num];
} else if (num.length == 2) {
	if (num == '10') {
		result = "ten";
	} else if (parseInt(num) < 20) {
		result = eleven_to_nineteen[num[1]-1];
	} else {
		if (num[1] == 0) {
			result = tens[num[0]-2];
		} else {
			result = tens[num[0]-2] + "-" + units[num[1]];
		}
	}
} else if (num.length == 3) {
	result = units[num[0]] + " hundred";
	if (num[1] == 0) {
		if (num[2] != 0) {
			result += " and " + units[num[2]];
		}	
	} else if (num[1] == 1) {
		if (num[2] == 0) {
			result += " and " + units[10];
		} else {
			result += " and " + eleven_to_nineteen[num[2]-1];
		}
	} else {
		if (num[2] == 0) {
			result += " and " + tens[num[1]-2];
		} else {
			result += " and " + tens[num[1]-2] + "-" + units[num[2]];
		}	
	}
}

alert(num + " = " + result); // easy :)