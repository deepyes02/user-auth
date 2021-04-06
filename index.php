<?php include('./includes/header.php'); ?>
<section class="header_notice">
	<span>If !user logged in -> show login and signup<br>else -> show logout only</span>
</section>
<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Welcome To MY APP</h2>
			<p>Logged in users enjoy many benifits, it's super secure and takes less than a minute.</p>
		</div>
		<div class="interactive_section">
			<a href="login.php" class="btn btn-login">Login</a>
			<a href="#" class="btn btn-register">Signup</a>
			<a href="#" class="btn btn-signup">Logout</a>
		</div>
	</div>
</section>

<?php include('./includes/footer.php'); ?>