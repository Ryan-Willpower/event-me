<?php $title = $_GET['title'];
if (!empty($_SESSION['user']) && empty($_SESSION['role']) ) : ?> 

<p><strong>Want to enter this event?</strong> Upload your payment right now!</p>

<form id="upload" action="php/upload.php?title=<?= $title ?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="payment" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<div id="pdf" class="mt-3"></div>

<?php else : ?>
<p><strong>Want to enter this event?</strong> please
  <a class="text-info" href="login.php">Login</a> or
  <a class="text-info" href="register.php">Register</a>
  now!
</p>
<?php endif; ?>


