<?php
if(isset($_POST['submit'])){
  include "include/con_db.php";

  $sql = "INSERT INTO account (a_id, fname, lname, idnumber, tel, email, password, a_status)
  VALUES ('', '".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['idnumber']."', '".$_POST['tel']."', '".$_POST['email']."', '".md5($_POST['password'])."', '1')";

  if ($conn->query($sql) === TRUE) {
      echo "<script language='javascript'>alert('Register user successfully.')</script>";
      echo "<meta http-equiv='refresh' content='0;url=login.php' />";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <meta charset="utf-8">
    <title>Register</title>
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">Teleport Team </h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h3>Register</h3>
   <br>
   </div>
    <form class="" action="register.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control"  name="fname" value="" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="lname" value="" placeholder="Last Name" required>
        </div>
	        <div class="form-group">
           <input type="text" class="form-control" name="idnumber" value="" placeholder="IDnumber" required>
        </div>
	        <div class="form-group">
          <input type="text" class="form-control" name="tel" value="" placeholder="Tel" required>
        </div>
		        <div class="form-group">
           <input type="email" class="form-control" name="email" value="" placeholder="E-Mail" required>
        </div>
		        <div class="form-group">
            <input type="password" class="form-control" name="password" value="" placeholder="Password" required>
        </div>
        <div class="forgot">
		</div>
        <button type="submit" class="btn btn-primary"  name="submit">Register</button>
    </form>
    </div>
</div></div></div>
</body>
</html>
