<?php include_once "connect.php" ?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
			<?php include_once "inc/head.php" ?>
			<style>
				.form-control{
					width: 200px;
				}
			</style>

	</head>
	<body class="hold-transition sidebar-mini">
		<div class="wrapper">
			<?php include_once "inc/nav.php" ?>	
			<?php include_once "inc/sidebar.php" ?>
			<div class="content-wrapper pl-5 pr-5">
				<?php if(!empty($msg)): ?>
			        <div class="text-center alert alert-<?=$sts?>"><?=$msg?></div>
			      <?php endif; ?>
			    <!-- Content Header (Page header) -->
			    <h2 class="font-weight-bold text-center mb-5 pt-4">Add GST in %age</h2>
				<form method="post">
				<input type="hidden" name="id">
				<div class="row">
			      <div class="col-md-12">
			        <div class="form-group">
			        <label>
			          Add GST in %age 
			        </label>
			        <input type="number" required class="form-control" value="<?=@ucwords($fetchUserID['percentage_gst'])?>" name="percentage_gst">
			      </div>
			    </div>
			</div>
				<?php if(empty($fetchUserID)): ?>
					<button class="btn btn-primary pl-4 pr-4" type="submit" name="gst_save_btn">Save</button><br><br>
				<?php else: ?>
					<button class="btn btn-primary pl-4 pr-4" type="submit" name="gst_update_btn">Update</button>
				<?php endif; ?>
			</form>
			<table class="table table-striped table-inverse table-hover mt-4" style="border:2px solid #dcdcdc; border-radius: 10px !important;">
					<thead>
						<tr>
							<th class="text-center">GST in %age</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $q=mysqli_query($dbc, 'SELECT * FROM `percentage_gst` ORDER BY `percentage_gst`.`id` DESC'); 
							while($r=mysqli_fetch_assoc($q)): ?>
						<tr>
							<td class="pt-3 text-center">
								 <?=ucwords(@$r['percentage_gst'])?>
							</td>
							<th class="text-center">
									<a href="gst.php?edit_gst_id=<?=base64_encode($r['id'])?>" class="btn btn-primary">
										<span name="edit_gst" class="fa fa-edit"></span> Edit
									</a>

									<a href="gst.php?del_gst_id=<?=base64_encode($r['id'])?>" class="btn btn-danger">
										<span name="delete_gst" class="fa fa-times"></span>
										Delete
									</a>
								</th>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php include_once "inc/footer.php" ?>
		</div>

	<?php include_once "inc/foot.php" ?>
	</body>
</html>