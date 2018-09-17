<?php
require('../connect_sql.php');

$title = $_POST['title'] ?? '';
$place = $_POST['place'] ?? '';
$datetime = $_POST['datetime'] ?? '';

$status = (Object)[];
$status->success = false;

$title = $mysql->real_escape_string($title);
$place = $mysql->real_escape_string($place);

$query = "INSERT INTO `event`(title, place, `date`) VALUES('$title', '$place', '$datetime')";

if ($mysql->query($query)) {
  $status->success = true;
}

echo $status->success;