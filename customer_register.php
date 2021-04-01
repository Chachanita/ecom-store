<?php
	$active='account';
	include("includes/header.php");

?>
<div id="content">
	<div class="container">
		<div class="col-md-12">
		`	<ul class="breadcrumb">
				<li>
					<a href="index.php">home</a>
				</li>
				<li>
					register
				</li>
			</ul>
		</div>
		<div class="col-md-3">
		
			<?php
			include("includes/sidebar.php");
			?>

		</div>
		<div class="col-md-9">
			<div class="box">
				<div class="box-header">
					<center>
						<h2>register a new contact</h2>
					</center>
					<form action="customer_register.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>your name</label>
							<input type="text" class="form-control" name="c_name" required>
						</div>
						<div class="form-group">
							<label>your email</label>
							<input type="text" class="form-control" name="c_email" required>
						</div>
						<div class="form-group">
							<label>password</label>
							<input type="password" class="form-control" name="c_pass" required>
						</div>
						<div class="form-group">
							<label>your country</label>
							<input type="text" class="form-control" name="c_country" required>
						</div>
						<div class="form-group">
							<label>your city</label>
							<input type="text" class="form-control" name="c_city" required>
						</div>
						<div class="form-group">
							<label>your contact</label>
							<input type="text" class="form-control" name="c_contact" required>
						</div>
						<div class="form-group">
							<label>address</label>
							<input type="text" class="form-control" name="c_address" required>
						</div>
						<div class="form-group">
							<label>your profile picture</label>
							<input type="file" class="form-control form-height-custom" name="c_image" required>
						</div>
						<div class="text-center">
							<button type="submit" name="register" class="btn btn-primary">
							<i class="fa fa-user-md"></i> register
							</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
<?php
	include("includes/footer.php");
?>





    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['register'])){
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = $_POST['c_pass'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_contact = $_POST['c_contact'];
	$c_address = $_POST['c_address'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	$c_ip = getRealIpUser();
	move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
	$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) 
	values('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
	$run_customer = mysqli_query($con,$insert_customer);
	$sel_cart = "select * from cart where ip_add='$c_ip'";
	$run_cart = mysqli_query($con,$sel_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if($check_cart>0){
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('you have registered succesfully')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}else{
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('you have registered succesfully')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}

	
	
}
?>