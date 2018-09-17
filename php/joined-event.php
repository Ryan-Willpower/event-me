<?php
require('connect_sql.php');

$query = "SELECT title, place, `date`
FROM `event`, `account`, `participants`
WHERE `participants`.eventid = `event`.eventid
AND `participants`.userid = `account`.userid
AND `participants`.userid = (SELECT `userid` FROM account WHERE username='ryan')
AND (complete = 0 OR complete = 1)";
$result = $mysql->query($query);

$status = (Object)[];
$status->success = false;

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    array_push($data, $row);
  }
  $JSONdata = json_encode($data);
  echo $JSONdata;
} else {
  $JSONdata = json_encode($status);
  echo $JSONdata;
}