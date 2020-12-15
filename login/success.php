<?php
session_start();
?>

<html>

<head>
<title>Success</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
<!--<link rel="stylesheet" type="text/css" href="<?php echo $rooturl?>/stylesheet_local.css" />-->
</head>


<body>
<div class="form">
    <h1><?='Success';?></h1>
    <p>
        <?php
        if(isset($_SESSION['message']) && !empty($_SESSION['message']))
        {
            echo $_SESSION['message'];
        }
        else
        {
            header("location: login_index.php");
        }   
        ?>

    </p>
    <a href="login_index.php"><button class="button button-block">Home</button></a>
</div>

</body>

</html>