<?php
	session_start();
	require_once "./functions/database_functions.php";
	if(isset($_GET['typeid']))
	{
		$typeid = $_GET['typeid'];
	} 
	else 
	{
		echo "Wrong query! Check again!";
		exit;
	}

	$conn = db_connect();
	$typename = gettypeName($conn, $typeid);

	$query = "SELECT med_serial, med_name, med_image FROM medicines WHERE type_id = '$typeid'";
	$result = mysqli_query($conn, $query);
	if(!$result)
	{
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0)
	{
		echo "Empty medicines ! Please wait until new Medicines coming!";
		exit;
	}

	$title = "Medicines Per type";
	require "./template/header.php";
?>
	<p class="lead"><a href="type_list.php">Types</a> > <?php echo $typename; ?></p>
	<?php while($row = mysqli_fetch_assoc($result))
	{
?>
	<div class="row">
		<div class="col-md-3">
			<img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['med_image'];?>">
		</div>
		<div class="col-md-7">
			<h4><?php echo $row['med_name'];?></h4>
			<a href="medicine.php?medserial=<?php echo $row['med_serial'];?>" class="btn btn-primary">Get Details</a>
		</div>
	</div>
	<br>
<?php
	}
	if(isset($conn)) { mysqli_close($conn);}
	require "./template/footer.php";
?>