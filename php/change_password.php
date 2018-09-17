<?php
require('session.php');
require('connect_sql.php');

$user = $_SESSION['user'] ?? '';
$current = $_POST['current'] ?? '';
$new = $_POST['new'] ?? '';

$current = $current != '' ? $mysql->real_escape_string($current) : '';
$new = $new != '' ? $mysql->real_escape_string($new) : '';

$status = (Object)[];
$status->success = false;

if (!empty($user)) {
  if (isset($_POST['confirm'])) {
    if (!empty($current) && !empty($new)) {
      $query = "SELECT `password` FROM `account` WHERE `username` = '$user'";
      $result = $mysql->query($query);
      if ($result->num_rows > 0) {
        ['password' => $user_pwd ] = $result->fetch_assoc();
        if (password_verify($current, $user_pwd)) {
          $new = password_hash($new, PASSWORD_BCRYPT, ['cost' => 12]);
          $query = "UPDATE `account` SET `password` = '$new' WHERE username = '$user'";
          if ($mysql->query($query)) {
            $status->success = true;
          } else {
            $status->error = 'set password failed ' . $mysql->error;
          }
        } else {
          $status->error = 'Incorrected password, check your password again';
        }
      } else {
        $status->error = $mysql->error;
      }
    } else {
      $status->error = 'maybe current or new password is empty';
    }
  } else {
    $status->error = 'no confirm send';
  }
} else {
  $status->error = 'no session here';
}

$data = json_encode($status);
echo $data;