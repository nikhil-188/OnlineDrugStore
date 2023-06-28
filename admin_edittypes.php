<?php
	session_start();
	if((!isset($_SESSION['manager'])  && !isset($_SESSION['expert'])))
	{
		header("Location:index.php");
	}
	$title = "Edit type";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	if(isset($_GET['typeid']))
	{
		$typeid = $_GET['typeid'];
	} 
	else 
	{
		echo "Empty query!";
		exit;
	}

	if(!isset($typeid))
	{
		echo "Empty serial no! check again!";
		exit;
	}
	$query = "SELECT * FROM type WHERE type_id = '$typeid'";
	$result = mysqli_query($conn, $query);
	if(!$result)
	{
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
	<form method="post" action="edit_type.php" enctype="multipart/form-data">
		<table class="table">
        <th>Name</th>
			<tr>
				<td style="display:none"><input type="text" name="id" value="<?php echo $row['type_id'];?>"></td>
				
				<td><input type="text" name="name" value="<?php echo $row['type_name'];?>" required></td>
			</tr>

		</table>
		<input type="submit" name="save_change" value="Change" class="btn btn-primary">
		<a href="admin_types.php" class="btn btn-default">Cancel</a>
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require "./template/footer.php"
?>