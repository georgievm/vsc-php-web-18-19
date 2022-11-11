var str,
	count,
	symbol,
	result;

str = "(b * (c + d*2 / (2 + (12 - c/(a + 3))))";
count = 0;
result = "CORRECT";

for (var i = 0; i < str.length; i++) {
	symbol = str.charAt(i);

   	if (symbol == '(') {
        count++;
    } else if (symbol == ')') {
       count--;
    }
}
if (count != 0) {
   	result = "INCORRECT";
}

alert(str + " - " + result);

