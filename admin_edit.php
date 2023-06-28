<?php
	session_start();
	if((!isset($_SESSION['manager'])  && !isset($_SESSION['expert'])))
	{
		header("Location:index.php");
	}
	$title = "Edit Medicine";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['medserial']))
	{
		$med_serial = $_GET['medserial'];
	} 
	else 
	{
		echo "Empty query!";
		exit;
	}

	if(!isset($med_serial))
	{
		echo "Empty serial no! check again!";
		exit;
	}


	$query = "SELECT * FROM medicines WHERE med_serial = '$med_serial'";
	$result = mysqli_query($conn, $query);
	if(!$result)
	{
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
	<form method="post" action="edit_med.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Serial no</th>
				<td><input type="number" name="serial" value="<?php echo $row['med_serial'];?>" readOnly="true"></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><input type="text" name="name" value="<?php echo $row['med_name'];?>" required></td>
			</tr>
			<tr>
				<th>Manufacturer</th>
				<td><input type="text" name="manufacturer" value="<?php echo $row['med_manufacturer'];?>" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" cols="40" rows="5"><?php echo $row['med_descr'];?></textarea>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="price" value="<?php echo $row['med_price'];?>" required></td>
			</tr>
			<tr>
				<th>Used for</th>
				<td><input type="text" name="usefor" value="<?php echo getuseName($conn, $row['used_for_id']); ?>" required></td>
			</tr>
			<tr>
				<th>Type</th>
				<td><input type="text" name="type" value="<?php echo gettypeName($conn, $row['type_id']); ?>" required></td>
			</tr>
		</table>
		<input type="submit" name="save_change" value="Change" class="btn btn-primary">
		<a href="admin_med.php" class="btn btn-default">Cancel</a>
	</form>
	<br/>
	<a href="admin_med.php" class="btn btn-success">Confirm</a>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require "./template/footer.php"
?>