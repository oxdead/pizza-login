<?php
session_start();
include('../db_connect.php'); 

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
	
			header("location: profile.php");
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

<?php include "../head.php"; ?>
<body class="grey lighten-4">

<?php include "../header.php"; ?>

<section class="container grey-text">
	<div class="form">

		<div class="tab-content">
			<div id="login">
				<h1 class=center>Welcome Back!</h1>
				<form action="login_index.php" method="post" autocomplete="off">
					<div class="field-wrap">
						<label>Email Address<span class="req">*</span></label>
						<input type="email" required autocomplete="off" name="email"/>
					</div>			

					<div class="field-wrap">
						<label>Password<span class="req">*</span></label>
						<input type="password" required autocomplete="off" name="password"/>
					</div>
				
					<p class="forgot"><a href="forgot.php">Forgot password?</a></p>
					<button class="button button-click" name="login">Log In</button>
				
				</form>
			</div>
			
		</div>



	</div>


</section>

<?php include '../footer.php'; ?>

</body>
<?php include '../script.php'; ?>

</html>