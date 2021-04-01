<?php

	session_start();
	include("includes/db.php");
	include("functions/functions.php");

?>
<?php
	if(isset($_GET['pro_id'])){
		$product_id=$_GET['pro_id'];
		
		$get_product="select * from products where products_id='$product_id'";
		
		$run_product=mysqli_query($con,$get_product);
		
		$row_product=mysqli_fetch_array($run_product);
		
		$p_cat_id=$row_product['p_cat_id'];
		
		$pro_title=$row_product['product_title'];
		$pro_price=$row_product['product_price'];
		$pro_desc=$row_product['product_desc'];
		$pro_img1=$row_product['product_img1'];
		$pro_img2=$row_product['product_img2'];
		$pro_img3=$row_product['product_img3'];
		
		$get_p_cat="select*from product_categories where p_cat_id='$p_cat_id'";
		$run_p_cat=mysqli_query($con,$get_p_cat);
		$row_p_cat=mysqli_fetch_array($run_p_cat);
		
		$p_cat_title=$row_p_cat['p_cat_title'];
		
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Izzy-hire</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
	
</head>
<body>
	<div id="top">
		<div class="container">
		
			<div class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
				<?php
			    if(!isset($_SESSION['customer_email'])){
					echo "welcome:Guest";
				}else{
					echo "welcome: " . $_SESSION['customer_email'] . "";
			}
			?>
				</a>
				<a href="checkout.php"><?php item(); ?> items in your cart|| total price <?php total_price();?></a>
			</div>
			
			<div class="col-md-6">
				<ul class="menu">
					<li>
						<a href="../customer_register.php">register</a>
					</li>
					<li>
						<a href="../customer/my_account.php">my account</a>
					</li>
					<li>
						<a href="../cart.php">go to cart</a>
					</li>
					<li>
						<a href="checkout.php">
						<?php
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>login</a>";
						}else{
							echo "<a href='logout.php'>logout</a>";
						}
					?></a>
					</li>
				</ul>
			</div>	
		</div>
	</div>

	<div id="navbar" class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="../index.php" class="navbar-brand home">
					<img src="images/logo1.png" alt="m-dev-store-logo" class="hidden-xs">
					<img src="images/logo2.png" alt="m-dev-store-logo" class="visible-xs" >
				</a>
				<button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">toggle navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only">toggle search</span>
					<i class="fa fa-search"></i>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navigation">
				<div class="padding-nav">
					<ul class="nav navbar-nav left">
						<li>
							<a href="../index.php">home</a>
						</li>
						<li>
							<a href="../shop.php">shop</a>
						</li>
						<li  class="active">
							<a href="../customer/my_account.php">my account</a>
						</li>
						<li>
							<a href="../cart.php">shopping cart</a>
						</li>
						<li>
							<a href="../contact.php">contact us</a>
						</li>
					</ul>
				</div>
				<a href="../cart.php" class="btn navbar-btn btn-primary right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php item(); ?> items in your cart</span>
				</a>
				<div class="navbar-collapse collapse right">
					<button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search" ">
						<span class="sr-only">toggle search</span>
						<i class="fa fa-search"></i>
					</button>
				</div>
				<div class="collapse clearfix" id="search">
					<form method="get" action="results.php" class="navbar-form">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="search" name="user_query" required>
							<span class="input-group-btn">
							<button type="submit" name="search" value="search" class="btn btn-primary">
								<i class="fa fa-search"></i>
							</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>