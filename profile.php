<?php
  require('components/header.php');
  require('components/menu.php');
?>

<div class="container">
  <div class="row my-5 d-flex flex-column align-items-center">
    <div class="col-8 border rounded">
      <form id="edit-form" class="p-4" action="php/edit_profile.php" method="post">
        <div class="row">
          <div class="col-12 my-4 text-center"><h4>Edit profile</h4></div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="fname">Firstname</label>
              <input class="form-control" id="fname" name="fname">
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="lname">Lastname</label>
              <input class="form-control" id="lname" name="lname">
            </div>
          </div>
        </div> <!-- end row -->
        <div class="row mb-4">
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" id="email" name="email">
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="tel">Tel</label>
              <input class="form-control" id="tel" name="tel">
            </div>
          </div>
        </div> <!-- end row -->
        <div class="row">
          <div class="col-12 d-flex justify-content-center">
            <button type="submit" id="submit" class="btn btn-light border border-warning rounded px-4">Edit</button>
          </div>
        </div> <!-- end row -->
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row my-5 d-flex flex-column align-items-center">
    <div class="col-8 border rounded">
      <form id="pwd-change" class="p-4" action="php/change_password.php" method="post">
        <div class="status" id="change-status"></div>
        <div class="row">
          <div class="col-12 my-4 text-center"><h4>Change password</h4></div>
        </div>
        <div class="row">
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="current">Current password</label>
              <input type="password" class="form-control" id="current" name="current">
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="new">New password</label>
              <input type="password" class="form-control" id="new" name="new">
              <small class="form-text text-muted">6-8 characters.</small>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="confirm">Confirm password</label>
              <input type="password" class="form-control" id="confirm" name="confirm">
              <small class="form-text text-muted">Type password again.</small>
            </div>
          </div>
        </div> <!-- end row -->
        <div class="row">
          <div class="col-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-light border border-warning rounded">Confirm</button>
          </div>
        </div> <!-- end row -->
      </form>
    </div>
  </div>
</div>

<script src="js/getUserData.js"></script>
<script src="js/edit.js"></script>
<script src="js/editPwd.js"></script>

<?php require('components/footer.php');