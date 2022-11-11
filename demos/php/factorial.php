<?php

$number = 4;
$fact = 1;
while ($number > 0) {
	$fact *= $number;
  	$number -= 1;;
}
echo $fact;