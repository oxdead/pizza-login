<?php
session_start();
require_once __DIR__.'/../db/connect.php';
require_once __DIR__.'/../site/rooturl.php';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email = $conn->escape_string($_POST['email']);
	$result = $conn->query("SELECT * FROM users WHERE email='$email'");
	
	if($result->num_rows == 0)
	{
		$_SESSION['message'] = "Користувач з таким e-mail не існує!";
		//header("location: error.php");
		headTo($rooturl.'/login/error.php');
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

require_once __DIR__.'/../db/implode_orders.php';

			headTo($rooturl.'/index.php');
		}
		else
		{
			$_SESSION['message'] = "Некорректний пароль, будь-ласка спробуй ще раз!";
			headTo($rooturl.'/login/error.php');
		}
	}
}




?>
<!DOCTYPE html>
<html>

<?php require_once __DIR__.'/../site/head.php'; ?>
<body class="grey lighten-4">
<?php require_once __DIR__.'/../site/header.php'; ?>

<section class="container">

	<h3 class="center grey-text text-darken-1">Дякуємо за візит!</h3>
	<br />
	
	<form action="login.php" method="post" autocomplete="off">
		<div class="row">
			<div class="col s6 offset-s3">
				<label>Адреса email<span class="req">*</span></label>
				<input type="email" required autocomplete="on" name="email"/>
			</div>			
		</div>

		<div class="row">
			<div class="col s6 offset-s3">
				<label>Пароль<span class="req">*</span></label>
				<input type="password" required autocomplete="off" name="password"/>
			</div>
		</div>
	
		<div class="row">
			<button class="btn brand z-depth-0 col s2 offset-s7" name="login">Ввійти</button>
			<p class="col s6 offset-s7 no-padding" style="margin-top:20px;"><a class="active" href="forgot.php">Не пам'ятаєш пароль?</a></p>
			<p class="col s6 offset-s7 no-padding" style="margin-top:0px;"><a class="active" href="register.php">Реєстрація</a></p>
		</div>
	</form>

</section>


<?php require_once __DIR__.'/../site/footer.php'; ?>
</body>
</html>