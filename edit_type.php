<?php	
	if(!isset($_POST['save_change']))
	{
		echo "Something wrong!";
		exit;
	}

	$type = trim($_POST['name']);
	$id = trim($_POST['id']);

    require_once("./functions/database_functions.php");
	$conn = db_connect();

	$query = "UPDATE type SET type_name = '$type' where type_id='$id'";
	
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_types.php?medserial=$serial");
	}
?>