<?php 
    $rooturl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].'/pizza_login';
    $gender = 'Male';
    $name = 'Guest';
?>


<head>
    <meta charset="UTF-8">
    <title> Pizza, dude!</title>
    <!-- compiled and minimized CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <script>
function toggleLogin() 
{
	var loginSection = document.getElementById("login");
	var regSection = document.getElementById("register");
	loginSection.style.display = "block";
	regSection.style.display = "none";
} 
function toggleRegister() 
{
	var loginSection = document.getElementById("login");
	var regSection = document.getElementById("register");
    loginSection.style.display = "none";
	regSection.style.display = "block";
} 

// reload page
window.onload = function() 
{
    toggleLogin();
}


</script>
</head>

<!--open boy here and close in the footer.php-->
<body class="grey lighten-4">

    <nav class="white z-depth-0">
        <div class="container">
            <!--<a href="index.php" class="brand-logo brand-text">Pizza, dude!</a>-->
            <ul id="nav-mobile" class="left hide-on-small-and-down">
                <li> <a href="<?php echo $rooturl?>/index.php" class="btn brand z-depth-0">Pizza, Dude!</a> </li>
            </ul>

            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text"> Hello<?php echo htmlspecialchars($name); ?> </li>
                <li class=grey-text> (<?php echo htmlspecialchars($gender); ?>) </li>
                <li> <a href="<?php echo $rooturl?>/login/login_index.php#openlogin" class="btn brand z-depth-0" onclick="toggleLogin()">Login</a> </li>
                <li> <a href="<?php echo $rooturl?>/login/login_index.php#openreg" class="btn brand z-depth-0" onclick="toggleRegister()">Register</a> </li>
            </ul>
        </div>
    </nav>