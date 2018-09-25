<?php
session_start();
include "../include/con_db.php";
if (isset($_SESSION['login_admin'])) {
  $sql = "DELETE FROM even WHERE e_id = '".$_GET['id']."'";
  if ($conn->query($sql) === TRUE) {
    echo "<script language='javascript'>alert('Delete Even successfully.')</script>";
    echo "<meta http-equiv='refresh' content='0;url=aeven.php' />";
    exit;
  }else {
    echo "<script language='javascript'>alert('Error !!!')</script>";
    echo "<meta http-equiv='refresh' content='0;url=aeven.php' />";
    exit;
  }
}else {
  echo "<script language='javascript'>alert('Please Login (Admin Only).')</script>";
  echo "<meta http-equiv='refresh' content='0;url=../login.php' />";
  exit;
}
?>
