<?php
$conn = mysqli_connect('localhost', 'root', '', 'seminar');

if (!$conn) {
	die("Connection failed:".mysqli_connect_error());
} else {
	$names = $_POST['names'];
	$addresses = $_POST['addresses'];
	$ids = [];
	$response = "";

	for ($i = 0; $i < count($names); $i++) {
		$query = "INSERT INTO participants(name, address) VALUES ('$names[$i]', '$addresses[$i]')";
		$result = mysqli_query($conn, $query);
		array_push($ids, mysqli_insert_id($conn));
	}
	if (count($ids) == 1) {
		$response .= "The No of your recording is: ".$ids[0];
	} else {
		$response .= "The No of your recordings are: ";
		for ($j = 0; $j < count($ids); $j++) {
			$response .= $ids[$j];
			if ($j != (count($ids)-1)) {
				$response .= ", ";
			}
		}
	}
	echo $response;
}