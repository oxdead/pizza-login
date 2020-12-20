<?php
session_start();
include '../db_connect.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//php mailer extension option, not needed for now:
	//include 'mail_phpmailer.php';

	/*
		Registration process, inserts user info into the database and sends account confirmation email message
	*/

	// set session vars to be used on profile.php
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['first_name'] = $_POST['first_name'];
	$_SESSION['last_name'] = $_POST['last_name'];


	$first_name = $conn->escape_string($_POST['first_name']);
	$last_name = $conn->escape_string($_POST['last_name']);
	$email = $conn->escape_string($_POST['email']);
	$password = $conn->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
	$hash = $conn->escape_string( md5(rand(0,1000)));

	// check if user with that email already exists DB:accounts, table: users
	$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'") or die($conn->error);

	// we know user email exists if the rows returned are more than 0
	if($result->num_rows > 0)
	{
		$_SESSION['message'] = 'User with this email exists!';
		header("location: error.php");
	}
	else // email doesn't exist in database, proceed..
	{
		// active is 0 by default(no need to include here)
		$sql = "INSERT INTO users (first_name, last_name, email, password, hash) "
				. "VALUES ('$first_name', '$last_name', '$email', '$password', '$hash')";


		if($conn->query($sql))
		{
			$_SESSION['active'] = 0;
			$_SESSION['logged_in'] = true;
			$_SESSION['message'] = "Confirmation email was sent to $email, please verify!";


			// send reg confirmation to link (verify.php)
			$to = $email;
			$subject = 'Account Verification (tutphp.com)';
			$message_body = 'Hello '.$first_name.', 
			Thank you for registering! 
			Please, click to activate your account:
			http://localhost/tutphp/login/verify.php?email='.$email.'&hash='.$hash;

			mail($to, $subject, $message_body);
			header("location: profile.php");
		}
		else
		{
			$_SESSION['message'] = 'Registration failed!';
			header("location: error.php");
		}
	}

}
?>

<!DOCTYPE html>
<html>

<?php include "../head.php"; ?>
<body class="grey lighten-4">

<?php include "../header.php"; ?>

<section class="container">
	<div class="form">
		<h3 class="center grey-text text-darken-1">Реєстрація</h3>
		<br />
		<form action="register.php" method="post" autocomplete="off">
	
			<div class="row">
				<div class="col s6 offset-s3">
					<label>Ім'я<span class="req">*</span></label>
					<input type="text" required autocomplete="off" name="first_name"/>
				</div>
			</div>
			<div class="row">
				<div class="col s6 offset-s3">
					<label>Прізвище<span class="req">*</span></label>
					<input type="text" required autocomplete="off" name="last_name"/>
				</div>
			</div>
			
			<div class="row">
				<div class="col s6 offset-s3">
					<label>Адреса Email<span class="req">*</span></label>
					<input type="email" required autocomplete="off" name="email"/>					
				</div>
			</div>
			<div class="row">
				<div class="col s6 offset-s3">
					<label>Новий пароль<span class="req">*</span></label>
					<input type="password" required autocomplete="off" name="password"/>					
				</div>
			</div>
			<div class="row">
				<button type="submit" class="btn brand z-depth-0 col s4 offset-s5" name="register">Зареєструватись</button>
			</div>

		</form>

			



	</div>


</section>

<?php include '../footer.php'; ?>
</body>

<?php include '../script.php'; ?>
</html>