<?php
require('session.php');
require('connect_sql.php');

$user = $_SESSION['user'] ?? 'None';
$title = $_GET['title'] ?? 'None';
$query = "SELECT confirmation
FROM participants 
WHERE userid=(SELECT `userid` FROM account WHERE username='$user')
AND eventid=(SELECT `eventid` FROM `event` WHERE title='$title')";
$result = $mysql->query($query);
$confirm = 'none';
if ($result->num_rows > 0) {
  $event = $result->fetch_assoc();
  $confirm = $event['confirmation'];
}

echo $confirm;