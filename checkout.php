<?php
	session_start();
	require_once "./functions/database_functions.php";
	$title = "Checking out";
	require "./template/header.php";	
	if(!isset($_SESSION['user']))
	{
		echo '<div class="alert alert-danger" role="alert">
		You Need to <a href="Signin.php">Signin</a> First! 
	  </div>';
	}
	else if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart'])))
	{
?>
	<table class="table">
		<tr>
			<th>Item</th>
			<th>Price</th>
	    	<th>Quantity</th>
	    	<th>Total</th>
	    </tr>
	    	<?php
			    foreach($_SESSION['cart'] as $serial => $qty)
				{
					$conn = db_connect();
					$med = mysqli_fetch_assoc(getmedByserial($conn, $serial));
			?>
		<tr>
			<td><?php echo $med['med_name'] . " by " . $med['med_manufacturer']; ?></td>
			<td><?php echo "Rs " . $med['med_price']; ?></td>
			<td><?php echo $qty; ?></td>
			<td><?php echo "Rs" . $qty * $med['med_price']; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "Rs " . $_SESSION['total_price']; ?></th>
		</tr>
	</table>
	<?php 
	if(isset($_SESSION['user']))
	{
		echo '
            <form method="post" action="purchase.php" class="form-horizontal">
			<div class="form-group" style="margin-left:0px">
				<input type="submit" name="submit" value="Purchase" class="btn btn-primary" >
				<a href="cart.php" class="btn btn-primary">Edit Cart</a> 
			</div>
		</form>
		<p class="lead">Please press Purchase to confirm your purchase, or Edit Cart to add or remove items.</p>';
		}
	} 
	else 
	{
		echo "<h3 class=\"text-warning\">Your cart is empty! Please make sure you add some medicines in it!</h3>";
	}
	if(isset($conn))
	{ 
		mysqli_close($conn); 
	}
	require_once "./template/footer.php";
?>