<?php
// verify registered user email, the link to this page is included in the register.php email message
session_start();
require_once __DIR__.'/../db_connect.php';
require_once __DIR__.'/../rooturl.php';

// make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $conn->escape_string($_GET['email']);
    $hash = $conn->escape_string($_GET['hash']);

    // select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");

    if($result->num_rows == 0)
    {
        $_SESSION['message'] = "аккаунт вже був активований або не корректний URL!";
        //header("location: error.php");
        headTo($rooturl.'/login/error.php');
    }
    else
    {
        $_SESSION['message'] = "Ваш аккаунт активовано!";

        // set user status to active (axtive = 1)
        $conn->query("UPDATE users SET active='1' WHERE email='$email'") or die($conn->error);
        $_SESSION['active'] = 1;
        if($_SESSION['active'] && $_SESSION['logged_in']) { setcookie('mkpzactv', '1', 0); }

        //header("location: success.php");
        headTo($rooturl.'/login/success.php');

    }
}
?>