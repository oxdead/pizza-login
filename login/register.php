<?php
//include ('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
//include ('../vendor/phpmailer/phpmailer/src/SMTP.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;


// Load Composer's autoloader
//require '../vendor/autoload.php';




// Instantiation and passing `true` enables exceptions
//$mail = new PHPMailer(true);


    // //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    // $mail->isSMTP();                                            // Send using SMTP

    // $mail->Host = 'smtp.gmail.com';   // Set the SMTP server to send through
    // //$mail->Host = 'gmail-smtp-in.l.google.com';
    // //$mail->Host = 'alt1.gmail-smtp-in.l.google.com';
    // //$mail->Host = gethostbyname('gmail-smtp-in.l.google.com'); // if your network does not support SMTP over IPv6
    // //$mail->Host = 'mxs.meta.ua';

    // $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    // //$mail->SMTPAuth   = false;     
    // $mail->Username   = "ytubescks@gmail.com";                     // SMTP username
    // $mail->Password   = "ytre2@5%";                               // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    // $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    // //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    // //$mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    // //Recipients
    // $mail->setFrom('ytubescks@gmail.com', 'Mailer');
    // $mail->addAddress('som0@meta.ua', 'Joe User');     // Add a recipient

    // // Content
    // $mail->isHTML(true);                                  // Set email format to HTML
    // $mail->Subject = 'Here is the subject';
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // //send the message, check for errors
    // if (!$mail->send()) 
    // {
    //     echo 'SOM0_ERROR: '. $mail->ErrorInfo;
    // } 
    // else 
    // {
    //     echo 'Message sent!';
    // }

/*
    Registration process, inserts user info into the database and sends account confirmation email message
*/

// set session vars to be used on profile.php
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['last_name'] = $_POST['last_name'];


$first_name = $conn->escape_string($_POST['first_name']);
$last_name = $conn->escape_string($_POST['last_name']);
$email = $conn->escape_string($_POST['email']);
$password = $conn->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $conn->escape_string( md5(rand(0,1000)));

// check if user with that email already exists DB:accounts, table: users
$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'") or die($conn->error);

// we know user email exists if the rows returned are more than 0

if($result->num_rows > 0)
{
    $_SESSION['message'] = 'User with this email exists!';
    header("location: error.php");
}
else // email doesn't exist in database, proceed..
{
    // active is 0 by default(no need to include here)
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) "
            . "VALUES ('$first_name', '$last_name', '$email', '$password', '$hash')";


    if($conn->query($sql))
    {

        $_SESSION['active'] = 0;
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] = "Confirmation email was sent to $email, please verify!";


        // send reg confirmation to link (verify.php)
        $to = $email;
        $subject = 'Account Verification (tutphp.com)';
        $message_body = 'Hello '.$first_name.', 
        Thank you for registering! 
        Please, click to activate your account:
        http://localhost/tutphp/login/verify.php?email='.$email.'&hash='.$hash;

        mail($to, $subject, $message_body);
        header("location: profile.php");

    }
    else
    {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}



?>