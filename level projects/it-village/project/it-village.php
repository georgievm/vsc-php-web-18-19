<?php
ob_start();
session_start();
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$field = $_SESSION['field'];
$moves = $_SESSION['moves'];
$money = $_SESSION['money'];
$motels = $_SESSION['motels'];
$event = $_SESSION['event'];

$title = "iT-Village | $username";
include_once "resources/includes/header.php";
include_once "resources/includes/functions.php";

if (isset($_POST['btn_new_game'])) {
	$moves = rand(7, 15);
	$field = rand(1, 16);
	$_SESSION['event'] = "<span class='ev_center'>Moves - <span class='green bold'>$moves</span>, Initial Feld - <span class='green bold'>$field</span></span>";
	$_SESSION['moves'] = $moves;
	$_SESSION['field'] = $field;
	$_SESSION['money'] = 50;
	$_SESSION['motels'] = 0;
	$_SESSION['vso_field'] = 0;

	unset($_SESSION['hide_btn_save']);
	unset($_SESSION['hide_btn_throw']);
	unset($_SESSION['dice_num']);

	header('Location: it-village.php');
}

if (isset($_POST['btn_throw_dice'])) {
	$dice_num = rand(1, 6);
	$_SESSION['dice_num'] = $dice_num;
	$moves -= 1;

	$field += $dice_num;
	if ($field > 16) {
		$field -= 16;
	}

	if ($field == 1 || $field == 8 || $field == 11 || $field == 15) {
		$event = "<span class='underline'>WiFi Pub</span>: You are buying an \"Cloud\" cocktail<br><span class='red'>-5 Coins</span>";
		$money = max(0, $money - 5);
	} elseif ($field == 2 || $field == 5 || $field == 10) {
		if ($money >= 80) {
			$event = "<span class='underline'>Motel</span>: You have enough money and you are buying it!<br><span class='red'>-80 $</span>";
			$money -= 80;
			$motels += 1;
		} else {
			$event = '<span class="underline">Motel</span>: You don\'t have enough money to buy it and you must pay for the stay<br><span class="red">-10 $</span>';
			$money = max(0, $money - 10);
		}
	} elseif ($field == 3 || $field == 7 || $field == 9 || $field == 13 || $field == 16) {
		$event = "<span class='underline'>Freelance Project</span>: You get a payment<br><span class='green'>+20 $</span>";
		$money += 20;
	} elseif ($field == 4 || $field == 12) {
		$event = "<span class='underline'>Storm</span>: There is no WiFi in the village and you are depressed, <span class='red'>YOU SKIP 2 FIELDS</span>";
		if ($moves < 3) {
			$moves = 0;
		} else {
			$moves -= 2;
		}
	} elseif ($field == 6) {
		$event = "<span class='underline'>Super PHP</span>: <span class='green'>Your money is increasing 10 TIMES!</span>";
		$money *= 10;
	} elseif ($field == 14) {
		$_SESSION['vso_field'] += 1;
	}

	$_SESSION['field'] = $field;

	$read_user_info = "SELECT total_games, victories, defeats FROM users_info WHERE user_id = '$user_id'";
	$user_info_row = mysqli_fetch_assoc(mysqli_query($conn, $read_user_info));

	$total_games = $user_info_row['total_games'];
	$victories = $user_info_row['victories'];
	$defeats = $user_info_row['defeats'];

	$btn_new_game = '<form action="" method="post"><input type="submit" class="btn btn_new_game" name="btn_new_game" value="New game"></form>';

	// CONDITIONS FOR END OF THE GAME
	if ($_SESSION['vso_field'] == 1) {
		$event = "<span style='padding-top: 0;' class='ev_center green'>Congratulations, you won with the support of VSO!</span>".$btn_new_game;
		$total_games += 1;
		$victories += 1;
		clear_in_progress($conn, $user_id);
		hide_btns();
		add_in_history($conn, $user_id, 'VSO_FIELD');
	} elseif ($motels == 3) {
		$event = "<span style='padding-top: 0;' class='ev_center green'>Congratulations, you bought all motels and own the village!</span>".$btn_new_game;
		$total_games += 1;
		$victories += 1;
		clear_in_progress($conn, $user_id);
		hide_btns();
		add_in_history($conn, $user_id, 'ALL_MOTELS');
	} elseif ($money <= 0) {
		$event = '<span class="ev_center red">Game over, you don\'t have more coins!</span>'.$btn_new_game;
		$total_games += 1;
		$defeats += 1;
		clear_in_progress($conn, $user_id);
		hide_btns();
		add_in_history($conn, $user_id, 'NO_COINS');
	} else if ($moves == 0) {
		$event = '<span class="ev_center red">Game over, you don\'t have more moves!</span>'.$btn_new_game;
		$total_games += 1;
		$defeats += 1;
		clear_in_progress($conn, $user_id);
		hide_btns();
		add_in_history($conn, $user_id, 'NO_MOVES');
	}
	$_SESSION['event'] = $event;
	$_SESSION['money'] = $money;
	$_SESSION['motels'] = $motels;
	$_SESSION['moves'] = $moves;

	$update_user_info = "UPDATE users_info SET total_games = $total_games, victories = $victories, defeats = $defeats WHERE user_id = '$user_id'";
	$update_result = mysqli_query($conn, $update_user_info);
}
?>
<div class="low_height">The HEIGHT of the window is INSUFFICIENT!<br>*You can press F11 to set full screen, it hardly ever helps.</div>
<header>
	<div class="top_left_nav col-lg-3 col-md-4 col-sm-5 col-8">
		<div class="top_left_game d-inline-block">iT-Village/</div>
		<div class="top_left_player d-inline-block"><?=$username?></div>
	</div>
	<div class="top_right_nav col-lg-3 col-md-4 col-sm-5 col-4">
		<form action="" method="post">
			<input class="btn btn_quit" type="submit" name="btn_quit" value="Quit">
			<?php
			if (isset($_POST['btn_quit'])) {
				session_destroy();
				header("Location: index.php");
			}?>
			<input class="btn btn_save" type="submit" name="btn_save" value="Save" <?php if(isset($_SESSION['hide_btn_save'])) { echo ' disabled'; }?>>
			<?php
			if (isset($_POST['btn_save'])) {
				$save_query = "UPDATE in_progress SET in_progress = 'YES', money = '$money', moves = '$moves', field = '$field', motels = '$motels' WHERE user_id = '$user_id'";
				$save_result = mysqli_query($conn, $save_query);

				$_SESSION['event'] = "<span style='font-size: 18.5px;' class='green'>The game is saved successfully!</span><br><span class='ev_center'>*If you continue and end the game, the saved data will DELETE!</span>";
			}?>
		</form>
	</div>
</header>
<div class="game_zn col-lg-12 col-md-12">
	<div class="game_pnl mx-auto"><?php
		$path = "resources/images/table_images/";
		print_table($field, $path); ?>
	</div>
</div>
<div class="bar_event_dice_zn col-md-12">
	<div class="bar_zn col-lg-6 col-md-9 col-sm-12 col-12 col-xs-12">
		<div class="bar_pnl col-lg-11 col-md-11 col-sm-11 col-12 mx-auto">
			<div class="bar_container">
				<div class="bar_label">Moves</div>
				<div class="bar_value"><?=$_SESSION['moves']?></div>
			</div><div class="bar_container">
				<div class="bar_label">Coins</div>
				<div class="bar_value"><?=$_SESSION['money']?></div>
			</div><div class="bar_container">	
				<div class="bar_label">Motels</div>
				<div class="bar_value"><?=$_SESSION['motels']?> - 3</div>
			</div>
		</div>
	</div>
	<div class="event_zn col-lg-6 col-md-9 col-sm-9 col-12">
		<div class="event_pnl col-lg-11 col-md-11 col-sm-11 col-12 mx-auto"><?=$_SESSION['event']?></div>
	</div>
	<div class="dice_zn col-lg-3 col-md-3 col-sm-3 col-12">
		<div class="dice_pnl col-md-12 col-sm-12 col-7 mx-auto">
			<form action="" method="post">
				<input class="btn btn_throw_dice d-block mx-auto" type="submit" name="btn_throw_dice" value="THROW THE DICE" <?php if(isset($_SESSION['hide_btn_throw'])) { echo ' disabled'; }?>>
			</form>
			<?php
			if (isset($_SESSION['dice_num'])) {
				$path = "resources/images/dice_images/dice_".$_SESSION['dice_num'].".gif";
				echo "<img class='img_dice d-block mx-auto' src='$path' alt='$path'>";
			} else {
				echo "<img style='opacity: 0;' class='img_dice d-block mx-auto' src='resources/images/dice_images/dice_1.gif' alt='$path'>";
			}?>
		</div>
	</div>
</div>
<div class="rating_zn col-lg-3 col-md-12 col-12">
	<div class="rating_pnl col-lg-12 col-md-8 col-sm-10 col-10 mx-auto">
		<div class="rating_top_div">
			<div class="rating_labels">
				<div class="rating_top_no">No</div><div class="rating_top_player">Player</div><div class="rating_top_t_games">Total</div><div class="rating_top_vict">Vict</div>
			</div>
		</div>
		<div class="sort_by_text">*Sort by Vict (victories)</div>
		<?php print_rating_rows($conn, $username); ?>
	</div>
</div>
<?php include "resources/includes/footer.php"; ?>