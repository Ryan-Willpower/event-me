<?php
$role = $_SESSION['role'] ?? 'none';
?>

<nav class="navbar navbar-expand-lg navbar-light my-3">
  <div class="container">
    <a class="navbar-brand" href="<?= $role == 'none' ? 'index.php' : 'admin.php' ?>">
      <img class="w-75" src="img/logo.svg" alt="logo">
    </a>

    <?php if ( !isset( $_SESSION['user'] ) ) : ?>

    <a role="button" class="btn border border-success rounded text-success" href="login.php">login/register</a>

    <?php elseif ( isset( $_SESSION['user'] ) ) : ?>

    <div class="dropdown">
      <button class="btn btn-light border border-success rounded text-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-3"><i class="far fa-user"></i></span><?= $_SESSION['user']; ?>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="profile.php">My profile</a>
        <a class="dropdown-item" href="php/logout.php">Logout</a>
      </div>
    </div>

    <?php elseif ( isset( $_SESSION['user'] ) && $role == 'admin'  ) : ?>

    <div class="dropdown">
      <button class="btn btn-light border border-success rounded text-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-3"><i class="far fa-user"></i></span><?= $_SESSION['user']; ?>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="php/logout.php">Logout</a>
      </div>
    </div>

    <?php endif; ?>

  </div>
</nav>