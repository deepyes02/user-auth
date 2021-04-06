<?php include('./includes/header.php'); ?>
<section class="header_notice">
	<span>If !user logged in -> show login and signup<br>else -> show logout only</span>
</section>
<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Login</h2>
			<p>Use your username and password to get into the system.</p>
		</div>
			<form action="#" method="POST">
				<div class="form_row">
					<label for="login_email">Email</label>
					<input type="text" name="login_email">
				</div>
				<div class="form_row">
					<label for="login_user_pass">Password</label>
					<input type="text" name="login_user_pass">
				</div>
				<div class="form_row">
					<input type="submit" value="login" class="btn btn-login" />
				</div>
			</form>
			<hr>
			<div class="form_row">
				<form action="password_reset.php" method="GET">
					<input type="submit" value="I forgot my password" class="btn" />
			</div>
			<div class="form_row">
				<p>Don't have an account yet?<a href="http://localhost:7070/user_authentication/signup.php">Signup</a></p>
			</div>
			</form>

	</div>
</section>

<?php include('./includes/footer.php'); ?>
