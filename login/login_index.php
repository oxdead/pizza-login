<?php
session_start();
include('../db_connect.php'); 

/*echo $_SERVER['REQUEST_METHOD'];*/
	

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['login']))
	{
		require 'login.php';
	}
	else if(isset($_POST['register']))
	{
		require 'register.php';
	}
}
?>

<!DOCTYPE html>
<html>

<?php include '../head.php'; ?>
<body class="grey lighten-4">

    <?php include '../header.php'; ?>

<section class="container grey-text">
	<div class="form">

		<ul class="tab-group">
		
			<li id="openreg" class="center tab"><a href="#register" onclick="toggleRegister()">Register</a></li>
			<li id="openlogin" class="center tab-active"><a href="#login" onclick="toggleLogin()">Log In</a></li>

		</ul>

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


			<div id="register">
				<h1 class=center>Sign Up for free</h1>
				<form action="login_index.php" method="post" autocomplete="off">
			
					<div class="top-row">
						<div class="field-wrap">
							<label>First Name<span class="req">*</span></label>
							<input type="text" required autocomplete="off" name="first_name"/>
						</div>
						<div class="field-wrap">
							<label>Last Name<span class="req">*</span></label>
							<input type="text" required autocomplete="off" name="last_name"/>
						</div>

					</div>

					<div class="field-wrap">
						<label>Email Address<span class="req">*</span></label>
						<input type="email" required autocomplete="off" name="email"/>					
					</div>
					<div class="field-wrap">
						<label>Set a password<span class="req">*</span></label>
						<input type="password" required autocomplete="off" name="password"/>					
					</div>
					
					<button type="submit" class="button button-block" name="register" >Register</button>

				</form>

			</div>

		</div>



	</div>


</section>

<?php include '../footer.php'; ?>
</body>


</html>