<?php 
include 'db_connect.php';
$id = $_GET['id'];
$read_q = "SELECT * FROM country WHERE country_id = $id";
$result = mysqli_query($conn, $read_q);

$row = mysqli_fetch_assoc($result);

if ($row) {
	$country_name = $row['name'];
	$iso_code_2 = $row['iso_code_2'];
	$iso_code_3 = $row['iso_code_3'];	
} else {
	$country_name = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="country" value="<?= $country_name ?>">
		<input type="text" name="iso_code_2" value="<?= $iso_code_2 ?>">
		<input type="text" name="iso_code_3" value= "<?= $iso_code_3 ?>">
		<input type="hidden" name="id" value= "<?= $id ?>">
		<input type="submit" name="submit" value="Create">
	</form>
	<?php 
if(isset($_POST['submit'])){
	var_dump($_POST);
	$id 		= $_POST['id'];
	$country 	= $_POST['country'];
	$iso_code_2 = $_POST['iso_code_2'];
	$iso_code_3 = $_POST['iso_code_3'];
	$update_q = "UPDATE `country` SET `name`='$country',`iso_code_2`='$iso_code_2',`iso_code_3`='$iso_code_3' WHERE country_id=$id";
	$result = mysqli_query($conn, $update_q);
	if($result){
		// echo "Success!";
		header('Location: read.php');
	} else {
		echo mysqli_error($conn);
		// echo "Please, try again later!";
	}
}
?>
</body>
</html>