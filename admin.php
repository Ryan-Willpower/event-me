<?php
  require('components/header.php');
  require('components/menu.php');
  if (empty($_SESSION['role'])) {
    header('location: index.php');
  }
?>

<div class="container my-5">
  <h3>All Event</h3>
  <div class="row" id="event">
    <script src="js/admin/getEvent.js"></script>
  </div>
</div>

<?php
  include('components/view.php');
  include('components/edit.php');
  include('components/delete.php');
  include('components/add.php');
  require('components/footer.php'); ?>