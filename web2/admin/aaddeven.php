<?php
session_start();
include "../include/con_db.php";
if (isset($_SESSION['login_admin'])) {
  if(isset($_POST['submit'])){
    include "include/con_db.php";

    $sql = "INSERT INTO even (e_id, e_name, e_date, e_time, e_location, e_detail, e_price, e_status)
    VALUES ('', '".$_POST['e_name']."', '".$_POST['e_date']."', '".$_POST['e_time']."', '".$_POST['e_location']."', '".$_POST['e_detail']."', '".$_POST['e_price']."', '1')";

    if ($conn->query($sql) === TRUE) {
        echo "<script language='javascript'>alert('Add even successfully.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=aeven.php' />";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}else {
  echo "<script language='javascript'>alert('Please Login (Admin Only).')</script>";
  echo "<meta http-equiv='refresh' content='0;url=../login.php' />";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/mystyle.css">
    <meta charset="utf-8">
    <title>AddEvent</title>
  </head>
<body id="LoginForm">
 <script src="../include/menu.js"></script>
<div id="menu-container">
   <div id="menu-wrapper">
      <div id="hamburger-menu"><span></span><span></span><span></span></div>
      <!-- hamburger-menu -->
   </div>
   <!-- menu-wrapper -->
   <ul class="menu-list accordion">
      <li id="nav1" class="toggle accordion-toggle">
         <span class="icon-plus"></span>
         <a class="menu-link" href="#">Menu</a>
      </li>
      <!-- accordion-toggle -->
      <ul class="menu-submenu accordion-content">
	           <li><a class="head" href="aaddeven.php">Add Even</a></li>
	           <li><a class="head" href="aeven.php">Even Lists</a></li>
				<li><a class="head" href="auser.php">User List</a></li>
		         <li><a class="head" href="aevencon.php">Payment Comfirm</a></li>
				<li><a class="head" href="../logout.php">Logout</a></li>
      </ul>
      <!-- menu-submenu accordon-content-->

   </ul>
   <!-- menu-list accordion-->
</div>
<div class="container">
<h1 class="form-heading"><a href="https://www.google.com">Teleport Team (Root)</a></h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h3>Add Even</h3>
   <br>
   </div>
    <form class="" action="aaddeven.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control"  name="e_name" value="" placeholder="Name" required>
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name="e_date" value="" placeholder="Date"required>
        </div>
		<div class="form-group">
            <input type="time" class="form-control" name="e_time" value="" placeholder="Time"required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="e_location" value="" placeholder="Location"required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="e_detail" value="" placeholder="Detail"required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="e_price" value="" placeholder="Price"required>
        </div>
        <div class="forgot">
		</div>
        <button type="submit" class="btn btn-primary"  name="submit">Add Even</button>
<br>
<br>
        <a href="aeven.php"class="btn btn-primary"  > < Back to The Future</a>
    </form>
    </div>
</div></div></div>
</body>
</html>
