<?php
require('../connect_sql.php');
$set_complete = $_GET['set_complete'];
$title = $_GET['title'];
$query = "UPDATE `event` SET complete='$set_complete' WHERE title='$title'";
if ($mysql->query($query)) {
  echo 'success';
} else {
  echo 'fail';
}