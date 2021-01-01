<?php
/* Reset your password form, sends reset.php pasword link */
session_start();
require_once __DIR__.'/../db_connect.php'; 

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
        http://localhost/pizza_login/login/reset.php?email='.$email.'&hash='.$hash;
        mail($to, $subject, $message_body);

        header("location: success.php");

    }
}
?>

<!DOCTYPE html>
<html>
<?php require_once __DIR__.'/../head.php'; ?>
<body class="grey lighten-4" onload="load()">
<?php require_once __DIR__.'/../header.php'; ?>

    <section class="container">

        <h3 class="center grey-text text-darken-1">Відновлення паролю.</h3>
        <br />

        <form action="forgot.php" method="post" autocomplete="off">
            <div class="row">
                <div class="col s6 offset-s3">
                    <label>Адреса email<span class="req">*</span></label>
                    <input type="email" required autocomplete="on" name="email"/>
                </div>			
            </div>
            <div class="row">
                <button class="btn brand z-depth-0 col s2 offset-s7" name="forgot">Надіслати</button>
            </div>
        </form>

    </section>

<?php require_once __DIR__.'/../footer.php'; ?>
</body>
<?php require_once __DIR__.'/../script.php'; ?>
</html>