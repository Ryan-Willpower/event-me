<?php
require('components/header.php');
require('components/menu.php');
// if (empty($_GET['title'])) {
//   header('location: index.php');
// }
?>

<div class="container">
  <div class="container my-5 py-5 border rounded">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-6 text-center mb-3">
          <h3 id="title"></h3>
        </div>
      </div>
      <div class="row justify-content-md-center mb-5">
        <div class="col-12 col-md-6">
          <img class="w-100 rounded" src="https://firebasestorage.googleapis.com/v0/b/conf-62008.appspot.com/o/event%2Fconf_Event3.jpg?alt=media&token=5d95e412-d74c-46c1-bce4-3f1672fea1c4">
        </div>
      </div>
      <div class="container-fluid d-flex flex-column align-items-center">
        <h4 id="place"></h4>
        <h4 id="date"></h4>
        <?php include('components/join-status.php'); ?>
      </div>
    </div>
  </div>
</div>

<script src="js/event.js"></script>

<?php require('components/footer.php'); ?>