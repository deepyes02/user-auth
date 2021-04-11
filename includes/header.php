<?php
session_start();
?>
<section class="header_notice">
	<?php
	echo "\$_SESSION->";
	var_dump($_SESSION);
	//check if user is already loggin in, if so, redirect to welcome page
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === TRUE) {
		$user_logged_in = true;
		$user_id = $_SESSION['id'];
		$user_name = $_SESSION['username'];
	} else $user_logged_in = false;
	echo "<br>\$user_logged_in -> ";
	var_dump($user_logged_in);
	?>
</section>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User_Authentication</title>
	<link rel="stylesheet" href="style/style_header.css">
</head>
<body>
	<section class="full_section menu_bar">
		<h2><a class="home_title" href="http://localhost:7070/user_authentication/">LOGO</a></h2>
		<div class="right_menu_section">
			<nav id="nav">
				<ul>
					<li class="single_menu"><a href="#">Home</li>
					<li class="single_menu"><a href="#">Welcome</li>
					<li class="has_submenu"><a href="#">Account</a>
						<ul class="submenu">
							<?php
							if ($user_logged_in !== true) {
							?>
								<li class="submenu_item"><a href="http://localhost:7070/user_authentication/login.php">My Profile</a></li>
								<li class="submenu_item"><a href="http://localhost:7070/user_authentication/signup.php">Sign up</a></li>
							<?php
							} else {
							?>
								<li class="submenu_item"><a href="http://localhost:7070/user_authentication/logout.php">Log Out</a></li>
							<?php
							}
							?>
						</ul>
					</li>
					<li class="single_menu"><a href="#">Add Trip</a>
					<li class="single_menu"><a href="#">Show Trips</a>
				</ul>
			</nav>
			<?php
			if ($user_logged_in == true) {
			?>
				<div id="userinfo"><span>You're signed in as <?php echo $user_name ?> </span><a href="http://localhost:7070/user_authentication/logout.php">signout</a></div>
			<?php
			} else {
			?>
				<div id="userinfo"><span><a href="http://localhost:7070/user_authentication/login.php">Login</a></span> / <span><span><a href="http://localhost:7070/user_authentication/signup.php">Signup</a></span></div>
			<?php
			}
			?>
		</div>
	</section>