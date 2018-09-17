<?php
require('session.php');
require('connect_sql.php');

$event_name = $_GET['title'] ?? 'None';
$status = (Object)[];
$status->event = false;
$status->isUser = false;

$query = "SELECT title, place, `date`, complete FROM `event` WHERE title='$event_name'";
$result = $mysql->query($query);

if ($result->num_rows > 0) {
  $event = $result->fetch_assoc();
  $status->event = true;
  $status->title = $event['title'];
  $status->place = $event['place'];
  $status->date = $event['date'];
  $status->complete = $event['complete'] == "1" ? true : false;
} else {
  $status->notFound = true;
}

if (!empty($_SESSION['user'])) {
  $status->isUser = true;
}

$JSON = json_encode($status);
echo $JSON;