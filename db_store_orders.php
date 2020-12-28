<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

require 'session_ease.php';
require_once 'db_connect.php'; 
require_once 'vendor/autoload.php';
$log = new Monolog\Logger('database');
$log->pushHandler(new Monolog\Handler\StreamHandler('./logs/database.log', Monolog\Logger::ERROR));



if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $s = new SessionEase();

    // check is user is valid in session
    if (filter_var($s->email(), FILTER_VALIDATE_EMAIL)) 
    {
        if(isset($_POST["mkpzadd"]))
        {
            $newItem = json_decode($_POST["mkpzadd"], true);
            $log->error(json_encode($newItem));
            //mysql_real_escape_string not needed for prepared statements ?
            $stmt = $conn->prepare("SELECT pizza_id, pizza_sz, quantity FROM orders WHERE email='{$s->email()}'");
            $stmt->execute();
            $result = $stmt->get_result();
            $orders_from_db = $result->fetch_all(MYSQLI_ASSOC);
            $isExistsInDB = false;
            $log->error(json_encode($orders_from_db));
            foreach($orders_from_db as $order)
            {
                
                if($order['pizza_id'] == $newItem['id'] && $order['pizza_sz'] == $newItem['sz'])
                {
                    $log->error("here");
                    $order['quantity'] = $newItem['q'];
                    unset($stmt);
                    $stmt = $conn->prepare("UPDATE `orders` SET `quantity` = ?, `created` = current_timestamp() WHERE `orders`.`pizza_id` = ? AND `orders`.`pizza_sz` = ?;");
                    $stmt->bind_param("iis", $order['quantity'], $order['pizza_id'], $order['pizza_sz']);
                    $stmt->execute();
                    $isExists = true;
                    break;
                }
            }

            if(!$isExists)
            {
                unset($stmt);
                $stmt = $conn->prepare("INSERT INTO `orders` (`order_id`, `email`, `pizza_id`, `pizza_sz`, `quantity`, `created`) VALUES (NULL, ?, ?, ?, ?, current_timestamp());");
                $stmt->bind_param("sisi", $s->email(), $newItem['id'], $newItem['sz'], $newItem['q']);
                $stmt->execute();
            }

            //$stmt = $conn->prepare("SELECT order_id, user_id, pizza_id, pizza_sz, created FROM orders");
            //$stmt->execute();
            //$result = $stmt->get_result();
            //$outp = $result->fetch_all(MYSQLI_ASSOC);
            // // todo: figure out how this thing sends data to onreadystatechange event into this.responseText ??
            // echo json_encode($outp);

        }
        else if(isset($_POST["mkpzupd"])) // todo
        {

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