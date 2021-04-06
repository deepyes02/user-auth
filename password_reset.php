<?php include('./includes/header.php'); ?>
<section class="header_notice">
	<span>If !user logged in -> show login and signup<br>else -> show logout only</span>
</section>
<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Reset Your Password</h2>
			<p>Enter your email, and we'll forward you the link to reset password</p>
		</div>
		<form action="#" method="POST">
			<div class="form_row">
				<label for="login_email">Email</label>
				<input type="email" name="login_email">
			</div>
			<div class="form_row">
				<input type="submit" value="Reset My Password" class="btn btn-login" />
			</div>
		</form>
		<form action="password_reset.php" method="GET">
			<div class="form_row">
				<p>Don't have an account yet?<a href="http://localhost:7070/user_authentication/signup.php">Signup</a></p>
			</div>
		</form>
	</div>
</section>

<?php include('./includes/footer.php'); ?>
