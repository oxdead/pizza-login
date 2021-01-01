<?php
session_start();
require_once __DIR__.'/../db_connect.php';
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
}
else
{
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
<?php require_once __DIR__.'/../head.php'; ?>
<body class="grey lighten-4" onload="load()">
<?php require_once __DIR__.'/../header.php'; ?>

<div class="container">
    <h3 class="center-align">Вітаю!</h3>
    <p class="center-align">
        <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
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
        ?>
    </p>
</div>

<?php require_once __DIR__.'/../footer.php'; ?>
</body>
<?php require_once __DIR__.'/../script.php'; ?>
</html>