<?php include_once "connect.php" ?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>E-Commerce Shipping Calculator</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

		<style>
			.table td, .table th {
			    padding: .3rem;
			    vertical-align: top;
			    border-top: 1px solid #dee2e6;
			}
			.table td {
				padding-top: 15px !important;
			}
		.calculator{
			box-sizing: border-box;
			border-radius: 50px;
			border:4px solid #c0c0c0;
			background-color: #fff;

		}
	</style>

	</head>
	<body style="background-color: #eee;">
		<div class="container" style="width: 900px; margin-top: 50px;">
			<div class="calculator">
				<h2 class="text-center font-weight-bold pt-4">E-Commerce Shipping Calculator</h2>
			<hr>
			<form method="POST" class="pl-4 pr-4 pb-5 pt-3" role="form" action="">
				<div class="row">
					<div class="col-sm-6 form-group">
						<label><b>Select your Category</b></label>

						<select required name="category_com" id="" class="form-control">
							<?php $getCategories = mysqli_query($dbc, "SELECT * FROM categories ORDER BY category ASC" );
							while($fetchCategories = mysqli_fetch_assoc($getCategories)):?>
							<option value="<?=$fetchCategories['percentage_commission'] ?>" <?=@($fetchCategories['percentage_commission']==$_REQUEST['category_com'])?"selected":""?> >
								<?=ucwords($fetchCategories['category']) ?>
							</option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="col-sm-6 form-group">
						<label><b>Selling Price</b></label>
						<input value="<?=@$_REQUEST['price']?>" required name="price" class="form-control " type="number">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 form-group">
						<label><b>Product Weight in grams.</b></label>
						<input value="<?=@$_REQUEST['weight']?>" required name="weight"  class="form-control " type="number">
						<?php if(!empty($msg)): ?>
							<div class="alert alert-<?=$sts?> font-weight-bold" style="border-radius: 10px !important; width: 150px !important; padding: 2px 4px;"><?=$msg?></div>
						<?php endif; ?>
					</div>
					<div class="col-sm-6 form-group">
						<label><b>Select Shipping Region</b></label>
						<select required name="shipping" id="" class="form-control">
							<option value="">Select Region</option>
							<?php $getShippingZones = mysqli_query($dbc, "SELECT * FROM shipping_zones ORDER BY name ASC" );
							while($fetchShippingZones = mysqli_fetch_assoc($getShippingZones)):?>
							<option value="<?=$fetchShippingZones['id'] ?>" <?=@($fetchShippingZones['id']==$_REQUEST['shipping'])?"selected":""?>>
								<?=ucwords($fetchShippingZones['name']) ?>
							</option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
				<center>
					<button type="submit" class="btn btn-success cal_btn" name="calculate">Calculate</button>
				</center>
			</form>
			
			<div style="border:2px solid #ccc;box-sizing: border-box;  margin-top:-10px;margin-left: 20px; margin-right: 20px; margin-bottom: 30px; border-radius: 20px !important; padding: 5px;">

				 <table class="table table-responsive table-striped table-hover" style="margin-top: -1px; margin-bottom: -1px; border-radius: 15px !important;" >
					<tr>
						<td>&nbsp;</td>
						<th class='text-center'>Commission Fees</th>
						<th class='text-center'>Collection Fees</th>
						<th class='text-center'>Shipping Fees</th>
						<th class='text-center'>Total Fees</th>
						<th class='text-center'>GST on Total Fees</th>
						<th class='text-center'>Total Charges</th>
						<th class='text-center bg-warning'>You <br> Pay</th>
					</tr>

					<tr>
						<th class=' text-center'>Our Kart</th>
						<td class=' text-center'><?=@$total_comm?></td>
						<td class=' text-center'><?=@$collection?></td>
						<td class=' text-center'><?=@$shipping_fee?></td>
						<td class=' text-center'><?=@$total_fee?></td>
						<td class=' text-center'><?=@$gst_fee?></td>
						<td class=' text-center'><?=@$total_charges?></td>
						<td class=' text-center bg-warning'><strong><?=@$profit?></strong></td>
					</tr>
				</table>
			</div>
		</div>

			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script></body>
</html>