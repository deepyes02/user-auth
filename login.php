<?php
#include header
include('./includes/header.php');

//check if user is already loggin in, if so, redirect to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: welcome.php");
	exit;
}

require_once('./database/create_table.php');

//defining required vars
$login_user_email = $login_user_pass = "";
$username_err = $password_err = $login_err = "";
if (isset($_POST['login_user_email'])) {
	$login_user_email = trim($_POST['login_user_email']);
}
if (isset($_POST['login_user_pass'])) {
	$login_user_pass = trim($_POST['login_user_pass']);
}
//data processing when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	var_dump($_POST);
	echo "<br>";
	//Email Verification Start: check if email field is empty
	if (empty($login_user_email)) {
		$username_err = "Email field is empty";
		echo $username_err;
	} elseif (!filter_var($login_user_email, FILTER_VALIDATE_EMAIL)) { //email is not empty
		//check if email is properly formatted
		$username_err = "Invalid email format: (xyz@mail.com)";
		echo $username_err;
	} else {
		//return user email address
		echo $login_user_email;
	} //email verification end
	//password verification start
	echo "<br>";
	if (empty(($login_user_pass))) {
		$password_err = "Password can't be empty";
		echo $password_err;
	} elseif (strlen($login_user_pass) < 8) {
		$password_err = "You password is at least 8 characters";
		echo $password_err;
	} else {
		if (empty($username_err) && empty($password_err)) {
			echo "Server side validation complete";
			//prepare sql
			$sql = "SELECT id, username, password FROM users WHERE username = ?";
			if ($stmt = mysqli_prepare($conn, $sql)) {
				//bind
				mysqli_stmt_bind_param($stmt, 's', $temp_username);
				//set params
				$temp_username = $login_user_email;

				//attempt to execute
				if (mysqli_stmt_execute($stmt)) {
					//store safely
					mysqli_stmt_store_result($stmt);
					//check if username exists in the database, then verify the password with the password hash
					if (mysqli_stmt_num_rows($stmt) == 1) {
						//bind result vars
						mysqli_stmt_bind_result($stmt, $id, $login_user_email, $hashed_password);
						if (mysqli_stmt_fetch($stmt)) {
							if (password_verify($login_user_pass, $hashed_password)) {
								//password is correct, so start a new session
								session_start();
								//store data in session vars
								$_SESSION['loggedin'] = true;
								$_SESSION['id'] = $id;
								$_SESSION['username'] = $login_user_email;
								//redirect user to welcome page
								header("location: welcome.php");
							} else {
								//password doesn't match, display a generic message
								$login_err = "Invalid username or password.";
							}
						}
					} else {
						//username doesn't exist, still display generic error
						$login_err = "Invalid username or password";
					}
				} else {
					echo "Oops, something went wrong please try again later.";
				}
				//close statement
				mysqli_stmt_close($stmt);
			}
		} 
	}
}
$conn->close();
?>

<section class="header_notice">
	<span>If !user logged in -> show login and signup<br>else -> show logout only</span>
</section>
<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Login</h2>
			<p>Use your username and password to get into the system.</p>
		</div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
			<div class="form_row">
				<label for="login_user_email">Email</label>
				<input type="text" name="login_user_email" id="login_user_email" value="<?php echo isset($login_user_email) ? $login_user_email : ''; ?>">
			</div>
			<div class="form_row">
				<label for="login_user_pass">Password</label>
				<input type="password" name="login_user_pass" id="login_user_pass">
				<script>
				document.querySelector('#login_user_email').value="deepyes@outlook.com";
				document.querySelector('#login_user_pass').value = "12345678";
				</script>
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
	<div class="main_body__inner">
		<?php // include('./includes/sidebar.php');
		?>
	</div>
</section>

<?php include('./includes/footer.php'); ?>