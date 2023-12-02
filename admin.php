<?php include_once "connect.php";
  if (!isset($_SESSION['user_login'])) {
    header('location:login.php');
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once "inc/head.php" ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php include_once "inc/nav.php" ?>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once "inc/sidebar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <section>
    <div class="content-wrapper">
    <?php if(!empty($msg)): ?>
        <div class="text-center alert alert-<?=$sts?>"><?=$msg?></div>
      <?php endif; ?>
    <!-- Content Header (Page header) -->
    <h2 class="font-weight-bold text-center mb-5 pt-4">Edit Your E-Commerce Shipping Calculator</h2>
   

    <!---------------------Card--------------------->
    
    

    <!---------------------Card--------------------->


  </div>
  </section>
  <!-- /.content-wrapper -->

 
  <!-- Main Footer -->
  <?php include_once "inc/footer.php" ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include_once "inc/foot.php" ?>
</body>
</html>
