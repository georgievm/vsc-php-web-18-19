<?php

$conn = mysqli_connect('localhost', 'root', '', 'road');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$selected = $_POST['fuel'] . '_price';

$sql = "SELECT * FROM gas_stations WHERE $selected IS NOT NULL";
$result = mysqli_query($conn, $sql);

$response = '';

while($row = mysqli_fetch_array($result)) {
	$response .= $row['name'] . ', ';
}

if ($response) {
	echo $response;
} else {
	echo '<div class="text-center text-warning">' . '*No available.' . '</div>';
}

mysqli_close($conn);
?>
