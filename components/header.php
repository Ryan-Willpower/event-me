<?php
require('php/session.php');
require('php/connect_sql.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Eventme</title>
  <link rel="shortcut icon" href="img/favicon.png"/>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
  <link rel="stylesheet" href="css/global.min.css">
  <script defer src="fa/js/regular.min.js"></script>
  <script defer src="fa/js/fontawesome.min.js"></script>
</head>
<body>
  <script src="jquery/jquery-3.3.1.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase.js"></script>
  <script>
    // Initialize Firebase
    var config = {
      apiKey: "AIzaSyDRJa3pGBivfzRswk7vfmpfubAnhrEJgQw",
      authDomain: "conf-62008.firebaseapp.com",
      databaseURL: "https://conf-62008.firebaseio.com",
      projectId: "conf-62008",
      storageBucket: "conf-62008.appspot.com",
      messagingSenderId: "1037504410206"
    };
    firebase.initializeApp(config);
  </script>