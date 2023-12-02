<?php include_once 'connect.php'; 
	if (isset($_SESSION['user_login'])) {
		header('location:admin.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<?php include_once 'inc/head.php' ?>
	<style>
		.login_form{
			width: 400px;
			margin-left:350px; 
			margin-top: 70px;
			box-sizing: border-box;
			border-radius: 50px;
			border:4px solid #c0c0c0;
			background-color: #fff;
		}
	</style>
</head>
<body style="background-color: #eee;">
	<div class="container">
		<div class="login_form">
			<h2 class="text-center font-weight-bold pt-4 pl-2 pr-2">Login to Enter Admin Panel</h2>
			<hr>
			<div>
				<form method="POST" class="pl-4 pr-4 pb-5 pt-3" role="form">	
					<?php if(!empty($msg)): ?>
						<div class="alert alert-<?=$sts?>"><?=$msg?></div>
					<?php endif; ?>			
						<div class="form-group">
							<label for="">Username / Email</label>
							<input type="text" class="form-control" required name="email" placeholder="john123 or example@gmail.com" value="<?=@$_REQUEST['email']?>">
						</div>

						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" required name="password" placeholder="Password" value="<?=@$_REQUEST['password']?>">
						</div>				
					
						<button type="submit" name="login_btn" class="btn btn-primary btn-block">Login</button>
				</form>
			</div>
		</div><!-- login_form -->
	</div><!-- container -->
<?php include_once "inc/foot.php" ?>

</body>
</html>