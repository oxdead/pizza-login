<?php

	include ('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
	include ('../vendor/phpmailer/phpmailer/src/SMTP.php');

	//Import PHPMailer classes into the global namespace
	//These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;


	//Load Composer's autoloader
	require '../vendor/autoload.php';

	//Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP

    $mail->Host = 'smtp.gmail.com';   // Set the SMTP server to send through
    //$mail->Host = 'gmail-smtp-in.l.google.com';
    //$mail->Host = 'alt1.gmail-smtp-in.l.google.com';
    //$mail->Host = gethostbyname('gmail-smtp-in.l.google.com'); // if your network does not support SMTP over IPv6
    //$mail->Host = 'mxs.meta.ua';

    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    //$mail->SMTPAuth   = false;     
    $mail->Username   = "ytubescks@gmail.com";                     // SMTP username
    $mail->Password   = "ytre2@5%";                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    //$mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ytubescks@gmail.com', 'Mailer');
    $mail->addAddress('som0@meta.ua', 'Joe User');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //send the message, check for errors
    if (!$mail->send()) 
    {
        echo 'SOM0_ERROR: '. $mail->ErrorInfo;
    } 
    else 
    {
        echo 'Message sent!';
    }


?>