<?php 
	session_start();
	@$dbc=mysqli_connect('localhost','root','','e-commerce_calculator');
	if (!$dbc) {
		echo mysqli_connect_error();
		exit;
	}
	$get_nav = (empty($_REQUEST['nav']))?"admin":$_REQUEST['nav'];
	// $page="pages/".$get_nav.".php";
	@$fetchUser = mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM users WHERE email ='$_SESSION[user_login]' OR username = '$_SESSION[user_login]' "));

		/*-----------User Login Module-----------*/

	if (isset($_REQUEST['login_btn'])) {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$getuserData=mysqli_query($dbc, "SELECT * FROM users WHERE (username='$email' OR email='$email') AND (password='$password') ");
		@$count=mysqli_num_rows($getuserData);
		
		if ($count==1) {
		$_SESSION['user_login']=$email;
		$msg="Please Wait ...";
		$sts="success";
		header('refresh:2;url=index.php');
		}else{
		$msg="Invalid Username / Email or Password";
		$sts="danger";
		}
	}
	/*-----------User Login Module-----------*/

	/*-----------Reset Password Module-----------*/
	if (isset($_REQUEST['reset_password'])) {
		$old_password = $_REQUEST['old_password'];
		$new_password = $_REQUEST['new_password'];
		$confirm_password = $_REQUEST['confirm_password'];
		if ($fetchUser['password']==$old_password) {
			if ($new_password==$confirm_password) {
				if (mysqli_query($dbc, "UPDATE users SET password = '$new_password' WHERE user_id = '$fetchUser[user_id]' ")) {
						session_destroy();
						header("refresh:2;url=login.php");
						$msg="Password has been Changed...";
						$sts="success";

				}else{
					$msg = mysqli_error($dbc);
					$sts = 'danger';
				}
			}else{
				$msg = "New Password & Confirm Passwords don't match";
				$sts = 'warning';
			}
		}else{
			$msg = "Old Password doesn't match";
			$sts = 'danger';
		}
	}
	/*-----------Reset Password Module-----------*/

	//=======For Changing initials of Calculation=======//


		if (isset($_REQUEST['category_save_btn'])) {
			$id = $_REQUEST['id'];
			$category = $_REQUEST['category'];
			$percentage_commission = $_REQUEST['percentage_commission'];
			
				//for Categories
			if (mysqli_query($dbc, "INSERT INTO categories(category,percentage_commission) VALUES ('$category', '$percentage_commission')")) {
				header("refresh:1.5");
				$msg="Data has been Inserted...";
				$sts="success";
				}else{
					$msg = mysqli_error($dbc);
					$sts = 'danger';
				}
		}


		if (isset($_REQUEST['gst_save_btn'])) {
			$percentage_gst = $_REQUEST['percentage_gst'];
					
			//for GST %age
			if (mysqli_query($dbc, "INSERT INTO percentage_gst(percentage_gst) VALUES ('$percentage_gst')")) {
				header("refresh:1.5");
				$msg="Data has been Inserted...";
				$sts="success";
							
			}else{
				$msg = mysqli_error($dbc);
				$sts = 'danger';
			}
		}


				if (isset($_REQUEST['shipping_save_btn'])) {
					$name = $_REQUEST['name'];
					$price_range_1 = $_REQUEST['price_range_1'];
					$price_range_2 = $_REQUEST['price_range_2'];
					$price_range_3 = $_REQUEST['price_range_3'];
				//for shipping zones

					if (mysqli_query($dbc, "INSERT INTO shipping_zones(name,price_range_1,price_range_2,price_range_3) VALUES ('$name', '$price_range_1', '$price_range_2', '$price_range_3')")) {
						header("refresh:1.5");
						$msg="Data has been Inserted...";
						$sts="success";

					}else{
						$msg = mysqli_error($dbc);
						$sts = 'danger';
					}
				}
					
	//=======For Changing initials of Calculation=======//


	//=======Delete Module=======//

//-------For Categories-------//

	if (!empty($_REQUEST['del_category_id'])) {
		$del_category_id=base64_decode($_REQUEST['del_category_id']);
		$msg='<form action="" method="post">
				 	<div class="radio text-center">
				 		<label>
				 			 <input type="radio" name="choice" value="yes"> Yes
				 		</label> | 
				 		<label>
				 			 <input type="radio" name="choice" value="no"> No
				 		</label>
				 	</div>
				 	<center>
				 		<button class="btn btn-danger text-center" type="submit">Confirm</button>
				 	</center>
				 </form>';
		$sts="warning";
	if (!empty($_REQUEST['choice']) AND $_REQUEST['choice']=="yes") {
			$q=mysqli_query($dbc, "DELETE FROM categories WHERE id='$del_category_id'");
			if ($q) {
				$msg="Category Deleted...";
				$sts="danger";
				header('refresh:2;url=categories.php');
			}else{
				$msg=mysqli_error($dbc);
				$sts="danger";
			}
		}
		if (!empty($_REQUEST['choice']) AND $_REQUEST['choice']=="no") {
			header('refresh:0;url=categories.php');
		}
	}

//-------For GST-------//


	if (!empty($_REQUEST['del_gst_id'])) {
		$del_gst_id=base64_decode($_REQUEST['del_gst_id']);
		$msg='<form action="" method="post">
				 	<div class="radio text-center">
				 		<label>
				 			 <input type="radio" name="choice" value="yes"> Yes
				 		</label> | 
				 		<label>
				 			 <input type="radio" name="choice" value="no"> No
				 		</label>
				 	</div>
				 	<center>
				 		<button class="btn btn-danger text-center" type="submit">Confirm</button>
				 	</center>
				 </form>';
		$sts="warning";
	if (!empty($_REQUEST['choice']) AND $_REQUEST['choice']=="yes") {
			$q=mysqli_query($dbc, "DELETE FROM percentage_gst WHERE id='$del_gst_id'");
			if ($q) {
				$msg="%age GST Deleted...";
				$sts="danger";
				header('refresh:2;url=gst.php');
			}else{
				$msg=mysqli_error($dbc);
				$sts="danger";
			}
		}
		if (!empty($_REQUEST['choice']) AND $_REQUEST['choice']=="no") {
			header('refresh:0;url=gst.php');
		}
	}

//-------For Shipping Zones-------//
if (!empty($_REQUEST['del_shipping_id'])) {
		$del_shipping_id=base64_decode($_REQUEST['del_shipping_id']);
		$msg='<form action="" method="post">
				 	<div class="radio text-center">
				 		<label>
				 			 <input type="radio" name="choice" value="yes"> Yes
				 		</label> | 
				 		<label>
				 			 <input type="radio" name="choice" value="no"> No
				 		</label>
				 	</div>
				 	<center>
				 		<button class="btn btn-danger text-center" type="submit">Confirm</button>
				 	</center>
				 </form>';
		$sts="warning";
	if (!empty($_REQUEST['choice']) AND $_REQUEST['choice']=="yes") {
			$q=mysqli_query($dbc, "DELETE FROM shipping_zones WHERE id='$del_shipping_id'");
			if ($q) {
				$msg="Shipping Zone & Charges Deleted...";
				$sts="danger";
				header('refresh:2;url=shipping.php');
			}else{
				$msg=mysqli_error($dbc);
				$sts="danger";
			}
		}
		if (!empty($_REQUEST['choice']) AND $_REQUEST['choice']=="no") {
			header('refresh:0;url=shipping.php');
		}
	}


	//=======Delete Module=======//


	//=======Edit Module=======//


	//-------------For Category-------------//


	if (isset($_REQUEST['category_update_btn'])) {
		$edit_category_id=base64_decode($_REQUEST['edit_category_id']);
		$data=[
			'category'=>$_REQUEST['category'],
			'percentage_commission'=>$_REQUEST['percentage_commission']
		];
		
		$update_data=mysqli_query($dbc, "UPDATE categories 
			SET
			category='$data[category]',
			percentage_commission='$data[percentage_commission]'
			WHERE id='$edit_category_id'");
		if ($update_data) {
			$msg="Category Updated...";
			$sts="success";
			header('refresh:1.5;url=categories.php');

		}else{
			$msg=mysqli_error($dbc);
			$sts="danger";
		}
	}
	if (!empty($_REQUEST['edit_category_id'])) {
		$edit_category_id=base64_decode($_REQUEST['edit_category_id']);
		$fetchUserID=mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM categories WHERE id='$edit_category_id'"));
	}

	//-------------For Category-------------//


	//-------------For GST-------------//


	if (isset($_REQUEST['gst_update_btn'])) {
		$edit_gst_id=base64_decode($_REQUEST['edit_gst_id']);
		$data=[
			'percentage_gst'=>$_REQUEST['percentage_gst'],
		];
		
		$update_data=mysqli_query($dbc, "UPDATE percentage_gst 
			SET
			percentage_gst='$data[percentage_gst]'
			WHERE id='$edit_gst_id'");
		if ($update_data) {
			$msg="%age GST Updated...";
			$sts="success";
			header('refresh:1.5;url=gst.php');
		}else{
			$msg=mysqli_error($dbc);
			$sts="danger";
		}
	}
	if (!empty($_REQUEST['edit_gst_id'])) {
		$edit_gst_id=base64_decode($_REQUEST['edit_gst_id']);
		$fetchUserID=mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM percentage_gst WHERE id='$edit_gst_id'"));
	}

	//-------------For GST-------------//


	//-------------For Shipping-------------//


	if (isset($_REQUEST['shipping_update_btn'])) {
		$edit_shipping_id=base64_decode($_REQUEST['edit_shipping_id']);
		$data=[

			'name'=>$_REQUEST['name'],
			'price_range_1'=>$_REQUEST['price_range_1'],
			'price_range_2'=>$_REQUEST['price_range_2'],
			'price_range_3'=>$_REQUEST['price_range_3']
		];
		
		$update_data=mysqli_query($dbc, "UPDATE shipping_zones 
			SET
			name='$data[name]',
			price_range_1='$data[price_range_1]',
			price_range_2='$data[price_range_2]',
			price_range_3='$data[price_range_3]'
			WHERE id='$edit_shipping_id'");
		if ($update_data) {
			$msg="Shipping Zone & Charges Updated...";
			$sts="success";
			header('refresh:1.5;url=shipping.php');

		}else{
			$msg=mysqli_error($dbc);
			$sts="danger";
		}
	}
	if (!empty($_REQUEST['edit_shipping_id'])) {
		$edit_shipping_id=base64_decode($_REQUEST['edit_shipping_id']);
		$fetchUserID=mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM shipping_zones WHERE id='$edit_shipping_id'"));
	}

	//-------------For Shipping-------------//



	//=======Edit Module=======//

	if (isset($_REQUEST['calculate'])) {
				$comm=(int)$_REQUEST['category_com'];
				$price=(int)$_REQUEST['price'];
				$total_comm=(($price*$comm)/100);
				$shipping=$_REQUEST['shipping'];
				$weight=(int)$_REQUEST['weight'];
				$shipped_data = mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM shipping_zones WHERE id='$shipping'" ));
				if ($weight>0 AND $weight<501) {
					$shipping_fee = $shipped_data['price_range_1'];
				}elseif ($weight>500 AND $weight<3001) {
					$total=$weight/500;
					$total=round($total);
					$range1 = $shipped_data['price_range_1'];
					$range2 = $shipped_data['price_range_2'];
					$val=$total-1;
					$shipping_fee=$val*$range2+$range1;
				}
				else{
					if ($weight>3000 AND $weight<12001) {
						$total=$weight/500;
						$total=round($total);
						$range1 = $shipped_data['price_range_1'];
						$range3 = $shipped_data['price_range_3'];
						$val=$total-1;
						$shipping_fee=$val*$range3+$range1;
					}elseif($weight>12000){
						$shipping_fee= "0";
						$msg = "Max Limit is 12Kg.";
						$sts = 'danger';
					}
				}
				if ($price>0 AND $price<501) {
					$collection = 15;
				}
				elseif ($price>500 AND $price<1001) {
					$collection = 22;
				}
				else{
					$collection = 40;
				}
				$total_fee = $collection+$shipping_fee+$total_comm;
				$fetchGST = mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM percentage_gst ORDER BY id DESC LIMIT 1" ));
				$gst_percentage = $fetchGST['percentage_gst'];
				$gst_fee = ($total_fee * $gst_percentage)/100;
				$total_charges = $total_fee + $gst_fee;
				$profit = $price -  $total_charges;
}	
 ?>