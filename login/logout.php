<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<html>

<head>
<title>LogOut</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $rooturl?>/stylesheet_local.css" />
</head>


<body>
<div class="form">
    <h1><?='Quit.';?></h1>
    <p>
        <?php
        if(isset($_SESSION['message']) && !empty($_SESSION['message']))
        {
            // show message if something went wrong and put button in the end 'Home' to return to main login page manually
            echo $_SESSION['message'];
        }
        else
        {
            // return to main page if everything is ok
            header("location: login_index.php");
        }

        ?>

    </p>
    <a href="login_index.php"><button class="button button-block">Home</button></a>
</div>

</body>

</html>