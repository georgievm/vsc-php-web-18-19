<?php
ob_start();
$title = "Do you want to continue the last game?";
include "resources/includes/header.php";
session_start();
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
?>
<a class="game_name d-block mx-auto text-center col-lg-4 col-md-5 col-sm-6 col-8" href="index.php">iT-Village</a>

<div class="pnl col-lg-5 col-md-5 col-sm-7 col-10 mx-auto">
	<a class="btn-link back_arrow" href="index.php">&#10094;</a>
	<div class="pnl_heading pnl_con_heading d-block mx-auto"><span style="color: #00b300;"><?=$username?></span>, <br>Do you want to continue the last game?</div>
	<form action="" method="post">
		<div class="form-group mx-auto">
			<input class="btn btn_con_yes d-block mx-auto" type="submit" name="yes" value="YES">
		</div>
		<div class="form-group mx-auto">
			<input class="btn btn_con_no d-block mx-auto" type="submit" name="no" value="NO (Start a new game)">
		</div>
	</form>
	<div class="pnl_bottom_text text-center">iT-Village, 2019</div>
</div>

<?php
if (isset($_POST['yes'])) {
	$read_values = "SELECT money, moves, field, motels FROM in_progress WHERE user_id = '$user_id'";
	$result = mysqli_query($conn, $read_values);
	$row = mysqli_fetch_assoc($result);

	$_SESSION['money'] = $row['money'];
	$_SESSION['field'] = $row['field'];
	$_SESSION['moves'] = $row['moves'];
	$_SESSION['motels'] = $row['motels'];
	$_SESSION['vso_field'] = 0;

	$_SESSION['event'] = '<span class="ev_center"><span class="green">This is the last game you don\'t finish.</span><br>Let\'s end it this time!</span>';

	header('Location: it-village.php');
} elseif (isset($_POST['no'])) {
	$update_values = "UPDATE in_progress SET in_progress = 'NO', money = NULL, moves = NULL, field = NULL, motels = NULL WHERE user_id = '$user_id'";
	$result = mysqli_query($conn, $update_values);

	$field = rand(1, 16);
	$moves = rand(7, 15);
	$_SESSION['money'] = 50;
	$_SESSION['field'] = $field;
	$_SESSION['moves'] = $moves;
	$_SESSION['motels'] = 0;
	$_SESSION['vso_field'] = 0;

	$_SESSION['event'] = "<span style='font-size: 21px;' class='event_center_text'>Welcome again, <span class='green'>$username</span>!</span><br><span style='font-size: 21px;' class='event_center_text'>Moves - <span class='green'>$moves</span>, Initial field - <span class='green'>$field</span>, ".'<span class="green">Let\'s play!</span></span>';

	header('Location: it-village.php');
}
include 'resources/includes/footer.php';
?>