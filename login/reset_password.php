<?php
session_start();
require_once __DIR__.'/../db_connect.php'; 

// Check if form submitted with "POST"
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['passwordnew']) && !empty($_POST['passwordnew']) && $_POST['passwordnew'] == $_POST['passwordnew_confirm'])
    {
        $email = $conn->escape_string($_POST['email']);
        $hash = $conn->escape_string($_POST['hash']);
        
        $passwordnew = password_hash($_POST['passwordnew'], PASSWORD_BCRYPT);

        $sql = "UPDATE users SET password='$passwordnew' WHERE email='$email'";

        if($conn->query($sql))
        {
            $_SESSION['message'] = "Ваш пароль було змінено!";
            header("location: success.php");
        }

    }
    else 
    {
        $_SESSION['message'] = "Пароль, який Ви завели, не співпадає, будь-ласка спробуйте ще раз!";
        header("location: error.php");
    }
}
?>