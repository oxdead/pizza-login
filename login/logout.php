<?php
session_start();
$_SESSION = array();
session_destroy();
$tmpmsg='';
if(isset($_SESSION['message']) && !empty($_SESSION['message']))
{
    // show message if something went wrong and put button in the end 'Home' to return to main login page manually
    $tmpmsg = $_SESSION['message'];
}
else
{
    // return to main page if everything is ok
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<?php require_once __DIR__.'/../head.php'; ?>
<body>
    <div class="container">
        <div>
            <h2 class="center-align grey-text">Завершення сесії</h2>
            <p class="center-align">
                <?=$tmpmsg;?>
            </p>
            <br>
        </div>
        <div class="center-align">
            <a href="../index.php" class="center-align"><button class="btn brand z-depth-0">На головну</button></a>
        </div>
    </div>
</body>
</html>