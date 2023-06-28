<?php
	session_start();
	require_once "./functions/database_functions.php";
	if(isset($_GET['useforid']))
	{
		$useforid = $_GET['useforid'];
	} 
	else 
	{
		echo "Wrong query! Check again!";
		exit;
	}

	$conn = db_connect();
	$medName = getuseName($conn, $useforid);

	$query = "SELECT med_serial, med_name, med_image FROM medicines WHERE used_for_id = '$useforid'";
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

	$name = "Medicines Per Use case";
	require "./template/header.php";
?>
	<p class="lead"><a href="use_for_list.php">Used for</a> > <?php echo $medName; ?></p>
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