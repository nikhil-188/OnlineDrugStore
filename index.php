<?php
  session_start();
  $count = 0;
  $title = "Index";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4Latestmed($conn);
?> 
     
     <br/> <br/>
      <p class="lead text-center text-muted">OUR TOP SALE MEDICINES</p>
      <br><br>
      <div class="row">
        <?php 
        foreach($row as $medicine) 
        { 
            ?>
      	<div class="col-md-3">
      		<a href="medicine.php?medserial=<?php echo $medicine['med_serial']; ?>">
           <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $medicine['med_image']; ?>">
          </a>
      	</div>
        <?php 
    } ?>
      </div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>