<?php include('./includes/header.php'); ?>

<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Signup</h2>
			<p>Signup using your email and password</p>
		</div>
		<form action="#" method="POST">
			<div class="form_row">
				<label for="signup_user_email">Email</label>
				<input type="text" name="signup_user_email" id="signup_user_email">
			</div>
			<div class="form_row">
				<label for="signup_user_pass">Password</label>
				<input type="text" name="signup_user_pass" id="signup_user_pass">
			</div>
			<div class="form_row">
				<input type="submit" value="Register" class="btn btn-login" />
			</div>
		</form>
		<div class="form_row">
			<p>Already have an account?<a href="http://localhost:7070/user_authentication/login.php">Login</a></p>
		</div>
	</div>
</section>

<?php include('./includes/footer.php'); ?>

<?php

?>