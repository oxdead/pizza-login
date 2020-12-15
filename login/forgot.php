<?php
/* Reset your password form, sends reset.php pasword link */
session_start();
require '../db_connect.php'; 



// Check if form submitted with "POST"
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $conn->escape_string($_POST['email']);
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($result->num_rows == 0) // user doesn't exist
    {
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    }
    else // user exists num_rows != 0
    {
        $user = $result->fetch_assoc(); // $user becomes array with user data
        $email = $user ['email'];
        $hash = $user ['hash'];
        $first_name =  $user['first_name'];

        // session message to display on success.php
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        ." for confirmation link to complete your password reset!</p>";

        // send reg confirmation link (reset.php)
        $to = $email;
        $subject = 'Password Reset Link (clevertechie.com)';
        $message_body = '
        Hello '.$first_name.',
        You have requested password reset!
        Please click this link to reset password:
        http://localhost/tutphp/login/reset.php?email='.$email.'&hash='.$hash;
        mail($to, $subject, $message_body);

        header("location: success.php");

    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- compiled and minimized CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
</head>

<body>
    <section class="container grey-text">
        <div class="form">

            <div class="tab-content">
                <div id="forgot">
                    <h1 class=center>Input your email:</h1>
                    <form action="forgot.php" method="post" autocomplete="off">
                        <div class="field-wrap">
                            <label>Email Address<span class="req">*</span></label>
                            <input type="email" required autocomplete="off" name="email"/>
                        </div>			
                
                        <button class="button button-click" name="forgot">Send</button>
                    
                    </form>
                </div>
        </div>
    </section>
</body>
</html>