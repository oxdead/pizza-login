<?php
session_start();
require_once __DIR__.'/../db_connect.php'; 


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email = $conn->escape_string($_POST['email']);
	$result = $conn->query("SELECT * FROM users WHERE email='$email'");
	
	if($result->num_rows == 0)
	{
		$_SESSION['message'] = "User with that email doesn't exist!";
		header("location: error.php");
	}
	else
	{
		$user = $result->fetch_assoc();
	
		if(password_verify($_POST['password'], $user['password']))
		{
			$_SESSION['message'] = "Welcome!";
			$_SESSION['email'] = $user['email'];
			$_SESSION['first_name'] = $user['first_name'];
			$_SESSION['last_name'] = $user['last_name'];
			$_SESSION['active'] = $user['active'];
	
			// this is how we will know user logged in
			$_SESSION['logged_in'] = true;
			if($_SESSION['active']) { setcookie("mkpzactv", "1", time() + (86400*30), '/'); } // todo: learn why without '/' path cookie gets saved only on current page and is erased after loading index.php page ?
			// setcookie("logemail", "som0@meta.ua", time() + (86400*30), '/');
			// setcookie("logpass", "1111", time() + (86400*30), '/'); // for testing, delete it after
			

			require_once __DIR__.'/../db_implode_orders.php';


			header("location: ../index.php");
		}
		else
		{
			$_SESSION['message'] = "You have entered wrong password, try again!";
			header("location: error.php");
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

	<h3 class="center grey-text text-darken-1">Вітаю! З поверненням!</h3>
	<br />
	
	<form action="login.php" method="post" autocomplete="off">
		<div class="row">
			<div class="col s6 offset-s3">
				<label>Адреса email<span class="req">*</span></label>
				<input type="email" required autocomplete="on" name="email" value="<?php
					if(isset($_COOKIE['logemail'])) /* just for testing, delete after */
					{
						//echo $_COOKIE['logemail']; 
					}
				?>"/>
			</div>			
		</div>

		<div class="row">
			<div class="col s6 offset-s3">
				<label>Пароль<span class="req">*</span></label>
				<input type="password" required autocomplete="off" name="password" value="<?php
					if(isset($_COOKIE['logpass'])) /* just for testing, delete after */
					{
						//echo $_COOKIE['logpass']; 
					}
				?>"/>
			</div>
		</div>
	
		<div class="row">
			<button class="btn brand z-depth-0 col s2 offset-s7" name="login">Ввійти</button>
			<p class="col s6 offset-s7 no-padding"><a class="active" href="forgot.php">Забув пароль?</a></p>
			<p class="col s6 offset-s7 no-padding"><a class="active" href="register.php">Реєстрація</a></p>
		</div>
	</form>

</section>




<?php require_once __DIR__.'/../footer.php'; ?>
</body>
<?php require_once __DIR__.'/../script.php'; ?>


</html>