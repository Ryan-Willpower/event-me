<?php
session_start();
if(isset($_POST['submit'])){
  include "include/con_db.php";

  $sql = "SELECT * FROM account where email = '".$_POST['email']."' and password= '".md5($_POST['password'])."'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();

		    if ($result->num_rows == 0){
				  echo "<script language='javascript'>alert('Username or Password incorrect')</script>";
		    }else{
          if ($row["a_status"] == "1") {
            $_SESSION['login_user']=$row["a_id"];
            $_SESSION['login_email']=$row["email"];
            echo "<script language='javascript'>alert('Login successfully.')</script>";
            echo "<meta http-equiv='refresh' content='0;url=even.php' />";
          }
          elseif ($row["a_status"] == "2") {
            $_SESSION['login_admin']=$row["a_id"];
            echo "<script language='javascript'>alert('Admin Login successfully.')</script>";
            echo "<meta http-equiv='refresh' content='0;url=admin/aeven.php' />";
          }else {
            echo "<script language='javascript'>alert('Your Account is lock!')</script>";
            echo "<meta http-equiv='refresh' content='0;url=login.php' />";
          }
        }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="http://pluspng.com/hacker-png-free-2940.html">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <meta charset="utf-8">
    <title>Login</title>
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">Teleport Team</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h3>Login</h3>
   <br>
   </div>
    <form class="" action="login.php" method="post">
        <div class="form-group">
            <input type="email" class="form-control"  name="email" value="" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" value="" placeholder="Password">
        </div>
        <div class="forgot">
        <a href="register.php">Register Here</a>
		</div>
        <button type="submit" class="btn btn-primary"  name="submit">Login</button>
    </form>
    </div>
</div></div></div>
</body>
</html>
