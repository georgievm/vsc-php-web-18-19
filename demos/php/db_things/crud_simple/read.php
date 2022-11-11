<?php
include 'db_connect.php';

$q_read = "SELECT * FROM `country` WHERE 1";
$result = mysqli_query($conn, $q_read);
?>
<!DOCTYPE html>
<html>
<head>
	<title>READ</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset="utf-8">
</head>
<body>
	<?php
	if (mysqli_num_rows($result) > 0) {
	?>
		<a href="create.php" style="margin: 2%;" class="btn btn-primary">Add new country</a>	
		<table border="1" class="table">
			<tr>
				<td>#</td>
				<td>name</td>
				<td>iso_code_2</td>
				<td>iso_code_3</td>
				<td>***</td>
				<td>***</td>
			</tr>
			<?php
			while ($row = mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?=$row['country_id']?></td>
					<td><?=$row['name']?></td>
					<td><?=$row['iso_code_2']?></td>
					<td><?=$row['iso_code_3']?></td>
					<td><a href="update.php?id=<?=$row['country_id']?>">Update</a></td>
					<td><a href="delete.php?id=<?=$row['country_id']?>">Delete</a></td>
				</tr>
			<?php
			}
			?>
		</table>
	<?php
	}
	?>
</body>
</html>