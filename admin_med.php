<?php
	session_start();
	if((!isset($_SESSION['manager'])  && !isset($_SESSION['expert'])))
	{
		header("Location:index.php");
	}
	$title = "List of medicines";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>	
	<div>

	<a href="admin_signout.php" class="btn btn-danger"><span class="glyphicon glyphicon-off"></span>&nbsp;Logout</a>
	<a href="admin_used_for.php" class="btn btn-primary"><span class="glyphicon glyphicon-paperclip"></span>&nbsp;Uses</a>
	<a href="admin_types.php" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Types</a>
	<?php
	if (isset($_SESSION['manager']) && $_SESSION['manager']==true)
	{
		echo '<a class="btn btn-primary" href="admin_add.php"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New Medicine</a>';
	}
	?>
	</div>
	
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>Serial number</th>
			<th>Medicine name</th>
			<th>Manufacturer</th>
			<th>Image</th>
			<th>Description</th>
			<th>Price</th>
			<th>Used for</th>
			<th>Type</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result))
		{ 
			?>
		<tr>
			<td><?php echo $row['med_serial']; ?></td>
			<td><?php echo $row['med_name']; ?></td>
			<td><?php echo $row['med_manufacturer']; ?></td>
			<td><?php echo $row['med_image']; ?></td>
			<td><?php echo $row['med_descr']; ?></td>
			<td><?php echo $row['med_price']; ?></td>
			<td><?php echo getuseName($conn, $row['used_for_id']); ?></td>
			<td><?php echo gettypeName($conn, $row['type_id']); ?></td>
			<?php
				if( isset($_SESSION['expert']) && $_SESSION['expert']==true)
				{
					echo '<td><a href="admin_edit.php?medserial=';
					echo $row['med_serial'];
					echo'"><span class="glyphicon glyphicon-pencil"></span>Edit</a></td>';
				}
				else if (isset($_SESSION['manager']) && $_SESSION['manager']==true)
				{
					//for deleting medicine
					echo '<td><a href="admin_delete.php?medserial=';
					echo $row['med_serial']; 
					echo '"><span class="glyphicon glyphicon-trash"></span>Delete</a></td>';
				}
			?>

		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) 
	{
		mysqli_close($conn);
	}
	require_once "./template/footer.php";
?>