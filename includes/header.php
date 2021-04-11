<?php
session_start();
?>
<section class="header_notice">
	<?php
	echo "\$_SESSION->";
	var_dump($_SESSION);
	//check if user is already loggin in, if so, redirect to welcome page
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === TRUE) {
		$user_logged_in = TRUE;
	} else $user_logged_in = FALSE;
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
		<h2><a class="home_title" href="http://localhost:7070/user_authentication/">HOME</a></h2>
		<nav id="nav">
			<ul>
				<?php
				if ($user_logged_in !== true) {
				?>
					<li><a href="http://localhost:7070/user_authentication/login.php">Log in</a></li>
					<li><a href="http://localhost:7070/user_authentication/signup.php">Sign up</a></li>
				<?php
				} else {
				?>
					<li><a href="logout.php">Log out</a></li>
				<?php
				}
				?>
			</ul>
		</nav>
	</section>