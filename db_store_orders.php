<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

include 'session_ease.php';
require 'db_connect.php'; 

require_once('./vendor/autoload.php');
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
$log = new Logger('database');
$log->pushHandler(new StreamHandler('./logs/database.log', Logger::DEBUG));



if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $s = new SessionEase();
    

    // check is user is valid in session
    if (filter_var($s->email(), FILTER_VALIDATE_EMAIL)) 
    {
        if(isset($_POST["mkpzadd"]))
        {
            $obj = json_decode($_POST["mkpzadd"], true);
            //mysql_real_escape_string not needed for prepared statements
            $stmt = $conn->prepare("INSERT INTO `orders` (`order_id`, `email`, `pizza_id`, `pizza_sz`, `created`) VALUES (NULL, ?, ?, ?, current_timestamp());");
            $stmt->bind_param("sis", $s->email(), $obj['id'], $obj['sz']);
            $stmt->execute();

            //$stmt = $conn->prepare("SELECT order_id, user_id, pizza_id, pizza_sz, created FROM orders");
            //$stmt->execute();
            //$result = $stmt->get_result();
            //$outp = $result->fetch_all(MYSQLI_ASSOC);
            // // todo: figure out how this thing sends data to onreadystatechange event into this.responseText ??
            // echo json_encode($outp);

        }
        else
        {
            $log->error("POST data doesn't exist");
        }
    } 
    else
    {
        $log->error("$s->email() is not a valid email address");
    }
    
}



?>