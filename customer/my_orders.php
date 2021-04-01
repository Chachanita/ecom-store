<center>
	<h1>my orders</h1>
	<p class="lead">All your orders here</p>
	<p class="text-muted">if you have any question, feel free to<a href="../contact.php"> contact us</a>. Our customer Service work <strong>24/7</strong></p>
</center>
<div class="table-reponsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>on:</th>
				<th>due amount:</th>
				<th>invoice no:</th>
				<th>qty:</th>
				<th>size</th>
				<th>order dates:</th>
				<th>paid/unpaid:</th>
				<th>status:</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$customer_session = $_SESSION['customer_email'];
			$get_customer = "select * from customers where customer_email='$customer_session'";
			$run_customer = mysqli_query($con,$get_customer);
			$row_customer = mysqli_fetch_array($run_customer);
			$customer_id = $row_customer['customer_id'];
			$get_orders = "select * from customers_orders where customer_id='$customer_id'";
			$run_orders = mysqli_query($con,$get_orders);
			$i=0;
			while($row_orders = mysqli_fetch_array($run_orders)){
				$order_id = $row_orders['order_id'];
				$due_amount = $row_orders['due_amount'];
				$invoice_no = $row_orders['invoice_no'];
				$qty = $row_orders['qty'];
				$size = $row_orders['size'];
				$order_date = substr($row_orders['order_date'],0,11);
				$order_status = $row_orders['order_status'];
				$i++;
				if($order_status == 'pending'){
					$order_status = 'unpaid';
				}else{
					$order_status = 'paid';
				}
				
			
			?>
			<tr>
				<th><?php echo $i; ?></th>
				<td> $<?php echo $due_amount; ?></td>
				<td><?php echo $invoice_no; ?></td>
				<td><?php echo $qty; ?></td>
				<td><?php echo $size; ?></td>
				<td><?php echo $order_date; ?></td>
				<td><?php echo $order_status; ?></td>
				<td>
					<a href="confirm.php?order_id='<?php echo $order_id; ?>'" target="_blank" class="btn btn-primary btn-sm">confirm paid</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>