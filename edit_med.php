<?php	
	if(!isset($_POST['save_change']))
    {
		echo "Something wrong!";
		exit;
	}
	$serial = trim($_POST['serial']);
	$name = trim($_POST['name']);
	$manufacturer = trim($_POST['manufacturer']);
	$descr = trim($_POST['descr']);
	$price = floatval(trim($_POST['price']));
	$usefor = trim($_POST['usefor']);
	$type = trim($_POST['type']);

	if(isset($_FILES['image']) && $_FILES['image']['name'] != "")
	{
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}
	require_once("./functions/database_functions.php");
	$conn = db_connect();

// find use and return usefor
		// if use is not in db, create new
		$finduse = "SELECT * FROM used_for WHERE used_for_name = '$usefor'";
		$findResult = mysqli_query($conn, $finduse);
		if(mysqli_num_rows($findResult)==0)
        {
			// insert into used_for table and return usefor
			$insertuse = "INSERT INTO used_for(used_for_name) VALUES ('$usefor')";
			$insertResult = mysqli_query($conn, $insertuse);
			if(!$insertResult){
				echo "Can't add new Use " . mysqli_error($conn);
				exit;
			}
			$used_for_id = mysqli_insert_id($conn);
		} 
		else 
		{
			$row = mysqli_fetch_assoc($findResult);
			$used_for_id = $row['used_for_id'];
		}
// find type and return type_id
		// if type is not in db, create new
		$findtype = "SELECT * FROM type WHERE type_name = '$type'";
		$findResult = mysqli_query($conn, $findtype);
		if(mysqli_num_rows($findResult)==0)
        {
			// insert into type table and return id
			$inserttype = "INSERT INTO type(type_name) VALUES ('$type')";
			$insertResult = mysqli_query($conn, $inserttype);
			if(!$insertResult)
            {
				echo "Can't add new Type " . mysqli_error($conn);
				exit;
			}
			$type_id = mysqli_insert_id($conn);
		} 
		else 
		{
			$row = mysqli_fetch_assoc($findResult);
			$type_id = $row['type_id'];
		}


	$query = "UPDATE medicines SET  
	med_name = '$name', 
	med_manufacturer = '$manufacturer', 
	med_descr = '$descr', 
	med_price = '$price',
	type_id = '$type_id',
	used_for_id = '$used_for_id'";
	if(isset($image))
    {
		$query .= ", med_image='$image' WHERE med_serial = '$serial'";
	} 
	else 
	{
		$query .= " WHERE med_serial = '$serial'";
	}

	$result = mysqli_query($conn, $query);
	if(!$result)
    {
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_edit.php?medserial=$serial");
	}
?>