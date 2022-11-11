<?php
ob_start();
$title = "iT-Village | Sign up";
include 'resources/includes/header.php';
include_once 'resources/includes/functions.php';
?>
<a class="game_name d-block mx-auto text-center col-lg-4 col-md-5 col-sm-6 col-8" href="index.php">iT-Village</a>

<div class="pnl col-lg-4 col-md-5 col-sm-8 col-10 mx-auto">
	<a class="btn-link back_arrow" href="index.php">&#10094;</a>
	<div class="pnl_heading d-block mx-auto">Sign up</div>
	<img class="img_avatar d-block mx-auto" src="resources/images/avatar_2.png">
	<?php
		if (isset($_POST['sign_up'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$hash_password = sha1($_POST['password']);

			if (!empty($username) && !empty($password)) {
				$read_query = "SELECT username, password FROM users_info WHERE 1";
				$users_and_passwords = mysqli_query($conn, $read_query);
				
				$same_data = 0;
				$occupied_username = 0;
				$occupied_password = 0;
				
				while ($row = mysqli_fetch_assoc($users_and_passwords)) {
					if ($row['username'] == $username && $row['password'] == $hash_password) {
						$same_data++;
					} else {
						if ($row['username'] == $username) {
							$occupied_username++;
						} elseif ($row['password'] == $hash_password) {
							$occupied_password++;
						}
					}
				}
				if (mb_strlen($username) != strlen($username)) {
					$error = "Please use ENGLISH letters!";
				} elseif (mb_strlen($password) != strlen($password)) {
					$error = "Please use ENGLISH letters!";
				} elseif ($same_data != 0) {
					$error = "There is already such a USER!";
				} elseif ($occupied_username != 0 && $occupied_password == 0) {
					$error = "This USERNAME already exists!";
				} elseif (strlen($username) < 7 || strlen($username) > 17) {
					$error = "The USERNAME must be 7-17 symbols!";
				} elseif (strlen($password) < 7 || strlen($password) > 17) {
					$error = "The PASSWORD must be 7-17 symbols!";
				} else {
					$insert_1 = "INSERT INTO users_info(username, password) VALUES ('$username', '$hash_password')";
					$result = mysqli_query($conn, $insert_1);

					$read_id = "SELECT user_id FROM users_info WHERE username = '$username'";
					$user_id = (mysqli_fetch_assoc(mysqli_query($conn, $read_id)))['user_id'];

					$insert_2 = "INSERT INTO in_progress (user_id) VALUES ('$user_id')";
					$result = mysqli_query($conn, $insert_2);

					session_start();
					$_SESSION['user_id'] = $user_id;
					$_SESSION['username'] = $username;
					$_SESSION['money'] = 50;
					$moves = rand(7, 15);
					$field = rand(1, 16);
					$_SESSION['moves'] = $moves;
					$_SESSION['field'] = $field;
					$_SESSION['motels'] = 0;
					$_SESSION['vso_field'] = 0;

					$_SESSION['event'] = "<span style='font-size: 20px; margin-bottom: 8px;' class='green d-inline-block'>Welcome to iT-Village, $username!</span>
					<span style='font-size: 16px;'><br>
					<span class='d-block'>&#8226; You always start the game with 50 coins, some random moves (<span class='green'>$moves</span>) and random initial field (<span class='green'>$field</span>) which you start from.<br>
					<span style='margin-top: 10px;' class='underline d-inline-block'>If you save the game, these values will be recovered on the next time you play!</span></span><br>
					<span class='d-block'>&#8226; Do not forget to read the text in the event window here and to keep eye on the board in front of you, so you will learn more about what it is going on!</span><br>
					<span class='d-block'>&#8226; Now press the button to the right to throw the dice and play as much as you want!</span></span>";

					header('Location: it-village.php');
				}
			} else {
				$error = "Empty field(s)!";
			}
		}
	?>
	<form action="" method="post">
		<div class="form-group mx-auto">
			<label class="form_label" for="username">Username</label>
			<input class="form-control mx-auto" type="text" id="username" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" placeholder="Username">
		</div>
		<div class="form-group mx-auto">
			<label class="form_label" for="password">Password</label>
			<input class="form-control mx-auto" type="password" id="password" name="password" placeholder="Password">
			<?php if(isset($error)) { echo '<div class="error">'.$error.'</div>'; }?>
		</div>
		<input class="btn btn_log d-block mx-auto" type="submit" name="sign_up" value="Sign up">
		<div class="pnl_bottom_text text-center">
			<span class="d-inline-block pnl_bottom_text">The registration is <span class="font-weight-bold" style="color: #00b300;" class="bold underline">FREE</span> and will always be!</span>
		</div>
	</form>
</div>
<?php include 'resources/includes/footer.php'; ?>