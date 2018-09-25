<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <meta charset="utf-8">
    <title><a href="even.php">Even Lists</title></a>
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
<!-- menu-container -->
<div class="container">
<h1 class="form-heading">Teleport Team </h1>
<div class="login-form">
    <div class="panel">
   <h2>Even Lists</h2>
   <br>
   </div>

<table id="customers">
                                          <tr>
                                              <th><center>No.</center></th>
                                              <th><center>ชื่อคอร์ส</center></th>
                                              <th><center>วันที่</center></th>
                                              <th><center>เวลา</center></th>
                                              <th><center>สถานที่</center></th>
                                              <th><center>ค่าใช้จ่าย</center></th>
                                              <th><center>รูปแนบ</center></th>
                                              <th><center>สถานะ</center></th>
                                              <th><center>ปริ้น</center></th>
                                          </tr>
                                          <?php
											session_start();
											if (isset($_SESSION['login_user'])) {
											include "include/con_db.php";
                                            $sql = "SELECT * FROM register WHERE r_aid = '".$_SESSION['login_user']."'";
											$result = $conn->query($sql);
                                            $i = 0;
                                            if ($result->num_rows > 0){
                                              while($row = $result->fetch_assoc()) {
												                        $i++;
                                                 echo "<tr>";
                                                                      echo "<td>".$i."</td>";
                                                 echo "<td>".$row["r_name"]."</td>";
                                                 echo "<td>".$row["r_date"]."</td>";
                                                 echo "<td>".$row["r_time"]."</td>";
                                                 echo "<td>".$row["r_location"]."</td>";
                                                 echo "<td>".$row["r_price"]."</td>";
                                                 echo "<td><a href='img/".$row["r_img"]."'>".$row["r_img"]."</a>";
                                                 if ($row["r_status"] == "1") {
                                                   echo "<td>"."การชำระเงินรอการยืนยัน"."</td>";
                                                 }
                                                 elseif ($row["r_status"] == "2") {
                                                   echo "<td>"."การชำระเงินยืนยันแล้ว"."</td>";
                                                 }
                                                 else {
                                                   echo "<td>"."การชำระเงินผิดพลาด"."</td>";
                                                 }
                                                 echo "<td><a href='print.php?id=".$row["r_id"]."'>Print</a>";
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
