<?php
	$med_serial = $_GET['medserial'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE FROM medicines WHERE med_serial = '$med_serial'";
	$result = mysqli_query($conn, $query);
	if(!$result)
    {
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_med.php");
?>