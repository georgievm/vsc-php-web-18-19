<?php
ob_start();
$title = "iT-Village | Log in";
include "resources/includes/header.php";
include "resources/includes/functions.php";
?>
<a class="game_name d-block mx-auto text-center col-lg-4 col-md-5 col-sm-6 col-8" href="index.php">iT-Village</a>

<div class="pnl col-lg-4 col-md-5 col-sm-8 col-10 mx-auto">
	<div class="pnl_heading d-block mx-auto">Log in</div>
	<img class="img_avatar d-block mx-auto" src="resources/images/avatar_1.png">
	<?php
		if (isset($_POST['log_in'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$hash_password = sha1($password);

			if (!empty($username) && !empty($password)) {
				$read_users = "SELECT * FROM users_info WHERE username LIKE '$username' AND password LIKE '$hash_password'";

				if (mysqli_num_rows(mysqli_query($conn, $read_users)) == 1) {
					session_start();
					$_SESSION['username'] = $username;

					$read_user_info = "SELECT in_p.user_id, in_p.in_progress, u.total_games FROM in_progress in_p JOIN users_info u ON in_p.user_id = u.user_id WHERE u.username LIKE '$username'";
					$user_info = mysqli_fetch_assoc(mysqli_query($conn, $read_user_info));

					$_SESSION['user_id'] = $user_info['user_id'];
					$in_progress = $user_info['in_progress'];
					$total_games = $user_info['total_games'];

					if ($in_progress == "YES") {
						header('Location: continue.php');
					} else {
						$field = rand(1, 16);
						$moves = rand(7, 15);
						$_SESSION['money'] = 50;
						$_SESSION['field'] = $field;
						$_SESSION['moves'] = $moves;
						$_SESSION['motels'] = 0;
						$_SESSION['vso_field'] = 0;

						if ($total_games > 0) {
							$_SESSION['event'] = '<span class="ev_center">Welcome again, <span class="green">'.$username.'</span>!<br><span style="padding-top: 15px;" class="ev_center">Moves - <span class="green bold">'.$moves.'</span>, Initial field - <span class="green bold">'.$field.'</span><br><span class="green">Let\'s GO!</span></span></span>';
						} else {
							$_SESSION['event'] = "<span style='font-size: 20px; margin-bottom: 8px;' class='green d-inline-block'>Welcome to iT-Village, $username!</span>
							<span style='font-size: 16px;'><br>
							<span class='d-block'>&#8226; You always start the game with 50 coins, some random moves (<span class='green'>$moves</span>) and random initial field (<span class='green'>$field</span>) which you start from.<br>
							<span style='margin-top: 10px;' class='underline d-inline-block'>If you save the game, these values will be recovered on the next time you play!</span></span><br>
							<span class='d-block'>&#8226; Do not forget to read the text in the event window here and to keep eye on the board in front of you, so you will learn more about what it is going on!</span><br>
							<span class='d-block'>&#8226; Now press the button to the right to throw the dice and play as much as you want!</span></span>";
						}
						header('Location: it-village.php');
					}				
				} else {
					$error = "Invalid data!";
				}
			} else {
				$error = "Empty field(s)!";
			}
		}?>
		<form action="" method="post">
		<div class="form-group mx-auto">
			<label class="form_label" for="username">Username</label>
			<input class="form-control mx-auto" type="text" id="username" name="username" value="<?php if (isset($_POST['username'])) { echo $_POST['username']; }?>" placeholder="Username">
		</div>
		<div class="form-group mx-auto">
			<label class="form_label" for="password">Password</label>
			<input class="form-control mx-auto" type="password" id="password" name="password" placeholder="Password">
			<?php if(isset($error)) { echo '<div class="error">'.$error.'</div>'; }?>
		</div>
		<input class="btn btn_log d-block mx-auto" type="submit" name="log_in" value="Log in">
	</form>
	<div class="pnl_bottom_text text-center">
		<span class="d-inline-block pnl_bottom_text">Don't have an account?</span>
		<a class="btn-link sign_up_link d-inline-block" href="sign_up.php">Sign up now</a>
	</div>
</div>
<?php include 'resources/includes/footer.php'; ?>