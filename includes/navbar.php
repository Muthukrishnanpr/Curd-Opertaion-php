<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
  <div class="container">
    <a class="navbar-brand fs-3 fw-bolder fst-italic py-3" href="#"><u>Aadhithya</u></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
        <li class="nav-item me-5">
          <a class="nav-link text-dark fs-5" href="index.php">Home</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link text-dark fs-5" href="#">About Us</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link text-dark fs-5" href="#">Contact Us</a>
        </li>
    </div>
    <?php if (isset($_SESSION['authenticated'])) : ?>

<?php if (empty($_SESSION['auth_user']['user_profile'])) : ?>

  <div class="dropdown">
  <button class="btn btn-warning dropdown-toggle fw-bold fs-6 my-2 text-uppercase" type="button"
     id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false">
      <?= $_SESSION['auth_user']['user_name'][0] ?>
    </button>
    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuOffset">
      <li><a class="dropdown-item" href="uploadhere.php">Add Post</a></li>
      <li><a class="dropdown-item" href="Profile.php">My Profile</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <form action="" method="post">
          <button type="submit" class="dropdown-item" name="logout_btn">Logout</button>
        </form>
      </li>
    </ul>
  </div>

<?php elseif (isset($_SESSION['auth_user']['user_profile'])) : ?>

  <div class="dropdown">
  <img src="upload/Profile/<?= $_SESSION['auth_user']['user_profile'] ?>"
     class=" dropdown-toggle navbar-profile rounded-circle" alt=""
     id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false">
    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuOffset">
      <li><a class="dropdown-item" href="uploadhere.php">Add Post</a></li>
      <li><a class="dropdown-item" href="Profile.php">My Profile</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <form action="" method="post">
          <button type="submit" class="dropdown-item" name="logout_btn">Logout</button>
        </form>
      </li>
    </ul>
  </div>

<?php endif; ?>
<?php endif; ?>


  </div>
</nav>