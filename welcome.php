<?php 
//session start
session_start();
$user_id = $_SESSION['id'];
$user_name = $_SESSION['username'];
echo $user_id;echo $user_name;

if(empty($user_id) || $user_id = ""){
	//redirect user to home page
	header("location: index.php");
}

include('./includes/header.php'); ?>
<section class="header_notice">
	<span>If !user logged in -> show login and signup<br>else -> show logout only</span>
</section>
<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Welcome <?php echo $user_name;?></h2>
			<p>Do Something.</p>
		</div>
		<div class="interactive_section">
			<a href="./logout.php" class="btn btn-signup">Logout</a>
		</div>
	</div>
</section>

<?php include('./includes/footer.php'); ?>