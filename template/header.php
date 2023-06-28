<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require_once "./functions/database_functions.php";
    if(isset($_SESSION['email']))
    {
      $customer = getCustomerIdbyEmail($_SESSION['email']);
      $name=$customer['firstname'];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
    
  </head>
  <body style="background-color: #d8f2f2;">
    <nav class="navbar navbar-inverse navbar-fixed-top"  >
      <div class="container">
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div style="width: 300px; " >
          <div class="row">
            <a class="navbar-brand" href="index.php" col-md-3 >MED4ALL</a>
            <form  method="post" action="search_med.php" class="col-md-6" style="margin-top:7px; width: 220px">
              <input type="text" class="form-control" id="inputPassword2" placeholder="Search By a Keyword" name="text">
              <button type="submit" class="btn btn-primary mb-2" style="display:none"></button>
           </form>
          </div>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="type_list.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp; Types</a></li>
              <li><a href="use_for_list.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Used For</a></li>
              <li><a href="medicines.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Medicines</a></li>
              <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; My Cart</a></li>
              <li><a href="checkout.php"><span class="glyphicon glyphicon-briefcase"></span>&nbsp; Checkout</a></li>
              <?php 
               if(isset($_SESSION['user']))
               {
                echo ' <li><a href="logout.php"><span class="	glyphicon glyphicon-log-out"></span>&nbsp; LogOut</a></li>'.'<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;'.$name.'</a></li>';
               }
               else
               {
                echo ' <li><a href="signin.php"><span class="	glyphicon glyphicon-log-in"></span>&nbsp; Signin</a></li>'.'<li><a href="signup.php"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Sign up</a></li>';
               }
              ?>
              <li><a href="contactus.php"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; Contact Us</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
      if(isset($title) && $title == "Index") 
      {
    ?>
    <div class="jumbotron" style="  background: url('https://www.mxmed.eu/modules/mod_bt_backgroundslideshow/images/original/c3c6d80700e99837dfd26d35b80a152f.jpg') no-repeat center center;background-size: cover;height:400px;" >
    <style>
      mark
      {   
        background-color: lightblue;
        color: black;
      }
    </style>
    <div class="container">
      <br><br>
        <h1 style="text-align:center; margin:6% auto; color: black; font-style: display; font-size:100px; margin-top: -50px;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MED4ALL</b></h1><br><br>
        <h2 style="text-align:center; color: black; margin-top: -50px; font-family: 'Courier New', monospace;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- A pharmacy your family can trust</b></h2>
 
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">


