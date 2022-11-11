<?php

$arr = [12, 1, 19, 89, 12, 17, 13, 19, 19];
$max = 0;

$num = '';
$counter = 0;

for ($i = 0; $i < count($arr); $i++) {
	$current_num = $arr[$i];

	for ($j = 0; $j < count($arr); $j++) {
		if ($current_num == $arr[$j]) {
	    	$counter++;
		}
	}

	if ($max < $counter) {
		$max = $counter;
		$num = $current_num;
	}
	$counter = 0;
}

echo $max.' times - '.$num;