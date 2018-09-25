<?php
session_start();
session_destroy();

echo "<script language='javascript'>alert('Logout successfully.')</script>";
echo "<meta http-equiv='refresh' content='0;url=login.php' />";
 ?>
