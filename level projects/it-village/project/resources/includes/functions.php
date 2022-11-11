<?php
function clear_in_progress($conn, $user_id) {
	$clear_in_progress = "UPDATE in_progress SET in_progress = 'NO', money = NULL, moves = NULL, field = NULL, motels = NULL WHERE user_id = '$user_id'";
	$clear_result = mysqli_query($conn, $clear_in_progress);
}

function hide_btns() {
	$_SESSION['hide_btn_save'] = "yes";
	$_SESSION['hide_btn_throw'] = "yes";
}

function add_in_history($conn, $user_id, $reason) {
	$date_info = new DateTime("now", new DateTimeZone('Europe/Sofia'));
	$date = $date_info->format('Y-m-d');

	$insert_q = "INSERT INTO history_of_games (user_id, field, moves, money, motels, reason, date) VALUES (".(int)$user_id.", ".(int)$_SESSION['field'].", ".(int)$_SESSION['moves'].", ".(int)$_SESSION['money'].", ".(int)$_SESSION['motels'].", '$reason', '$date')";
	$insert_result = mysqli_query($conn, $insert_q);
}

function print_rating_rows($conn, $username) {
	$info_query = "SELECT username, total_games, victories FROM users_info ORDER BY victories DESC";
	$info_result = mysqli_query($conn, $info_query);

	$users_rows = [];
	$n = 1;
	while ($row = mysqli_fetch_assoc($info_result)) {
		array_push($users_rows, ['no' => $n, 'username' => $row['username'], 'total_games' => $row['total_games'], 'victories' => $row['victories']]);
		$n++;
	}

	for ($i = 0; $i < count($users_rows); $i++) { 
		if ($users_rows[$i]['username'] == $username) {
			$before = 1;
			for ($j = $i-3; $j < $i; $j++) {
				if (isset($users_rows[$j])) {
					echo '<div class="rating_row">';
					echo '<div class="rating_no">'.$users_rows[$j]['no'].'</div>';
					echo '<div class="rating_player">'.$users_rows[$j]['username'].'</div>';
					echo '<div class="rating_t_games">'.$users_rows[$j]['total_games'].'</div>';
					echo '<div class="rating_vict">'.$users_rows[$j]['victories'].'</div>';
					echo '</div>';
					$before++;
				}
			}
			echo '<div style="background-color: #008000; box-shadow: -3px -3px 15px #000;" class="rating_row">';
			echo '<div class="rating_no">'.$users_rows[$i]['no'].'</div>';
			echo '<div class="rating_player">'.$users_rows[$i]['username'].'</div>';
			echo '<div class="rating_t_games text-white">'.$users_rows[$i]['total_games'].'</div>';
			echo '<div class="rating_vict">'.$users_rows[$i]['victories'].'</div>';
			echo '</div>';

			for ($k = ($i+1); $k <= (9-$before+$i); $k++) {
				if (isset($users_rows[$k])) {
					echo '<div class="rating_row">';
					echo '<div class="rating_no">'.$users_rows[$k]['no'].'</div>';
					echo '<div class="rating_player">'.$users_rows[$k]['username'].'</div>';
					echo '<div class="rating_t_games">'.$users_rows[$k]['total_games'].'</div>';
					echo '<div class="rating_vict">'.$users_rows[$k]['victories'].'</div>';
					echo '</div>';
				}
			}
		}
	}
}

function print_table($field, $path) {
	$img_1 = "<img class='img_field cocktail' src='".$path."cocktail.png' width='68px'>";
	$img_2 = "<img class='img_field motel' src='".$path."motel.png' width='66px'>";
	$img_3 = "<img class='img_field money' src='".$path."money.png' width='62px'>";
	$img_4 = "<img class='img_field storm' src='".$path."storm.png' width='68px'>";
	$img_5 = "<img class='img_field vso' src='".$path."vso.png' width='68px'>";
	$img_6 = "<img class='img_field php' src='".$path."php.png' width='58px'>"
	?>
	<table>
		<tr>
			<td>
				<div class="field_no">1</div>
				<div class="field <?php if ($field == 1) { echo 'current_field'; }?>"><?=$img_1?></div>
			</td>
			<td>
				<div class="field_no">2</div>
				<div class="field <?php if ($field == 2) { echo 'current_field'; }?>"><?=$img_2?></div>
			</td>
			<td>
				<div class="field_no">3</div>
				<div class="field <?php if ($field == 3) { echo 'current_field'; }?>"><?=$img_3?></div>
			</td>
			<td>
				<div class="field_no">4</div>
				<div class="field <?php if ($field == 4) { echo 'current_field'; }?>"><?=$img_4?></div>
			</td>
			<td colspan="2" class="empty_td"></td>
		</tr>
		<tr>
			<td>
				<div class="field_no">16</div>
				<div class="field <?php if ($field == 16) { echo 'current_field'; }?>"><?=$img_3?></div>
			</td>
			<td>
				<div class="field_no">15</div>
				<div class="field <?php if ($field == 15) { echo 'current_field'; }?>"><?=$img_1?></div>
			</td>
			<td class="empty_td"></td>
			<td>
				<div class="field_no">5</div>
				<div class="field <?php if ($field == 5) { echo 'current_field'; }?>"><?=$img_2?></div>
			</td>
			<td>
				<div class="field_no">6</div>
				<div class="field <?php if ($field == 6) { echo 'current_field'; }?>"><?=$img_6?></div>
			</td>
			<td class="empty_td"></td>
		</tr>
		<tr>
			<td class="empty_td"></td>
			<td>
				<div class="field_no">14</div>
				<div class="field <?php if ($field == 14) { echo 'current_field'; }?>"><?=$img_5?></div>
			</td>
			<td>
				<div class="field_no">13</div>
				<div class="field <?php if ($field == 13) { echo 'current_field'; }?>"><?=$img_3?></div>
			</td>
			<td class="empty_td"></td>
			<td>
				<div class="field_no">7</div>
				<div class="field <?php if ($field == 7) { echo 'current_field'; }?>"><?=$img_3?></div>
			</td>
			<td>
				<div class="field_no">8</div>
				<div class="field <?php if ($field == 8) { echo 'current_field'; }?>"><?=$img_1?></div>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="empty_td"></td>
			<td>
				<div class="field_no">12</div>
				<div class="field <?php if ($field == 12) { echo 'current_field'; }?>"><?=$img_4?></div>
			</td>
			<td>
				<div class="field_no">11</div>
				<div class="field <?php if ($field == 11) { echo 'current_field'; }?>"><?=$img_1?></div>
			</td>
			<td>
				<div class="field_no">10</div>
				<div class="field <?php if ($field == 10) { echo 'current_field'; }?>"><?=$img_2?></div>
			</td>
			<td>
				<div class="field_no">9</div>
				<div class="field <?php if ($field == 9) { echo 'current_field'; }?>"><?=$img_3?></div>
			</td>
		</tr>
	</table>
	<?php
}
?>