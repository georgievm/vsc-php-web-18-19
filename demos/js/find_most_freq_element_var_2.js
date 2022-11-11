function findMostFreq(str) {
	var letterCount = [];
	for (var i = 0; i < str.length; i++) { // make associative array [letter: count, ...]
		letterCount[str[i]] = str.match(new RegExp(str[i], 'g')).length;
	}
	for (var name in letterCount) { // return the name/letter with max count
		if (letterCount[name] == Math.max.apply(null, Object.values(letterCount))) {
			return name;
		}
	}
}