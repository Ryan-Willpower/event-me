<?php
session_start();
include "../include/con_db.php";
if (isset($_SESSION['login_admin'])) {
  echo "admin";
}else {
  echo "<script language='javascript'>alert('Please Login (Admin Only).')</script>";
  echo "<meta http-equiv='refresh' content='0;url=../login.php' />";
  exit;
}
?>
