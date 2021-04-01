<div class="box">
	<?php
	$session_email = $_SESSION['customer_email'];
	
	$select_customer = "select * from customers where customer_email='$session_email'";
	$run_customer = mysqli_query($con,$select_customer);
	$row_customer = mysqli_fetch_array($run_customer);
	
	$customer_id = $row_customer['customer_id'];
	
	?>
	<h1 class="text-center">payment options for you</h1>
	<p class="lead text-center">
		<a href="orders.php?c_id=<?php echo $customer_id?>">offline payment</a>
	</p>
	<center>
		<p class="lead">
			<a href="#">
			paypal payment
			<img class="img-responsive" src="images/paypal-img.png" alt="img-paypal">
			</a>
		</p>
	</center>
</div>