<?php 
include('./includes/header.php');

$username = $_SESSION['username'];
$user_id = $_SESSION['id'];

if(empty($user_id) || $user_id == "") {
	// header("location: welcome.php");
	header('location: index.php');
}
?>
<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Welcome <?php echo $_SESSION['username']?></h2>
			<p>You are logged in</p>
		</div>
		<div class="interactive_section">
			<a href="logout.php" class="btn btn-signup">Logout</a>
		</div>
	</div>
</section>

<?php include('./includes/footer.php'); ?>