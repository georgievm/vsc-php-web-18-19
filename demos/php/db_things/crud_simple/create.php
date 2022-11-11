<?php
include 'db_connect.php';
?>
<style>
	input[type=text] {
		margin: 1%;
		width: 20%;
	}
	input[type=submit] {
		margin-left: 8%;
	}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>CREATE</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset="utf-8">
</head>
<body>
	<h1>Add new country</h1>
	<form action="#" method="post">
		<input class="form-control" type="text" name="country" placeholder="Country name">
		<input class="form-control" type="text" name="iso_code_2" placeholder="ISO CODE 2">
		<input class="form-control" type="text" name="iso_code_3" placeholder="ISO CODE 3">
		<input class="btn btn-primary btn-md" type="submit" name="submit" value="Create">
	</form>
	<?php
	if (isset($_POST['submit'])) {
		$country = $_POST['country'];
		$iso_code_2 = $_POST['iso_code_2'];
		$iso_code_3 = $_POST['iso_code_3'];

		if (!empty($country) && !empty($iso_code_2) && !empty($iso_code_3)) {
			$q_create = "INSERT INTO `country`(`name`, `iso_code_2`, `iso_code_3`) VALUES ('$country', '$iso_code_2', '$iso_code_3')";

			$result = mysqli_query($conn, $q_create);

			if ($result) {
				// echo '<h3>'.'Success!'.'</h3>';
				header('Location: read.php');
			} else {
				echo '<h3>'.'Please, try again later!'.'</h3>';
				echo mysql_error($conn);
			}
		} else {
			echo '<h3>'.'Empty field(s)!'.'</h3>';
		}
	}
	?>
</body>
</html>