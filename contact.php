<?php
	$active='contact';
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
					contact
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
						<h2>feel free contact us</h2>
						<p class="text-muted">
							if you have any question, feel free to to contact us. Our customer Service work <strong>24/7</strong>
						</p>
					</center>
					<form action="contact.php" method="post">
						<div class="form-group">
							<label>name</label>
							<input type="text" class="form-control" name="name" required>
						</div>
						<div class="form-group">
							<label>email</label>
							<input type="text" class="form-control" name="email" required>
						</div>
						<div class="form-group">
							<label>subject</label>
							<input type="text" class="form-control" name="subject" required>
						</div>
						<div class="form-group">
							<label>message</label>
							<textarea name="message" class="form-control"></textarea> 
						</div>
						<div class="text-center">
							<button type="submit" name="submit" class="btn btn-primary">
							<i class="fa fa-user-md"></i> send message
							</button>
						</div>
					</form>
					<?php
					if(isset($_POST['submit'])){
						///admin receives message with this///
						$sender_name = $_POST['name'];
						$sender_email = $_POST['email'];
						$sender_subject = $_POST['subject'];
						$sender_message = $_POST['message'];
						$receiver_email = "chachananita201@gmail.com";
						mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
						///auto reply to sender with this///
						$email = $_POST['email'];
						$subject = "welcome to our website";
						$_msg = "thank you for your feedback, we will reply as soon as possible";
						$from = "chachananita201@gmail.com";
						mail($email,$subject,$_msg,$from);
						echo "<h2 align='center'>message was sent successfully</h2>";
					}
					?>

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