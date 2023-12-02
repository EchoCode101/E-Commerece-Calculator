<?php include_once "connect.php" ?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
			<?php include_once "inc/head.php" ?>

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
			    <h2 class="font-weight-bold text-center mb-5 pt-4">Enter a Shipping Zone & its Charges</h2>
			<form method="post">
				<input type="hidden" name="id">
				<div class="row">
				<div class="col-md-6">
			        <div class="form-group">
			        <label>
			          Name of Shipping Zone
			        </label>
			        <input type="text" required class="form-control" value="<?=@ucwords($fetchUserID['name'])?>" name="name">
			      </div>
			      </div>
			      <div class="col-md-6">
			        <div class="form-group">
			        <label>
			          Price for 0-500g
			        </label>
			        <input type="number" class="form-control" value="<?=@ucwords($fetchUserID['price_range_1'])?>" name="price_range_1">
			      </div>
			      </div>
			    </div><!-- row -->
			    <div class="row">
			      <div class="col-md-6">
			        <div class="form-group">
			        <label>
			          Price for 500-1000g
			        </label>
			        <input type="number" class="form-control" value="<?=@ucwords($fetchUserID['price_range_2'])?>" name="price_range_2">
			      </div>
			      </div>
			      <div class="col-md-6">
			        <div class="form-group">
			        <label>
			          Price for >1000g
			        </label>
			        <input type="number" class="form-control" value="<?=@ucwords($fetchUserID['price_range_3'])?>" name="price_range_3">
			      </div>
			      </div>
			    </div><!--row-->
					<?php if(empty($fetchUserID)): ?>
						<button class="btn btn-primary pl-4 pr-4" type="submit" name="shipping_save_btn">Save</button><br><br>
					<?php else: ?>
						<button class="btn btn-primary pl-4 pr-4" type="submit" name="shipping_update_btn">Update</button>
					<?php endif; ?>
			</form>

				<table class="table table-striped table-inverse table-hover mt-4" style="border:2px solid #dcdcdc; border-radius: 10px !important;">
					<thead>
						<tr>
							<th class="text-center">Name</th>
							<th class="text-center">Price for 0-500g</th>
							<th class="text-center">Price for 500-1000g</th>
							<th class="text-center">Price for >1000g</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $q=mysqli_query($dbc, 'SELECT * FROM `shipping_zones` ORDER BY `shipping_zones`.`id` DESC'); 
							while($r=mysqli_fetch_assoc($q)): ?>
						<tr>
							<td class="pt-3 text-center">
								 <?=ucwords(@$r['name'])?>
							</td>
							<td class="pt-3 text-center">
								 <?=ucwords(@$r['price_range_1'])?>
							</td>
							<td class="pt-3 text-center">
								 <?=ucwords(@$r['price_range_2'])?>
							</td>
							<td class="pt-3 text-center">
								 <?=ucwords(@$r['price_range_3'])?>
							</td>
							<th class="text-center">
									<a href="shipping.php?edit_shipping_id=<?=base64_encode($r['id'])?>" class="btn btn-primary">
										<span name="edit_region" class="fa fa-edit"></span> Edit
									</a>

									<a href="shipping.php?del_shipping_id=<?=base64_encode($r['id'])?>" class="btn btn-danger">
										<span name="delete_region" class="fa fa-times"></span>
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