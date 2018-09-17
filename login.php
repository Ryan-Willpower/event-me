<?php 
require('components/header.php'); 
require('components/menu.php');

if ( isset( $_SESSION['user'] ) ) {
  header('location: index.php');
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-7 mb-5">
      <img class="w-100 rounded" src="img/login-img.jpg">
    </div>
    <div class="col-md-5">
      <form
        class="d-flex flex-column align-items-center justify-content-center h-100" 
        action="php/login.php" method="post" id="login-form"
      >
        <div class="status w-75"></div>
        <h3>Login</h3>
        <div class="form-group w-75">
          <label for="username">Username</label>
          <input id="username" class="form-control shadow-sm" name="username">
        </div>
        <div class="form-group w-75">
          <label for="password">Password</label>
          <input type="password" id="password" class="form-control shadow-sm" name="password">
        </div>
        <button
          class="btn btn-light btn-lg border border-success"
          type="submit" name="login">Login</button>
      </form>
    </div>
  </div>
  <div class="row mb-5 d-flex justify-content-center">
    <div class="mt-5 mt-md-1 col-12 col-md-5 d-flex justify-content-center align-items-center flex-wrap text-center">
      <h3>Don't have an account? Just</h3>
      <a class="ml-3 btn btn-lg btn-light border border-danger" href="register.php">Sign up</a>
    </div>
  </div>
</div>

<script src="js/login.js"></script>

<?php require('components/footer.php'); ?>