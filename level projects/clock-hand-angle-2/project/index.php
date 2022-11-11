<!DOCTYPE html>
<html lang="en">
<head>
	<title>ClockHandAngle2</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="icon/png" href="images/icon.png">
</head>
<body>
	<div class="wrapper">
		<div class="left_part">
			<header>ClockHandAngle2</header>
			<img src="images/img.png" class="image" width="85%" alt="img.png">
		</div>
		<div class="right_part">
			<div class="panel">
				<div class="about">
				Welcome to my project,<br>what I had to do was to write an algorithm that calculate and print
				the next time when the clock hands' angle will be the same as you want and... it is.
				</div>
			</div>
			<div class="panel">
				<form action="#" method="post">
					<span>
						<label>Time now:</label>
						<input type="text" name="time" placeholder="h:mm:ss">
					</span>
					<span>
						<label style="margin-left: 6%;">Angle:</label>
						<input style="width: 50px;" type="number" name="angle" min="0" max="180">
						<label style="margin-left: 0;">&#176;</label>
					</span>	
					<input class="button" type="submit" name="calc" value="Calculate">
				</form>
			</div>
			<?php
			include "functions.php";

			if (isset($_POST['calc'])) {
				$timeNow = $_POST['time'];
				$angle = $_POST['angle'];

				if (!empty($timeNow)) {
					$time_el = explode(':', $timeNow);
					if (count($time_el) == 3) {
						$h = $time_el[0];
						$m = $time_el[1];
						$s = $time_el[2];
						if ((strlen($h) == 1 || strlen($h) == 2) && strlen($m) == 2 && strlen($s) == 2 && $h > 0 && $h <= 12 && $m >= 0 && $m < 60 && $s >= 0 && $s < 60) {

							if ($angle == null) {
								$angle = 0;
							}

							echo '<div class="panel">';

							echo '<div class="timeNow">'.$timeNow.'</div>';
							echo '<div class="result_text">'.'The next time when the clock hands\' angle will be '.$angle.'&#176;<br> is'.'</div>';
							
							echo '<div class="result_time">';
							clockHandAngle2($timeNow, $angle);
							echo '</div>';

							echo '</div>';
						} else {
							PrintError('Incorrect timeNow value!');
						}
					} else {
						PrintError('Incorrect timeNow value!');
					}
				} else {
					PrintError('Please set the timeNow!');
				}
			}
			?>
			<footer>Made by Martin Georgiev, 2019</footer>
		</div>
	</div>
</body>
</html>