<?php
session_start();
require '../db_connect.php'; 

// make sure email and hash parameters aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $conn->escape_string($_GET['email']);
    $hash = $conn->escape_string($_GET['hash']);

    // make sure user email with matching hash exist
    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");
    if($result->num_rows == 0)
    {
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: error.php");
    }

}
else
{
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- compiled and minimized CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $rooturl?>/stylesheet_local.css" />
</head>

<body>
    <section class="container grey-text">
        <div class="form">

            <div class="tab-content">
                <div id="forgot">
                    <h1 class=center>Choose your new password:</h1>
                    <form action="reset_password.php" method="post" autocomplete="off">
                        <div class="field-wrap">
                            <label>New password<span class="req">*</span></label>
                            <input type="password" required autocomplete="off" name="passwordnew"/>
                        </div>		
                        <div class="field-wrap">
                            <label>Confirm new password<span class="req">*</span></label>
                            <input type="password" required autocomplete="off" name="passwordnew_confirm"/>
                        </div>

                        <!--
                        <div style="display:none;">
                            <input type="email" required autocomplete="off" name="email" value="<?php echo $email?>"/>
                        </div>		
                        <div style="display:none;">
                            <input type="text" required autocomplete="off" name="hash" value="<?php echo $hash?>"/>
                        </div>
                        -->
                        <input type="hidden" name="email" value="<?= $email ?>">    
                        <input type="hidden" name="hash" value="<?= $hash ?>">


                
                        <button class="button button-click" name="reset_password">Apply</button>
                    
                    </form>
                </div>
        </div>
    </section>
</body>
</html>