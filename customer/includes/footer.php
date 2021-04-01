<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<h4>pages</h4>
				<ul>	
					<li><a href="../cart.php">shopping cart</a></li>
					<li><a href="../contact.php">contact us</a></li>
					<li><a href="../shop.php">shop</a></li>
					<li><a href="my_account.php">my account</a></li>	
				</ul>
				<hr>
				<h4>user section</h4>
				<ul>
					<?php
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='../checkout.php'>log in</a>";
							
						}else{
							echo"<a href='my_account.php?my_orders'>my account</a>";
						}
					?>
					<li>
					<?php
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='../checkout.php'>log in</a>";
							
						}else{
							echo"<a href='my_account.php?edit_account'>edit account</a>";
						}
					?>
					</li>	
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>top products categories</h4>
				<ul>	
					<?php
						$get_p_cats="select*from product_categories";
						$run_p_cats=mysqli_query($con,$get_p_cats);
						while($row_p_cats=mysqli_fetch_array($run_p_cats)){
							$p_cat_id=$row_p_cats['p_cat_id'];
							$p_cat_title=$row_p_cats['p_cat_title'];
							
							echo"
								<li>
									<a href='../shop.php?p_cat=$p_cat_id'>
									$p_cat_title
									</a>
								
								</li>
							
							";
						}
					
					?>
				</ul>
				<hr class="hidden-md hidden-lg">
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Find us:</h4>
				<p>
					<strong>hireit inc.</strong>
					</br>nairobi
					</br>skymall ronald ngala street
					</br>+254-717-818-919
					</br>hireit@gmail.com
					</br><strong>grrrr</strong>
				</p>
				<a href="../contact.php">check our contact page</a>
				
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>get our news</h4>
				<p class="texr-muted">
				to get our latest updates subscribe to out newsletter
				</p>
				<form action="get" method="post">
					<div class="input-group">
						<input type="text" class="form-control" name="email">
						<span class="input-group-btn">
							<input type="submit" value="subscribe" class="btn btn-default">
						</span>
					
					</div>
				</form>
				<hr>
				<h4>keep in touch</h4>
				<p class="social">
					<a href="../#" class="fa fa-facebook"></a>
					<a href="../#" class="fa fa-twitter"></a>
					<a href="../#" class="fa fa-instagram"></a>
					<a href="../#" class="fa fa-linkedin"></a>
					<a href="../#" class="fa fa-envelope"></a>
					
			</div>
		</div>
	</div>
</div>
<div id="copyright">
	<div class="container">
		<div class="col-md=6">
			<p class="pull-left">&copy;miss chacha</p>
		</div>
		<div class="col-md=6">
			<p class="pull-right">theme by: mr mcghie</p>
		</div>
	</div>
</div>