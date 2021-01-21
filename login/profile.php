<?php
session_start();
require_once __DIR__.'/../db/connect.php';
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
}
else
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<?php require_once __DIR__.'/../site/head.php'; ?>
<body class="grey lighten-4">
<?php require_once __DIR__.'/../site/header.php'; ?>

<div class="container">
    <h3 class="center-align">Вітаю!</h3>
    <p class="center-align">
        <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
            {
                if(isset($_SESSION['message']) && !empty($_SESSION['message']))
                {
                    echo htmlspecialchars($_SESSION['message']);
                    echo "<br/>";
                }
                
                if($_SESSION['active'] != 1)
                {
                    echo "Account is not activated!";
                    echo "<br/>";
                }

                if(isset($_SESSION['email']) && !empty($_SESSION['email']))
                {
                    echo htmlspecialchars($_SESSION['email']);
                    echo "<br/>";
                }

                if(isset($_SESSION['first_name']) && !empty($_SESSION['first_name']))
                {
                    echo htmlspecialchars($_SESSION['first_name']);
                    echo "<br/>";
                }
                
                if(isset($_SESSION['last_name']) && !empty($_SESSION['last_name']))
                {
                    echo htmlspecialchars($_SESSION['last_name']);
                    echo "<br/>";
                }
            }
        ?>
    </p>
</div>

<?php require_once __DIR__.'/../site/footer.php'; ?>
</body>
</html>