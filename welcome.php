<?php 
$user_id = $_SESSION['id'];
$user_name = $_SESSION['username'];

if(empty($user_id) || $user_id = ""){
	//redirect user to home page
	header("location: index.php");
}

include('./includes/header.php'); ?>
<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Welcome <?php echo $user_name;?></h2>
			<p>You are logged in</p>
		</div>
		<div class="interactive_section">
			<a href="logout.php" class="btn btn-signup">Logout</a>
		</div>
	</div>
</section>

<?php include('./includes/footer.php'); ?>