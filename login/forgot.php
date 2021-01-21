<?php
/* Reset your password form, sends reset.php pasword link */
session_start();
require_once __DIR__.'/../db/connect.php'; 
require_once __DIR__.'/../site/rooturl.php';
require_once __DIR__.'/mail_phpmailer.php';

// Check if form submitted with "POST"
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $conn->escape_string($_POST['email']);
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($result->num_rows == 0) // user doesn't exist
    {
        $_SESSION['message'] = "Користувач з таким email не існує!";
        //header("location: error.php");
        headTo($rooturl.'/login/error.php');
    }
    else // user exists num_rows != 0
    {
        $user = $result->fetch_assoc(); // $user becomes array with user data
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name =  $user['first_name'];

        // session message to display on success.php
        $_SESSION['message'] = "<p>Будь-ласка перевірте свою пошту <span>$email</span>"
        ." для завершення зміни паролю!</p>";

        // send reg confirmation link (reset.php)
        $mail = new Lyo\PHPMailerHandler(MAIL_HOST, MAIL_USER, MAIL_PASS);
        $mail->send(
        $email, 
        $first_name, 
        'Password Reset (mikespizza.pp.ua)',
        
        'Привіт '.$first_name.',
        Якщо Ви запросили зміну паролю, пройдіть будь-ласка по данному посиланню: 
        '.$rooturl.'/login/reset.php?email='.$email.'&hash='.$hash,

        '');



        //header("location: success.php");
        headTo($rooturl.'/login/success.php');

    }
}
?>

<!DOCTYPE html>
<html>
<?php require_once __DIR__.'/../site/head.php'; ?>
<body class="grey lighten-4">
<?php require_once __DIR__.'/../site/header.php'; ?>

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

<?php require_once __DIR__.'/../site/footer.php'; ?>
</body>
</html>