<?php
require('session.php');
require('connect_sql.php');

$status = (Object)[];
$status->register = false;

if (isset($_POST['register'])) {
  // destructuring var
  [ "username" => $username, "password" => $password, "fname" => $fname,
    "lname" => $lname, "email" => $email, "tel" => $tel, "idnum" => $idnum,
  ] = $_POST;

  // prevent escape character
  $username = $mysql->real_escape_string($username);
  $password = $mysql->real_escape_string($password);
  $fname = $mysql->real_escape_string($fname);
  $lname = $mysql->real_escape_string($lname);
  $email = $mysql->real_escape_string($email);
  $tel = $mysql->real_escape_string($tel);
  $idnum = $mysql->real_escape_string($idnum);

  // encrypt password
  $password = password_hash($password, PASSWORD_BCRYPT, ["cost"=> 12]);

  $query = "INSERT INTO 
  account(`username`, `password`, `fname`, `lname`, `email`, `tel`, `idcard`)
  VALUE ('$username', '$password', '$fname', '$lname', '$email', '$tel' , '$idnum')";

  if ($mysql->query($query)) {
    $_SESSION['user'] = $username;
    $status->register = true;
  } else {
    $status->query = false;
    $status->error = "$mysql->error";
  }
}

$data = json_encode($status);
echo $data;