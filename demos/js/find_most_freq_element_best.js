function findMostFreq(str) {
	var max = 0, 
		mostFreq,
		counter = 0,
		current;
	for (var i = 0; i < str.length; i++) {
		current = str[i];
		for (var j = 0; j < str.length; j++) {
			if (current == str[j]) {
		    	counter++;
			}
		}
		if (max < counter) {
			max = counter;
			mostFreq = current;
		}
		counter = 0;
	}
	return mostFreq;
}