<?php
include 'db_conn.php';
$id = $_GET['id'];

$delete_q = "DELETE FROM country WHERE country_id = $id";
$result = mysqli_query($conn, $delete_q);

if ($result) {
	header('Location: read.php');
} else {
	echo mysql_error($conn);
}