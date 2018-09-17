<?php
require('connect_sql.php');

$query = "SELECT `title`, `place`, `date` FROM `event` WHERE complete = 0";
$result = $mysql->query($query);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    array_push($data, $row);
  }
  $JSONdata = json_encode($data);
  echo $JSONdata;
}