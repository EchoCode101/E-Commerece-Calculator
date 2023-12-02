<?php include_once "connect.php" ?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
			<?php include_once "inc/head.php" ?>
			<style>
				.form-control{
					width: 300px;
				}
			</style>
	</head>
	<body class="hold-transition sidebar-mini">
		<div class="wrapper">
			<?php include_once "inc/nav.php" ?>	
			<?php include_once "inc/sidebar.php" ?>
			<div class="content-wrapper  pl-5 pr-5">
				<?php if(!empty($msg)): ?>
			        <div class="text-center alert alert-<?=$sts?>"><?=$msg?></div>
			      <?php endif; ?>
			    <!-- Content Header (Page header) -->
			    <h2 class="font-weight-bold text-center mb-5 pt-4">Add a new Category</h2>
				<form method="post">
				    <input type="hidden" name="id">
				    <div class="row">
				   <div class="col-md-6">
				     <div class="form-group">
				        <label>
				          Add Product Categories
				        </label>
				        <input type="text" required class="form-control" value="<?=@ucwords($fetchUserID['category'])?>" name="category">
				     </div>
				    </div><!--col-->

				    <div class="col-md-6">
				      <div class="form-group">
				        <label>
				          Set %age Commission
				        </label>
				        <input type="number" class="form-control" value="<?=@ucwords($fetchUserID['percentage_commission'])?>" name="percentage_commission">
				      </div>
				    </div><!--col-->
				    </div><!--row-->
				    <?php if(empty($fetchUserID)): ?>
						<button class="btn btn-primary pl-4 pr-4" type="submit" name="category_save_btn">Save</button><br><br>
					<?php else: ?>
						<button class="btn btn-primary pl-4 pr-4" type="submit" name="category_update_btn">Update</button>
					<?php endif; ?>
				</form>
					
				<table class="table table-striped table-inverse table-hover mt-4" style="border:2px solid #dcdcdc; border-radius: 10px !important;">
					<thead>
						<tr>
							<th class="text-center">Names of Categories</th>
							<th class="text-center">%age Commission</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $q=mysqli_query($dbc, 'SELECT * FROM `categories` ORDER BY `categories`.`id` DESC'); 
							while($r=mysqli_fetch_assoc($q)): ?>
						<tr>
							<td class="pt-3 text-center">
								 <?=ucwords(@$r['category'])?>
							</td>
							<td class="pt-3 text-center">
								 <?=ucwords(@$r['percentage_commission'])?>
							</td>
							<th class="text-center">
									<a href="categories.php?edit_category_id=<?=base64_encode($r['id'])?>" class="btn btn-primary">
										<span name="edit_category" class="fa fa-edit"></span> Edit
									</a>

									<a href="categories.php?del_category_id=<?=base64_encode($r['id'])?>" class="btn btn-danger">
										<span name="delete_category" class="fa fa-times"></span>
										Delete
									</a>
								</th>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>



				
		</div><!-- Container -->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php include_once "inc/footer.php" ?>
		</div>

	<?php include_once "inc/foot.php" ?>
	</body>
</html>