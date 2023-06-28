<?php
	session_start();
	if((!isset($_SESSION['manager'])  && !isset($_SESSION['expert'])))
	{
		header("Location:index.php");
	}
	$title = "Add new Medicine";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add']))
	{
		$serial = trim($_POST['serial']);
		$serial = mysqli_real_escape_string($conn, $serial);
		
		$title = trim($_POST['title']);
		$title = mysqli_real_escape_string($conn, $title);

		$manufacturer = trim($_POST['manufacturer']);
		$manufacturer = mysqli_real_escape_string($conn, $manufacturer);
		
		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($conn, $descr);
		
		$price = floatval(trim($_POST['price']));
		$price = mysqli_real_escape_string($conn, $price);
		
		$use = trim($_POST['use_for']);
		$use = mysqli_real_escape_string($conn, $use);
		
		$type = trim($_POST['type']);
		$type = mysqli_real_escape_string($conn, $type);

		if(isset($_FILES['image']) && $_FILES['image']['name'] != "")
		{
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}

		//add in one use, if no use create one in db
		$finduse = "SELECT * FROM used_for WHERE used_for_name = '$use'";
		$findResult = mysqli_query($conn, $finduse);
		if(mysqli_num_rows($findResult)==0)
		{
			$insertuse = "INSERT INTO used_for(used_for_name) VALUES ('$use')";
			$insertResult = mysqli_query($conn, $insertuse);
			if(!$insertResult)
            {
				echo "Can't add new Uses " . mysqli_error($conn);
				exit;
			}
			$used_for_id = mysqli_insert_id($conn);
		} 
		else 
		{
			$row = mysqli_fetch_assoc($findResult);
			$used_for_id = $row['used_for_id'];
		}
		//add in one type, if no type create one in db
		$findtype = "SELECT * FROM type WHERE type_name = '$type'";
		$findResult = mysqli_query($conn, $findtype);
		if(mysqli_num_rows($findResult)==0)
		{
			$inserttype = "INSERT INTO type(type_name) VALUES ('$type')";
			$insertResult = mysqli_query($conn, $inserttype);
			if(!$insertResult){
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

		//data in medicines table
		$query = "INSERT INTO medicines VALUES ('" . $serial . "', '" . $title . "', '" . $manufacturer . "', '" . $image . "', '" . $descr . "', '" . $price . "', '" . $used_for_id . "', '" . $type_id . "')";
		$result = mysqli_query($conn, $query);
		if(!$result)
		{
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} 
		else 
		{
			header("Location: admin_med.php");
		}
	}
?>
	<form method="post" action="admin_add.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Serial no</th>
				<td><input type="text" name="serial"></td>
			</tr>
			<tr>
				<th>Medicine name</th>
				<td><input type="text" name="title" required></td>
			</tr>
			<tr>
				<th>Manufacturer</th>
				<td><input type="text" name="manufacturer" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" cols="40" rows="5"></textarea></td>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="price" required></td>
			</tr>
				<th>Used for</th>
				<td><input type="text" name="use_for" required></td>
			</tr>
			<tr>
				<th>Types</th>
				<td><input type="text" name="type" required></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Add new Medicine" class="btn btn-primary">
		<a href="admin_med.php" class="btn btn-default">Cancel</a>
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>