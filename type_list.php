<div  style="  background: url('https://www.healio.com/~/media/slack-news/stock-images/fm_im/p/pills_shutterstock.jpg') no-repeat center center;background-size: cover;height:110%;" >
<?php
	session_start();
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$query = "SELECT * FROM type ORDER BY type_name";
	$result = mysqli_query($conn, $query);
	if(!$result)
	{
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0)
	{
		echo "Empty type ! Something wrong! check again";
		exit;
	}

	$title = "List Of Types";
	require "./template/header.php";
?>
	<p class="lead">List of Types</p>
	<ul>
	<?php 
		while($row = mysqli_fetch_assoc($result))
		{
			$count = 0; 
			$query = "SELECT type_id FROM medicines";
			$result2 = mysqli_query($conn, $query);
			if(!$result2)
            {
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($useInmed = mysqli_fetch_assoc($result2))
			{
				if($useInmed['type_id'] == $row['type_id'])
				{
					$count++;
				}
			}
	?>
		<h4><li>
			<span class="badge"><?php echo $count; ?></span>
		    <a href="medPertype.php?typeid=<?php echo $row['type_id']; ?>"><?php echo $row['type_name']; ?></a>
			
		</li></h4>
	<?php } ?>
	<h4><li>
			<a href="medicines.php">List full of Medicines</a>
		</li></h4>
	</ul>
<?php
	mysqli_close($conn);
	require "./template/footer.php";
?>