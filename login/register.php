<?php
session_start();
require_once __DIR__.'/../db_connect.php'; 
require_once __DIR__.'/../rooturl.php';
require_once __DIR__.'/mail_phpmailer.php';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//Registration process, inserts user info into the database and sends account confirmation email message

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
		$_SESSION['message'] = 'Користувач з таким іменем існує!';
		//header("location: error.php");
		//headTo($rooturl.'/login/error.php');
		headTo($rooturl.'/login/error.php');
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
			$_SESSION['message'] = "Лист з підтвердження вислано на $email, будь-ласка підтвердіть для активації аккаунту!";


			// send reg confirmation to link (verify.php)
			$mail = new Lyo\PHPMailerHandler('free.mboxhosting.com', 'support@mikespizza.pp.ua', '45rtfgvbfgrt45');
			$mail->send(
			$email, 
			$first_name, 
			'Account Verification (Mikey\'s Pizza)', 

			'Привіт '.$first_name.', 
			Дякуємо за реєстрацію!
			Будь-ласка натисніть на посилання для активації вашого аккаунту: 
			'.$rooturl.'/login/verify.php?email='.$email.'&hash='.$hash, 

			'');
			
			
			
			//header('Location: login.php');
			headTo($rooturl.'/index.php');


		}
		else
		{
			$_SESSION['message'] = 'Реєстрація не вдалась, вибачте!';
			//header('Location: error.php');
			headTo($rooturl.'/login/error.php');
		}
	}

}
?>

<!DOCTYPE html>
<html>

<?php require_once __DIR__.'/../head.php'; ?>
<body class="grey lighten-4" onload="load()">

<?php require_once __DIR__.'/../header.php'; ?>

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
					<label>Адреса email<span class="req">*</span></label>
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

<?php require_once __DIR__.'/../footer.php'; ?>
</body>
</html>