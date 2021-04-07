<?php
include('./includes/header.php');
//database connection and user table creation script import
echo '<div class="full_section">';
require_once('./database/create_table.php');

//4 variables to capture POST DATA, plus any errors
$username = $password = $username_err = $password_err = "";
//fire when the client hits register
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//validate username
	$signup_user_email = $_POST['signup_user_email'];
	if (empty(trim($signup_user_email))) {
		$username_err = "Error: Email can't be empty";
	} elseif (!empty(trim($_POST['signup_user_email'])) && !filter_var($signup_user_email, FILTER_VALIDATE_EMAIL)) {
		$username_err = "Invalid email format (xyz@email.com)";
	} else {
		//check database for email duplication...
		$sql = "SELECT id FROM users WHERE username = ?";
		if ($stmt = mysqli_prepare($conn, $sql)) {
			//bind variable to the prepared statemetn as params
			mysqli_stmt_bind_param($stmt, "s", $param_username);
			//set param
			$param_username = trim($_POST['signup_user_email']);
			//execute the prepared statement
			if (mysqli_stmt_execute($stmt)) {
				//store result
				mysqli_stmt_store_result($stmt);
				//if username is taken
				if (mysqli_stmt_num_rows($stmt) == 1) {
					$username_err = "This email is already registered.";
				} else { //if username is new
					$username = trim($_POST['signup_user_email']);
				}
			} else { //any other problems with server
				echo "Oops! something went wrong, please try later";
			}
			//close statement
			mysqli_stmt_close($stmt);
		}
	}
	//username verification done, now password verification
	if (empty(trim($_POST['signup_user_pass']))) {
		$password_err = "Error: Password can't be empty";
	} else {
		//password field isn't empty, check if password is greater than 8 digits
		if (strlen(trim($_POST['signup_user_pass'])) < 8) {
			$password_err = "Password should be  8 characters long";
		} else {
			if (empty($username_err) && empty($password_err)) {
				//now we ready
				$password = trim($_POST['signup_user_pass']);
				//sql injection
				$sql = "INSERT INTO users (username, password) VALUES (?, ?)";

				//prepare
				if ($stmt = mysqli_prepare($conn, $sql)) {
					//bind
					mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

					//set params
					$param_username = $username;
					//encrypt
					$param_password = password_hash($password, PASSWORD_DEFAULT);

					//attempt to execute the prepared statement
					if (mysqli_stmt_execute($stmt)) {
						//redirect to login page
						header(
							"location: login.php"
						);
					} else {
						echo "Oops ! something went wrong. Please try again";
					}
					//close statement
					mysqli_stmt_close($stmt);
				}
			}
		}
	}
	//main if block ends here
} else {
	//nothing happens here
	echo "Noone has registered yet";
}
//close mysqli connection
$conn->close();
?>
</div>
<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Signup</h2>
			<p>Signup using your email and password</p>
		</div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
			<div class="form_row">
				<label for="signup_user_email">Email</label>
				<input type="text" name="signup_user_email" id="signup_user_email" value="<?php echo isset($_POST['signup_user_email']) ? $_POST['signup_user_email'] : ""; ?>" />
				<span class="signup_notification">
					<?php if (!empty($username_err)) {
						echo $username_err;
					} ?>
				</span>
			</div>
			<div class="form_row">
				<label for="signup_user_pass">Password</label>
				<input type="password" name="signup_user_pass" id="signup_user_pass">
				<span class="signup_notification">
					<?php if (!empty($password_err)) {
						echo $password_err;
					} ?>
				</span>
			</div>
			<div class="form_row">
				<input type="submit" value="Register" class="btn btn-login" />
			</div>
		</form>
		<div class="form_row">
			<p>Already have an account?<a href="http://localhost:7070/user_authentication/login.php">Login</a></p>
		</div>
	</div>

	<div class="main_body__inner">
		<?php include('./includes/sidebar.php'); ?>
	</div>
</section>

<?php include('./includes/footer.php'); ?>