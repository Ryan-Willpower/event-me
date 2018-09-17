<?php
require('session.php');
require('connect_sql.php');
$status = (Object)[];
$status->success = false;
if ( isset( $_POST['login'] ) ) {
  $username = $_POST['username'] ?? 'None';
  $password = $_POST['password'] ?? 'None';
  
  if ($username != 'None' && $password != 'None') {
    $username = $mysql->real_escape_string($username);
    $query = "SELECT `username`, `password`, `role` FROM `account` WHERE `username` = '$username'";

    $result = $mysql->query($query);
    if ($result->num_rows > 0) { // login success
      ["username" => $username, "password" => $hash, "role" => $role] = $result->fetch_assoc();
      if (password_verify($password, $hash)) {
        if ($role == 'user') {
          $_SESSION['user'] = $username;
        } elseif ($role == 'admin') {
          $_SESSION['user'] = $username;
          $_SESSION['role'] = $role;
        }
        $status->success = true;
      } else {
        $status->incorrected = true;
      }
    } else {
      $status->user_not_found = true;
    }
  }
} else {
  $status->submit = false;
}

$data = json_encode($status);
echo ($data);