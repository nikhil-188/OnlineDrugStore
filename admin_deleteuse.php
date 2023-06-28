<?php
	$useforid = $_GET['useforid'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE FROM used_for WHERE used_for_id = '$useforid'";
	$result = mysqli_query($conn, $query);
	if(!$result)
	{
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_used_for.php");
?>