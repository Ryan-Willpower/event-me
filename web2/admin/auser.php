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
    <div class="panel">
   <h2>User List</h2>
   <br>
   </div>

<table id="customers">
                                          <tr>
                                              <th><center>No.</center></th>
                                              <th><center>รหัสสมาชิก</center></th>
                                              <th><center>ชื่อ</center></th>
                                              <th><center>นามสกุล</center></th>
                                              <th><center>Email</center></th>
                                              <th><center>Admin</center></th>
                                              <th><center>Status</center></th>
                                              <th><center>Delete</center></th>
                                          </tr>
                                          <?php
											session_start();
											if (isset($_SESSION['login_admin'])) {
											include "../include/con_db.php";
                                            $sql = "SELECT * FROM account";
											$result = $conn->query($sql);
                                            $i = 0;
                                            if ($result->num_rows > 0){
                                              while($row = $result->fetch_assoc()) {
												 $i += 1;
                                                 echo "<tr>";
												 echo "<td>".$i."</td>";
                                                 echo "<td>".$row["a_id"]."</td>";
                                                 echo "<td>".$row["fname"]."</td>";
                                                 echo "<td>".$row["lname"]."</td>";
                                                 echo "<td>".$row["email"]."</td>";
                                                 if ($row["a_status"] == 2) {
                                                   echo "<td><a href='amnguser.php?admin=".$row["a_id"]."&status=".$row["a_status"]."' class=\"myButton1\">Admin</a>";
                                                 }else {
                                                   echo "<td><a href='amnguser.php?admin=".$row["a_id"]."&status=".$row["a_status"]."' class=\"myButton1\">NoAdmin</a>";
                                                 }
                                                 if ($row["a_status"] == 0) {
                                                   echo "<td><a href='amnguser.php?lock=".$row["a_id"]."&status=".$row["a_status"]."' class=\"myButton1\">UnLock</a>";
                                                 }else {
                                                   echo "<td><a href='amnguser.php?lock=".$row["a_id"]."&status=".$row["a_status"]."' class=\"myButton1\">Lock</a>";
                                                 }
												 echo "<td><a href='amnguser.php?del=".$row["a_id"]."' class=\"myButton\">X</a>";
                                                 echo "</tr>";
                                                 }
												 $conn->close();
												}else {
												echo "no even";
                                            }
											}else {
											  echo "<script language='javascript'>alert('Please Login (Admin Only).')</script>";
											  echo "<meta http-equiv='refresh' content='0;url=../login.php' />";
											  exit;
											}
                                          ?>
</table>
</div></div></div>
</body>
</html>
