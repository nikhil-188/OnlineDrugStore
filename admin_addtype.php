<?php
	session_start();
	if((!isset($_SESSION['manager'])  && !isset($_SESSION['expert'])))
    {
		header("Location:index.php");
	}
	$title = "Add new type";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();
	if(isset($_POST['add']))
    {
		$name = trim($_POST['name']);
		$name = mysqli_real_escape_string($conn, $name);
		
		$findtype = "SELECT * FROM type WHERE type_name = '$name'";
		$findResult = mysqli_query($conn, $findtype);
		//create new type 
		if(mysqli_num_rows($findResult)==0)
        {
			$inserttype = "INSERT INTO type(type_name) VALUES ('$name')";
			$insertResult = mysqli_query($conn, $inserttype);
			if(!$insertResult)
            {
				echo "Can't add new type " . mysqli_error($conn);
				exit;
			}
			header("Location: admin_types.php");
		} 
        else 
        {
            echo '<p style="color:red;">Type already exists</p>';
		}
	}
?>
	<form method="post" action="admin_addtype.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Name</th>
				<td><input type="text" name="name"></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Add new Type" class="btn btn-primary">
		<a href="admin_types.php" class="btn btn-default">Cancel</a> 
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>