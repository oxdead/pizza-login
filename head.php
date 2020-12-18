<?php 
    $rooturl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].'/pizza_login';
    $gender = 'Male';
    $name = 'Guest';
?>


<head>
    <meta charset="UTF-8">
    <title> Mikey's Pizza!</title>
    <!-- compiled and minimized CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link rel="stylesheet" href="stylesheet2.css" />
    <!-- <link rel="stylesheet" href="stylesheet_local.css" /> -->
    
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