<?php include('./includes/header.php'); 
//DEFINE CONSTANTS TO BE USED
DEFINE('HOME_URL', __DIR__);
$_SESSION['HOME_URL'] = HOME_URL;
echo HOME_URL;

?>

<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Homepage</h2>
			<?php echo $user_logged_in === true ? "You're logged in" : "You're logged out"; ?>
		</div>
		<div class="interactive_section">
			<?php if ($user_logged_in === true) {
			?>
				<a href="logout.php" class="btn btn-signup">Logout</a>
			<?php
			} else {
			?>
				<a href="login.php" class="btn btn-login">Login</a>
				<a href="signup.php" class="btn btn-register">Signup</a>
			<?php
			}
			?>
		</div>
	</div>
</section>

<?php include('./includes/footer.php'); ?>