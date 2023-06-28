<?php
  session_start();
  $count = 0;
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  if(isset($_POST['name']))
  {
    if(isset($_POST['asc']))
    {
      $query = "SELECT * FROM medicines order by med_name asc";
    }
    else if(isset($_POST['desc']))
    {
      $query = "SELECT * FROM medicines order by med_name desc";
    }
    else
    {
      $query = "SELECT * FROM medicines";
    }
  }
  else if(isset($_POST['price']))
  {
    if(isset($_POST['asc']))
    {
      $query = "SELECT * FROM medicines order by med_price asc";
    }
    else if(isset($_POST['desc']))
    {
      $query = "SELECT * FROM medicines order by med_price desc";
    }
    else
    {
      $query = "SELECT * FROM medicines";
    }
  }
  else if(isset($_POST['manufacturer']))
  {
    if(isset($_POST['asc']))
    {
      $query = "SELECT * FROM medicines order by med_manufacturer asc";
    }
    else if(isset($_POST['desc']))
    {
      $query = "SELECT * FROM medicines order by med_manufacturer desc";
    }
    else
    {
      $query = "SELECT * FROM medicines";
    }
  }
  else
  {
    $query = "SELECT * FROM medicines";
  }

  $result = mysqli_query($conn, $query);
  $title = "Full Types of Medicines";
    require_once "./template/header.php";
?>

  <p class="lead text-center text-muted">All available Medicines</p>
<h5 class="lead text-muted">Sort By:</h5>

<form method="post" action="medicines.php">
  <div class="radio">
    <label><input type="radio" name="asc" >Ascending</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="desc">Descending</label>
  </div>

  <button type="submit" class="btn btn-secondary" name="title">Name</button>
  <button type="submit" class="btn btn-secondary" name="price">Price</button>
  <button type="submit" class="btn btn-secondary" name="author">Manufacturer</button>
  <button type="submit" class="btn btn-secondary" name="clear">Clear</button>
  
</form>

<br><br>

    <?php for($i = 0; $i < mysqli_num_rows($result); $i++)
    { ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result))
        { ?>
          <div class="col-md-3">
            <a href="medicine.php?medserial=<?php echo $query_row['med_serial']; ?>">
              <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $query_row['med_image']; ?>">
              </a>
              <table>
                <tr>
                  <td><strong>  <?php echo $query_row['med_name']; ?></strong></td>
                </tr>
                <tr>
                <td> <?php echo $query_row['med_manufacturer']; ?></td>
                </tr>
                <tr>
                <td><strong>Rs <?php echo  $query_row['med_price'];?></strong>  </td>
                </tr>
              </table>
            </div>
        <?php
          $count++;
          if($count >= 4)
          {
              $count = 0;
              break;
            }
          } ?> 
      </div>
      <br><br>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer.php";
?>

