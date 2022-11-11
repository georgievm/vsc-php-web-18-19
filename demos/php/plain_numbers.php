<?php

$m = 2;
$n = 100;
$flag = false;

for($i = $m; $i <= $n; $i++) {
	echo '<p>';
	echo $i;
	for($k = $m; $k < $i; $k++) {
		if ($i % $k == 0) {
			$flag = true;
			break;
		}
	}

	if ($flag == false) {
		echo ' is a plain number';
	} else {
		$flag = false;
	}
	echo '</p>';
}