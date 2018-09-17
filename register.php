<?php
  require('components/header.php');
  require('components/menu.php');

  if (!empty($_SESSION['user'])) {
    header('location: index.php');
  }
?>

<div class="container row d-flex justify-content-center mx-0 mb-5 mx-sm-auto">
  <div class="col-lg-8 py-4 rounded border">
    <form action="php/register.php" method="post" id="register-form">
      <h4 class="text-center mb-4">Register</h4>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="text-center w-100" for="username">Username</label>
            <input class="form-control" id="username" name="username" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="text-center w-100" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="text-center w-100" for="fname">First name</label>
            <input class="form-control" id="fname" name="fname" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="text-center w-100" for="lname">Last name</label>
            <input class="form-control" id="lname" name="lname" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="text-center w-100" for="email">E-mail</label>
            <input class="form-control" id="email" name="email" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="text-center w-100" for="tel">Tel.</label>
            <input class="form-control" id="tel" name="tel" required>
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-center mb-2">
        <div class="col-md-6">
          <div class="form-group">
            <label class="text-center w-100" for="id-num">ID-Card</label>
            <input class="form-control" id="id-num" name="id-num" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-3 d-flex justify-content-center" id="status"></div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-3 d-flex justify-content-center">
          <button type="submit" class="btn btn-light border border-success" name="register">Submit</button>
        </div>
        <div class="col-3 d-flex justify-content-center">
          <a href="index.php" class="btn btn-light border border-danger">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="js/register.js"></script>

<?php require('components/footer.php'); ?>
  