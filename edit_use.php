<?php	
	// if save change happen
	if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}

	$usefor = trim($_POST['name']);
	$id = trim($_POST['id']);

    require_once("./functions/database_functions.php");
	$conn = db_connect();


	$query = "UPDATE used_for SET  
	used_for_name = '$usefor' where used_for_id='$id'";
	
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_used_for.php?medserial=$serail");
	}
?>