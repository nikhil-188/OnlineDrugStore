<title>Medicine</title>
<?php
  session_start();
  $med_serial = $_GET['medserial'];
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $query = "SELECT * FROM medicines WHERE med_serial = '$med_serial'";
  $result = mysqli_query($conn, $query);
  if(!$result)
  {
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row)
  {
    echo "Empty medicine";
    exit;
  }

  $name = $row['med_name'];
  require "./template/header.php";
?>
      <p class="lead" style="margin: 25px"><a href="medicines.php">Medicines</a> > <?php echo $row['med_name']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['med_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Medicine Description</h4>
          <p><?php echo $row['med_descr']; ?></p>
          <h4>Medicine Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "med_descr" || $key == "med_image" || $key == "used_for_id" || $key == "med_name")
              {
                continue;
              }
              switch($key)
              {
                case "med_serial":
                  $key = "serial no";
                  break;
                case "med_name":
                  $key = "Name";
                  break;
                case "med_manufacturer":
                  $key = "Manufacturer";
                  break;
                case "med_price":
                  $key = "Price";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) 
              {
                mysqli_close($conn); 
              }
            ?>
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="medserial" value="<?php echo $med_serial;?>">
            
            <input type="submit" value="Add to cart" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
<?php
  require "./template/footer.php";
?>