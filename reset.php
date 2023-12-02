<?php include_once 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<?php include_once 'inc/head.php' ?>
	<style>
		.reset_form{
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
		<div class="reset_form">
			<h2 class="text-center font-weight-bold pt-4">Reset Password</h2>
			<hr>
				<form method="POST" class="pl-4 pr-4 pb-5 pt-3" role="form">	
					<?php if(!empty($msg)): ?>
						<div class="alert alert-<?=$sts?>"><?=$msg?></div>
					<?php endif; ?>
					<div class="form-group">
						<label for="">Old Password</label>
						<input type="password" class="form-control" placeholder="*******" name="old_password" required value="<?=@$_REQUEST['old_password']?>">
					</div>
					<div class="form-group">
						<label for="">New Password</label>
						<input type="password" class="form-control" placeholder="*******" name="new_password" required value="<?=@$_REQUEST['new_password']?>">
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input type="password" class="form-control" placeholder="*******" name="confirm_password" required value="<?=@$_REQUEST['confirm_password']?>">
					</div>
					<button type="submit" name="reset_password" class="btn btn-primary btn-block">Reset</button>
				</form>
		</div><!--=====reset_form =====-->
	</div><!-- container -->
<?php include_once "inc/foot.php" ?>

</body>
</html>