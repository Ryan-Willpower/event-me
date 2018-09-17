<?php
require('session.php');
require('connect_sql.php');

$status = (Object)[];
$status->success = false;

$haveData = !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_SESSION['user']);

if (isset($_POST['edit'])) {
  if ($haveData) {
      $user   = $_SESSION['user'];
      $fname  = $mysql->real_escape_string($_POST['fname']);
      $lname  = $mysql->real_escape_string($_POST['lname']);
      $email  = $mysql->real_escape_string($_POST['email']);
      $tel    = $mysql->real_escape_string($_POST['tel']);

      $query = "UPDATE `account` 
      SET fname='$fname', lname='$lname', email='$email', tel='$tel'
      WHERE username='$user'";

      if ($mysql->query($query)) {
        $status->success = true;
      } else {
        $error = $mysql->error;
        $status->error = "query error: $error";
      }
  } else {
    $status->error = 'some data is empty';
  }
} else {
  $status->error = 'no edit is set';
}

$data = json_encode($status);
echo $data;