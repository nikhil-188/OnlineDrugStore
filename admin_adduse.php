<?php
	session_start();
	if((!isset($_SESSION['manager'])  && !isset($_SESSION['expert'])))
	{
		header("Location:index.php");
	}
	$title = "Add new Use";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add']))
    {
		$name = trim($_POST['name']);
		$name = mysqli_real_escape_string($conn, $name);
		
		// find use and return useid
		// if use is not in db, create new
		$finduse = "SELECT * FROM used_for WHERE used_for_name = '$name'";
		$findResult = mysqli_query($conn, $finduse);
		if(mysqli_num_rows($findResult)==0)
		{
			$insertuse = "INSERT INTO used_for(used_for_name) VALUES ('$name')";
			$insertResult = mysqli_query($conn, $insertuse);
			if(!$insertResult)
			{
				echo "Can't add new Use " . mysqli_error($conn);
				exit;
			}
			header("Location: admin_used_for.php");
		} 
		else 
		{
            echo '<p style="color:red;">This use already exists</p>';
		}
	}
?>
	<form method="post" action="admin_adduse.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Name</th>
				<td><input type="text" name="name"></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Add new use" class="btn btn-primary">
		<a href="admin_used_for.php" class="btn btn-default">Cancel</a>
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>