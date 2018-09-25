<?php
session_start();
include "include/con_db.php";
if (isset($_SESSION['login_user'])) {
  if (isset($_POST["submit"])) {
    if (isset($_FILES['abc']['name'])) {

      $realname = (explode(".",$_FILES['abc']['name']));
      $imgname = array_sum(explode(' ', microtime()));
      print_r($_FILES['abc']);
      copy($_FILES['abc']['tmp_name'], "img/$imgname.$realname[1]");

      $sql = "INSERT INTO register (r_id, r_aid, r_name, r_date, r_time, r_location, r_img, r_price, r_status)
      VALUES ('', '".$_SESSION['login_user']."', '".$_POST['rname']."', '".$_POST['rdate']."', '".$_POST['rtime']."', '".$_POST['rlocation']."', '".$imgname.".".$realname[1]."', '".$_POST['rprice']."', '1')";

      if ($conn->query($sql) === TRUE) {
          echo "<script language='javascript'>alert('Register even successfully.')</script>";
          echo "<meta http-equiv='refresh' content='0;url=history.php' />";
          exit;
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();

    }
  }
  if (isset($_GET["id"])) {
    $sql = "SELECT * FROM even WHERE e_id = '".$_GET["id"]."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
        $row2 = $row;
      }
    }
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
    <form class="" action="evregister.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control"  name="rname" value="<?php echo $row2['e_name']; ?>" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="rdate" value="<?php echo $row2['e_date']; ?>" >
        </div>
	        <div class="form-group">
           <input type="text" class="form-control" name="rtime" value="<?php echo $row2['e_time']; ?>" >
        </div>
	        <div class="form-group">
          <input type="text" class="form-control" name="rlocation" value="<?php echo $row2['e_location']; ?>" >
        </div>
		        <div class="form-group">
           <input type="text" class="form-control" name="rprice" value="<?php echo $row2['e_price']; ?>" >
        </div>
        <div class="forgot">
		หลักฐานการชำระเงิน <input type="file"  name="abc" required>
		</div>
        <button type="submit" class="btn btn-primary"  name="submit">Register > </button>
		<br>
		<br>
		        <a href="even.php" class="btn btn-primary"> < Back to Even </a>

    </form>
    </div>
</div></div></div>
</body>
</html>
