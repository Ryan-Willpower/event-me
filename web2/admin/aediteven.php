<?php
session_start();
include "../include/con_db.php";
if (isset($_SESSION['login_admin'])) {

  if(isset($_POST['submit'])){
    $sql = "UPDATE even SET
    e_name = '".$_POST['e_name']."',
    e_date = '".$_POST['e_date']."',
    e_time = '".$_POST['e_time']."',
    e_location = '".$_POST['e_location']."',
    e_detail = '".$_POST['e_detail']."',
    e_price = '".$_POST['e_price']."',
    e_status = '".$_POST['e_status']."'
    WHERE e_id = '".$_POST['e_id']."' ";

    if ($conn->query($sql) === TRUE) {
        echo "<script language='javascript'>alert('Update even successfully.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=aeven.php' />";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  $sql = "SELECT * FROM even WHERE e_id = '".$_GET['id']."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $row2 = $row;
      }
      $conn->close();
    } else {
    echo "no even";
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
    <title>EditEvent</title>
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
   <h3>Edit Event</h3>
   <br>
   </div>
    <form class="" action="aediteven.php" method="post">
      <input type="hidden" name="e_id" value="<?php echo $_GET['id'] ?>">
        <div class="form-group">
            <input type="text" class="form-control"  name="e_name" value="<?php echo $row2["e_name"] ?>">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name="e_date" value="<?php echo $row2["e_date"] ?>">
        </div>
		<div class="form-group">
            <input type="time" class="form-control" name="e_time" value="<?php echo $row2["e_time"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="e_location" value="<?php echo $row2["e_location"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="e_detail" value="<?php echo $row2["e_detail"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="e_price" value="<?php echo $row2["e_price"] ?>">
        </div>
        <div class="form-group">
        <select class="form-control" name="e_status">
          <?php if ($row2["e_status"] == 1) {
            echo "<option value='1'>On</option>";
            echo "<option value='0'>Off</option>";
          }else {
            echo "<option value='0'>Off</option>";
            echo "<option value='1'>On</option>";
          }
           ?>
        </select>
        </div>
        <div class="forgot">
		</div>
        <button type="submit" class="btn btn-primary"  name="submit">Edit Even > </button>
		<br>
		<br>
        <a href="aeven.php" class="btn btn-primary"> < Back to Even </a>
    </form>
    </div>
</div></div></div>
</body>
</html>
