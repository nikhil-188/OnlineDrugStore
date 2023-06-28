<?php
	$typeid = $_GET['typeid'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE FROM type WHERE type_id = '$typeid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_types.php");
?>