<?php
$mysql = new mysqli('localhost', 'username', 'password', 'event');
if ($mysql->connect_error) {
  die("connection failed $mysql->connect_error");
}

$mysql->set_charset('utf8');