<?php
require('session.php');
require('connect_sql.php');

$status = (Object)[];
$status->success = false;

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'] ?? 'None';
  $query = "SELECT `fname`, `lname`, `email`, `tel` FROM `account` WHERE `username` = '$user'";
  $result = $mysql->query($query);
  if ($result->num_rows > 0) {
    // ["fname" => $fname, "lname" => $lname, "email" => $email, "tel" => $tel] = $result->fetch_assoc();
    $row = $result->fetch_assoc();
    $status->success = true;
    $status->data = $row;
  } else {
    $status->error = true;
  }
}

$data = json_encode($status);
echo($data);