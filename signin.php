<div  style="  background: url('https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Simple-Minimalist-Background-Image.jpg') no-repeat center center;background-size: cover;height:110%;" >
<?php
	$title = "User SignIn";
	require_once "./template/header.php";
?>

	<form class="form-horizontal" method="post" action="user_verify.php">
  <div class="form-group">
  <h4 style="color: yellow;"><label for="exampleInputEmail1">Username</label></h4>
    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter username" name="username">
    <h5 class="form-text text-muted" style="color: black;">Your details will be confidential.</h5>
  </div>
  <div class="form-group">
  <h4 style="color: yellow;"><label for="exampleInputPassword1">Password</label></h4>
    <input type="password" class="form-control" placeholder="Password" name="password">
  </div>
  
  <button style=" width: 100px; height: 50px" type="submit" class="btn btn-primary"><h4>Submit</h4></button>
</form>
<div style="position:fixed; bottom:400px">
<?php
    $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullurl,"signin=empty")==true)
    {
        echo '<P style="color:red">You did not fill in all the fields.</P>';
        exit();
    }
    if(strpos($fullurl,"signin=invalidusername")==true)
    {
        echo '<P style="color:red">Username Does not exist.</P>';
        exit();
    }
    if(strpos($fullurl,"signin=invalidpassword")==true)
    {
        echo '<P style="color:red">Password is not correct.</P>';
        exit();
    }
?>
</div>
<?php
	require_once "./template/footer.php";
?>