<?php
session_start();
$tmpmsg = '';
//awardspace.com has output_buffering = no value (XAMPP has 4096), so header doesn't work, add ob_start and ob_end_flush() to fix this or write header outside body
if(isset($_SESSION['message']) && !empty($_SESSION['message']))
{
    // show message if something went wrong and put button in the end 'Home' to return to main login page manually
    $tmpmsg = $_SESSION['message'];
}
else
{
    // return to main page if everything is ok
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<?php require_once __DIR__.'/../site/head.php'; ?>
<body>
<?php require_once __DIR__.'/../site/header.php'; ?>
    <div class="container">
        <div>
            <h2 class="center-align grey-text">Виникла помилка, Вибачте будь-ласка.</h2>
            <p class="center-align"><?=$tmpmsg;?></p>
            <br>
        </div>
        <div class="center-align">
            <a href="../index.php" class="center-align"><button class="btn brand z-depth-0">На головну</button></a>
        </div>
    </div>
</body>
</html>