<?php
require('../session.php');
require('../connect_sql.php');
$admin = $_SESSION['role'] ?? 'None';
$title = $_POST['title'] ?? '';
$place = $_POST['place'] ?? '';
$date = $_POST['datetime'] ?? '';
$last_title = $_POST['lastTitle'] ?? '';
$validate = !empty($title) && !empty($place) && !empty($date) ? 1 : 0;
if (!empty($admin)) {
  if ($validate) {
    $query = "UPDATE `event` SET title='$title', place='$place', `date`='$date' WHERE title='$last_title'";
    if ($mysql->query($query)) {
      echo 'success';
    } else {
      echo 'fail';
    }
  } else {
    echo 'nc';
  }
}