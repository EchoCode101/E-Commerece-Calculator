<?php session_start(); ?>
<p>Please Wait ...</p>
<?php session_destroy();
	header('refresh:1;url=login.php');
 ?>