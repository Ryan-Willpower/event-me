<?php
session_start();
include "../include/con_db.php";
if (isset($_SESSION['login_admin'])) {
  if (isset($_GET['del'])) {
    $sql = "DELETE FROM account WHERE a_id = '".$_GET['del']."'";
    if ($conn->query($sql) === TRUE) {
      echo "<script language='javascript'>alert('Delete User successfully.')</script>";
      echo "<meta http-equiv='refresh' content='0;url=auser.php' />";
      exit;
    }else {
      echo "<script language='javascript'>alert('Error !!!')</script>";
      echo "<meta http-equiv='refresh' content='0;url=auser.php' />";
      exit;
    }
  }
  if (isset($_GET['lock'])) {
    if ($_GET['status'] == 1) {
      $sql = "UPDATE account SET a_status = '0' WHERE a_id = '".$_GET['lock']."'";
    }
    elseif ($_GET['status'] == 0) {
      $sql = "UPDATE account SET a_status = '1' WHERE a_id = '".$_GET['lock']."'";
    }
    elseif ($_GET['status'] == 2) {
      echo "<script language='javascript'>alert('No!! | This is Admin account.')</script>";
      echo "<meta http-equiv='refresh' content='0;url=auser.php' />";
      exit;
    }
    if ($conn->query($sql) === TRUE) {
      echo "<script language='javascript'>alert('Change User successfully.')</script>";
      echo "<meta http-equiv='refresh' content='0;url=auser.php' />";
      exit;
    }else {
      echo "<script language='javascript'>alert('Error !!!')</script>";
      echo "<meta http-equiv='refresh' content='0;url=auser.php' />";
      exit;
    }
  }
  if (isset($_GET['admin'])) {
    if ($_GET['status'] == 2) {
      $sql = "UPDATE account SET a_status = '1' WHERE a_id = '".$_GET['admin']."'";
    }
    elseif ($_GET['status'] == 1) {
      $sql = "UPDATE account SET a_status = '2' WHERE a_id = '".$_GET['admin']."'";
    }
    elseif ($_GET['status'] == 0) {
      echo "<script language='javascript'>alert('No!! | This account is Lock.')</script>";
      echo "<meta http-equiv='refresh' content='0;url=auser.php' />";
      exit;
    }
    if ($conn->query($sql) === TRUE) {
      echo "<script language='javascript'>alert('Change User successfully.')</script>";
      echo "<meta http-equiv='refresh' content='0;url=auser.php' />";
      exit;
    }else {
      echo "<script language='javascript'>alert('Error !!!')</script>";
      echo "<meta http-equiv='refresh' content='0;url=auser.php' />";
      exit;
    }
  }
}else {
  echo "<script language='javascript'>alert('Please Login (Admin Only).')</script>";
  echo "<meta http-equiv='refresh' content='0;url=../login.php' />";
  exit;
}
?>
