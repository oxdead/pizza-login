<?php
session_start();
include '../db_connect.php';

?>

<html>

<head>
<title>Success</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $rooturl?>/stylesheet_local.css" />
</head>


<body>
<div class="form">
    <h1>Welcome</h1>
    <p>
        <?php
        if($_SESSION['logged_in'] == true)
        {

            if(isset($_SESSION['message']) && !empty($_SESSION['message']))
            {
                echo $_SESSION['message'];
                echo "<br/>";
            }
            
            if($_SESSION['active'] != 1)
            {
                echo "Account is not activated!";
                echo "<br/>";
            }

            if(isset($_SESSION['email']) && !empty($_SESSION['email']))
            {
                echo $_SESSION['email'];
                echo "<br/>";
            }

            if(isset($_SESSION['first_name']) && !empty($_SESSION['first_name']))
            {
                echo $_SESSION['first_name'];
                echo "<br/>";
            }
            
            if(isset($_SESSION['last_name']) && !empty($_SESSION['last_name']))
            {
                echo $_SESSION['last_name'];
                echo "<br/>";
            }
            

        }
        else
        {
            header("location: login_index.php");
        }   
        ?>

    </p>
    <a href="logout.php"><button class="button button-block">Log Out</button></a>
</div>

</body>

</html>