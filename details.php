<?php
	$active='cart';
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
					shop
				</li>
				<li>
					<a href="shop.php?p_cat=<?php echo $p_cat_id;?>"><?php echo $p_cat_title;?></a>
				</li>
				<li><?php echo $pro_title;?></li>
			</ul>
		</div>
		<div class="col-md-3">
			<?php
			include("includes/sidebar.php");
			?>

		</div>
		<div class="col-md-9">
			<div id="productmain" class="row">
				<div class="col-md-6">
					<div id="mainimage">
						<div id="mycarousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
								<li data-target="#mycarousel" data-slide-to="1"></li>
								<li data-target="#mycarousel" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="item active">
									<center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="decks"></center>
								</div>
								<div class="item">
									<center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt=""></center>
								</div>
								<div class="item">
									<center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt=""></center>
								</div>	
							</div>
							<a href="#mycarousel" class="left carousel-control" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">previous</span>
							</a>
							<a href="#mycarousel" class="right carousel-control" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">next</span>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="box">
						<h1 class="text-center"><?php echo $pro_title; ?></h1>
						<?php add_cart();?>
						<form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">
							<div class="form-group">
								<label for="" class="col-md-5 control-label">products quantity</label>
								<div class="col-md-7">
									<select name="product_qty" id="" class="form-control">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-5 control-label">product size</label>
								<div class="col-md-7">
									<select name="product-size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('must pick 1 size from the product')">
										<option disabled selected>select size</option>
										<option>small</option>
										<option>medium</option>
										<option>large</option>
										<option>x-large</option>
									</select>
								</div>
							</div>
							<p class="price">kshs <?php echo $pro_price; ?></p>
							<p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> add to cart</button></p>
						</form>
					</div>
					
					<div class="row" id="thumbs">
						<div class="col-xs-4">
							<a data-target="#mycarousel" data-slide-to="0" href="#" class="thumb">
								<img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="decks" class="img-responsive">
							</a>
						</div>
						<div class="col-xs-4">
							<a data-target="#mycarousel" data-slide-to="1" href="#" class="thumb">
								<img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="decks1" class="img-responsive">
							</a>
						</div>
						<div class="col-xs-4">
							<a data-target="#mycarousel" data-slide-to="2" href="#" class="thumb">
								<img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="decks2" class="img-responsive">
							</a>
						</div>
					
					</div>
				
				</div>
			</div>
			<div class="box" id="details">
				<h4>product details</h4>
				<p>
					<?php echo $pro_desc; ?>
				<h4>size</h4>
				<ul>
					<li>small</li>
					<li>medium</li>
					<li>large</li>
				</ul>
				<hr>
			</div>
			<div id="row same-height-row">
				<div class="col-md-3 col-sm-6">
					<div class="box same-height headline">
						<h3 class="text-center">similar products</h3>
					</div>
				</div>
				<?php
				$get_products="select * from products order by rand() LIMIT 0,3 ";
				$run_products=mysqli_query($con,$get_products);
				
				 while($row_products=mysqli_fetch_array($run_products)){
					 $pro_id=$row_products['products_id'];
					 $pro_title=$row_products['product_title'];
					 $pro_img1=$row_products['product_img1'];
					 $pro_price=$row_products['product_price'];
					 echo "
					 <div class='col-md-3 col-sm-6 center-responsive'>
					 <div class='product same-height'>
						<a href='details.php?pro_id=$pro_id'>
							<img class='img-responsive' src='admin_area/product_images/$pro_img1'>
						</a>
						<div class='text'>
							<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price'>kshs $pro_price</p>
						</div>
					</div>
				</div>
				";
				 }
				?>
				
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