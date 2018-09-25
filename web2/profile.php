<?php
session_start();
include "include/con_db.php";
if (isset($_SESSION['login_user'])) {

  if(isset($_POST['submit'])){
    $sql = "UPDATE account SET
    fname = '".$_POST['fname']."',
    lname = '".$_POST['lname']."',
    idnumber = '".$_POST['idnumber']."',
    tel = '".$_POST['tel']."',
    email = '".$_POST['email']."',
    password = '".$_POST['password']."'
    WHERE a_id = '".$_SESSION['login_user']."' ";

    if ($conn->query($sql) === TRUE) {
        echo "<script language='javascript'>alert('Update successfully.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=profile.php' />";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  $sql = "SELECT * FROM account WHERE a_id = '".$_SESSION['login_user']."' ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $row2 = $row;
      }
      $conn->close();
    } else {
    echo "0 results";
  }
}else {
  echo "<script language='javascript'>alert('Please Login.')</script>";
  echo "<meta http-equiv='refresh' content='0;url=login.php' />";
  exit;
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
    <title>Edit Profile</title>
  </head>
<body id="LoginForm">
 <script src="include/menu.js"></script>
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
         <li><a class="head" href="even.php">Even Lists</a></li>
         <li><a class="head" href="history.php">History</a></li>
		 <li><a class="head" href="profile.php">Edit Profile</a></li>
         <li><a class="head" href="logout.php">Logout</a></li>
      </ul>
      <!-- menu-submenu accordon-content-->
        
   </ul>
   <!-- menu-list accordion-->
</div>

<div class="container">
<h1 class="form-heading">Teleport Team </h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h3>Edit Your Profile</h3>
   <br>
   </div>
    <form class="" action="profile.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control"  name="fname" value="<?php echo $row2["fname"] ?>" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="lname" value="<?php echo $row2["lname"] ?>" placeholder="Last Name" required>
        </div>
	        <div class="form-group">
           <input type="text" class="form-control" name="idnumber" value="<?php echo $row2["idnumber"] ?>" placeholder="IDnumber" required>
        </div>
	        <div class="form-group">
          <input type="text" class="form-control" name="tel" value="<?php echo $row2["tel"] ?>" placeholder="Tel" required>
        </div>
		        <div class="form-group">
           <input type="email" class="form-control" name="email" value="<?php echo $row2["email"] ?>" placeholder="E-Mail" required>
        </div>
        <div class="forgot">
		</div>
        <button type="submit" class="btn btn-primary"  name="submit">Update</button>
    </form>
    </div>
</div></div></div>
</body>
</html>
