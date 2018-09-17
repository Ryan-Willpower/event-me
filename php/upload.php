<?php
// upload file to img/
// set confirmation to 1
// redirect to event

require('session.php');
require('connect_sql.php');

if (!empty($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $title = $_GET['title'];
  if (!empty($_FILES['payment'])) {
    $target_dir = str_replace('php', 'payment' . DIRECTORY_SEPARATOR , __DIR__);
    $date = date('dmY');
    $file = $target_dir . basename($_FILES["payment"]["name"]);
    $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
    $target_file = $target_dir . "$title-$user-$date.$imageFileType";

    if (move_uploaded_file($_FILES["payment"]["tmp_name"], $target_file)) {
      $query = "UPDATE `participants`
      SET confirmation=1
      WHERE userid=(SELECT userid FROM account WHERE username='$user')
      AND eventid=(SELECT eventid FROM `event` WHERE title='$title')";
      if ($mysql->query($query)) {
        header("location: /event/event.php?title=$title");
      } else {
        header("location: /event/event.php?title=$title&error=confirmation");
      }
      
    } else {
      header("location: /event/event.php?title=$title&error=upload");
    }
  } else {
    header("location: /event/event.php?title=$title&error=file");
  }
} else {
  header("location: /event/event.php?title=$title&error=session");
}