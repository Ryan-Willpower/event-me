<?php
require('php/session.php');
require('php/connect_sql.php');
$admin = $_SESSION['role'] ?? 'None';
$title = $_GET['title'] ?? 'None';

if ($admin == 'admin') {
  $query = "DELETE FROM `event` WHERE title='$title'";
  $mysql->query($query);
}

header('location: index.php');