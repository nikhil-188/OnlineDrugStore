<?php
	session_start();
	if((!isset($_SESSION['manager'])  && !isset($_SESSION['expert'])))
    {
		header("Location:index.php");
	}
	$title = "Edit Use for";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['useforid']))
    {
		$useforid = $_GET['useforid'];
	} 
    else 
    {
		echo "Empty query!";
		exit;
	}
	if(!isset($useforid))
	{
		echo "Empty serial! check again!";
		exit;
	}

	$query = "SELECT * FROM used_for WHERE used_for_id = '$useforid'";
	$result = mysqli_query($conn, $query);
	if(!$result)
	{
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
	<form method="post" action="edit_use.php" enctype="multipart/form-data">
		<table class="table">
        <th>Name</th>
			<tr>
				<td style="display:none"><input type="text" name="id" value="<?php echo $row['used_for_id'];?>"></td>
				
				<td><input type="text" name="name" value="<?php echo $row['used_for_name'];?>" required></td>
			</tr>

		</table>
		<input type="submit" name="save_change" value="Change" class="btn btn-primary">
		<a href="admin_used_for.php" class="btn btn-default">Cancel</a>
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require "./template/footer.php"
?>