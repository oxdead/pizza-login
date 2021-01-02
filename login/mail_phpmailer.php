<?php

namespace Lyo;

require_once __DIR__.'/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__.'/../vendor/phpmailer/phpmailer/src/SMTP.php';

require_once __DIR__.'/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PHPMailerHandler
{
    private $mail = null;

    public function __construct($host, $user, $pass, $port = 25, $debug = false)
    {
        $this->mail = new PHPMailer(true);

        $this->mail->SMTPDebug = ($debug ? SMTP::DEBUG_SERVER : SMTP::DEBUG_OFF);
        $this->mail->isSMTP();
        
        $this->mail->Host = $host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $user;
        $this->mail->Password = $pass;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = $port;

        $this->mail->setFrom($user, 'Oleksiy'); // $user here as email of sender
        $this->mail->isHTML(true);
    }

    public function __destruct() 
    {
        if(isset($mail)) { unset($mail); }
    }

    public function setFrom($email, $name)
    {
        $this->mail->setFrom($email, $name);
    }

    public function send($toMail, $toName, $subject, $body, $altbody)
    {
        $this->mail->addAddress($toMail, $toName);
        //$mail->addReplyTo($toMail, $toName);

        $this->mail->Subject = $subject;
        $this->mail->Body    = $body;
        $this->mail->AltBody = $altbody;

        try 
        {
            $this->mail->send();
        } 
        catch (Exception $e) 
        {
            echo "Your message could not be sent! PHPMailer Error: {$this->mail->ErrorInfo}";
        }
    }


};
?>