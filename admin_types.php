<?php
	session_start();
	if((!isset($_SESSION['manager'])  && !isset($_SESSION['expert'])))
    {
		header("Location:index.php");
	}
	$title = "List of types";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAlltypes($conn);
?>	
	<div>
	<a href="admin_signout.php" class="btn btn-danger"><span class="glyphicon glyphicon-off"></span>&nbsp;Logout</a>
	<a href="admin_med.php" class="btn btn-primary"><span class="glyphicon glyphicon-book"></span>&nbsp;Medicines</a>
	<a href="admin_used_for.php" class="btn btn-primary"><span class="glyphicon glyphicon-paperclip"></span>&nbsp;Uses</a>
	<?php
	if (isset($_SESSION['manager']) && $_SESSION['manager']==true)
    {
		echo '<a class="btn btn-primary" href="admin_add.php"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Medicine</a>';
	}
	?>
	</div>
	
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>Name</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['type_name']; ?></td>
			<?php
				if( isset($_SESSION['expert']) && $_SESSION['expert']==true)
                {
                    echo '<td><a href="admin_edittypes.php?typeid=';
					echo $row['type_id'];
					echo'"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit</a></td>';
				}
                
                else if (isset($_SESSION['manager']) && $_SESSION['manager']==true)
				{
					echo '<td><a href="admin_deletetypes.php?typeid=';
					echo $row['type_id'];
					echo '"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Delete</a></td>';
				}
			?>
		</tr>
		<?php } ?>
	</table>
    <?php
    if (isset($_SESSION['manager']) && $_SESSION['manager']==true){
		echo '<a class="btn btn-primary" href="admin_addtype.php"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add type</a>';
	}        
    ?>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>