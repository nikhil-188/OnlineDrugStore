<?php
	session_start();
	require_once "./functions/database_functions.php";
	$title = "Purchase";
	require "./template/header.php";
	// connect database
	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
		$customer = getCustomerIdbyEmail($_SESSION['email']);
    ?>
	<table class="table">
		<tr>
			<th>Item</th>
			<th>Price</th>
	    	<th>Quantity</th>
	    	<th>Total</th>
	    </tr>
	    	<?php
			    foreach($_SESSION['cart'] as $serial => $qty){
					$conn = db_connect();
					$med = mysqli_fetch_assoc(getmedBySerial($conn, $serial));
			?>
		<tr>
			<td><?php echo $med['med_name'] . " by " . $med['med_manufacturer']; ?></td>
			<td><?php echo "Rs " . $med['med_price']; ?></td>
			<td><?php echo $qty; ?></td>
			<td><?php echo "Rs " . $qty * $med['med_price']; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "Rs " . $_SESSION['total_price']; ?></th>
		</tr>
		<tr>
			<td>Shipping</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>20.00</td>
		</tr>
		<tr>
			<th>Total Including Shipping</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo "Rs " . ($_SESSION['total_price'] + 20); ?></th>
		</tr>
	</table>
	<br>
	<br>
	<h4 style="margin-left:-20px">Your Inforamtion</h4>
	<br>
	<form method="post" action="process.php" class="form-horizontal">
	<div class="form-group">
        <label for="exampleInputEmail1">Firstname</label>
        <input type="text" class="form-control" value="<?php echo $customer['firstname']?>" name="firstname">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Lastname</label>
        <input type="text" class="form-control" value="<?php echo $customer['lastname']?>" name="lastname">
    </div>

    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" value="<?php echo $customer['address']?>" name="address">
    </div>
    <div class="form-row">
	<div class="form-group col-md-2">
        </div>
        <div class="form-group col-md-4">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo $customer['city']?>">
        </div>
        <div class="form-group col-md-2">
        </div>
        <div class="form-group col-md-4">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip" name="zipcode" value="<?php echo $customer['zipcode']?>">
        </div>
    </div>
	<br>
    <div class="form-group col-md-12" >
        <div class="form-group" >
            <div class="col-lg-10 col-lg-offset-2" style="margin-left:0px">
              	<button type="reset" class="btn btn-default">Cancel</button>
              	<button type="submit" class="btn btn-primary">Purchase</button>
            </div>
        </div>
    </form>
	<p class="lead">Please press Purchase to confirm your purchase, or Cancel  to reset the form .</p>
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some medicines in it!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>