<?php
session_start();
require_once __DIR__.'/../db_connect.php'; 

// make sure email and hash parameters aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $conn->escape_string($_GET['email']);
    $hash = $conn->escape_string($_GET['hash']);

    // make sure user email with matching hash exist
    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");
    if($result->num_rows == 0)
    {
        $_SESSION['message'] = "Ви вказали некоректний URL для зміни паролю";
        header("location: error.php");
    }

}
else
{
    $_SESSION['message'] = "Вибачте, верифікація невдала, спробуйте будь-ласка ще раз!";
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>

<?php require_once __DIR__.'/../head.php'; ?>
<body class="grey lighten-4" onload="load()">
<?php require_once __DIR__.'/../header.php'; ?>

    <section class="container grey-text">
        <div id="forgot">
            <h3 class="center grey-text text-darken-1">Вкажіть новий пароль:</h3>
            <br />

            <form action="reset_password.php" method="post" autocomplete="off">
                <div class="row">
                    <div class="col s6 offset-s3">
                        <label>Новий пароль<span class="req">*</span></label>
                        <input type="password" required autocomplete="off" name="passwordnew"/>
                    </div>		
                </div>		
                <div class="row">
                    <div class="col s6 offset-s3">
                        <label>Confirm new password<span class="req">*</span></label>
                        <input type="password" required autocomplete="off" name="passwordnew_confirm"/>
                    </div>
                </div>

                <!-- hiiden fields -->
                <input type="hidden" name="email" value="<?= $email ?>">    
                <input type="hidden" name="hash" value="<?= $hash ?>">

                
                <div class="row">
                    <button class="btn brand z-depth-0 col s2 offset-s7" name="reset_password">Підтвердити</button>
                </div>
            
            </form>
        </div>
    </section>

<?php require_once __DIR__.'/../footer.php'; ?>
</body>
</html>