<?php

function clockHandAngle2($timeNow, $angle) {
	$new_angle;
	$solution = null;

	$array = explode(":", $timeNow);
	$hours = $array[0];
	$minutes = $array[1];
	$seconds = $array[2];

    if ($hours == 12) {
    	$hours = 0;
    }

	if ($solution == null) {
		for ($h = $hours; $h <= 12; $h++) {
			for ($m = $minutes; $m <= 60; $m++) {
				for ($s = $seconds; $s <= 60; $s++) {
	        		$new_angle = FindAngle($h, $m, $s);

					if ($s == 60) {
						$m += 1;
						$s = 0;
					}

					if ($m == 60) {
						$h += 1;
						$m = 0;
					}

					if ($new_angle == $angle) {
						if ($new_angle == 180) {
							$new_angle = 0;
						}
						if ($h == 0) {
							$h = 12;
						}
						if ($m < 10 && strlen($m) < 2) {
							$m = '0'.$m;
						}
						if ($s < 10 && strlen($s) < 2) {
							$s = '0'.$s;
						}
						
						$solution = $h.':'.$m.':'.$s;
						echo $solution;
						break 3;
					}
				}
			}
		}
	}
}

function FindAngle($h, $m, $s) {
	$h_angle = 0.5 * ($h * 60 + ($m + $s/60));
    $m_angle = 6 * ($m + $s/60);
    $new_angle = abs($h_angle - $m_angle);
    $new_angle = min((360 - $new_angle), $new_angle);
    return round($new_angle, 1);
}

function PrintError($str) {
	echo '<div class="panel">';
	echo '<div class="error">'.$str.'</div>';
	echo '</div>';
}