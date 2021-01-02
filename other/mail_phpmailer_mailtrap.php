<?php

require_once __DIR__.'/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__.'/../vendor/phpmailer/phpmailer/src/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require_once __DIR__.'/../vendor/autoload.php';

function sendByPHPMailer($to, $to_name, $subject, $body, $altbody)
{
	//Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP

    $mail->Host = 'smtp.mailtrap.io';   // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "user";                     // SMTP username
    $mail->Password   = "pass";                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 2525;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('confirmation@gmail.com', 'Mailer');
    $mail->addAddress($to, $to_name);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $altbody;

    //send the message, check for errors
    if (!$mail->send()) 
    {
        echo 'Error sending mail: '. $mail->ErrorInfo;
    } 
    else 
    {
        echo 'Message sent!';
    }
}

?>