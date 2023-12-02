<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i><?=@ucfirst($fetchUser['username'])?></i>
        <i class="far fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
        <a class="btn btn-default dropdown-item text-center bg-warning p-2" style="border-radius: 0rem; margin-top: -10px;" href="reset.php">
         Reset Password
        </a>
        <a class="btn btn-default dropdown-item text-center bg-danger p-2" style="border-radius: 0rem; margin-bottom: -10px;" href="logout.php">
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>