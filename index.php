<?php
require('components/header.php');
require('components/menu.php');
if (!empty($_SESSION['role'])) {
  header('location: admin.php');
}
?>

<div class="container my-5">
  <div class="row">
    <div class="col-md-5 pt-5">
      <h1><span class="text-primary">The best</span> event platform</h1>
      <h2>Waiting for you to <span class="text-primary">join</span> them</h2>
    </div>
    <div class="col-md-7">
      <img class="w-100" src="img/head-img.jpg" alt="head">
    </div>
  </div>
</div>

<?php require('components/history.php'); ?>

<div class="container my-5">
  <h3>All Event</h3>
  <div class="row" id="event">
    <script src="js/getEvent.js"></script>
  </div>
</div>

<?php require('components/footer.php'); ?>