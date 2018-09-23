<?php $title = $_GET['title'];
if (!empty($_SESSION['user']) && empty($_SESSION['role']) ) : ?> 

<p><strong>Want to enter this event?</strong> Upload your payment right now!</p>

<form id="upload" action="php/upload.php?title=<?= $title ?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="payment" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<div id="pdf" class="mt-3"></div>

<?php elseif (!empty($_SESSION['user']) && !empty($_SESSION['role'])) : ?>

<h4 class="mt-4">Edit</h4>
<form class="form-inline" id="edit" action="php/edit.php?title=<?= $title ?>" method="post">
  <div class="form-group mx-1">
    <label for="title" class="sr-only">Title</label>
    <input id="title" class="form-control" placeholder="Title">
  </div>
  <div class="form-group mx-1">
    <label for="place" class="sr-only">Place</label>
    <input id="place" class="form-control" placeholder="Place">
  </div>
  <div class="form-group mx-1">
    <label for="date" class="sr-only">Date</label>
    <input type="date" id="date" class="form-control" placeholder="date">
  </div>
  <div class="form-group mx-1">
    <label for="time" class="sr-only">Date</label>
    <input type="time" id="time" class="form-control" placeholder="date">
  </div>
  <button type="submit" class="mx-1 btn btn-light border border-success rounded">Submit</button>
</form>

<div id="alert"></div>

<a class="mt-4" href="php/admin/completed.php">Mark as completed</a>

<script src="js/admin/edit.js"></script>

<?php else : ?>
<p><strong>Want to enter this event?</strong> please
  <a class="text-info" href="login.php">Login</a> or
  <a class="text-info" href="register.php">Register</a>
  now!
</p>
<?php endif; ?>


