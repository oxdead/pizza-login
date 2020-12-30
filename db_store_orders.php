<?php
//header("Content-Type: application/json; charset=UTF-8");
session_start();

require_once __DIR__.'/session_ease.php';
require_once __DIR__.'/db_connect.php'; 
require_once __DIR__.'/vendor/autoload.php';
$log = new Monolog\Logger('database');
$log->pushHandler(new Monolog\Handler\StreamHandler('./logs/database.log', Monolog\Logger::ERROR));



if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $s = new SessionEase();

    // check is user is valid in session
    if (filter_var($s->email(), FILTER_VALIDATE_EMAIL)) 
    {
        if(isset($_POST["mkpzupd"]))
        {
            //$newItem = json_decode($_POST["mkpzupd"], true);

            $newItem_decoded = urldecode($_POST["mkpzupd"]);
            $newItem = [];
            parse_str($newItem_decoded, $newItem);

            //mysql_real_escape_string not needed for prepared statements ?
            $stmt = $conn->prepare("SELECT pizza_id, pizza_sz, quantity FROM orders WHERE email='{$s->email()}'");
            $stmt->execute();
            $result = $stmt->get_result();
            $orders_from_db = $result->fetch_all(MYSQLI_ASSOC);
            $isExistsInDB = false;
            foreach($orders_from_db as $order)
            {
                //$log->error($newItem['id'].":".$newItem['sz'].":".$newItem['q'].", ");
                if($order['pizza_id'] == $newItem['id'] && $order['pizza_sz'] == $newItem['sz'])
                {
                    if(isset($stmt)) { unset($stmt); }

                    
                    if($newItem['q'] < 1) // delete row, if order has no items, needed in details.php on changing quantity
                    {
                        $stmt = $conn->prepare("DELETE FROM `orders` WHERE `pizza_id` = ? AND `pizza_sz` = ?;");
                        $stmt->bind_param("is", $order['pizza_id'], $order['pizza_sz']);
                        $stmt->execute();
                    }
                    else
                    {
                        $order['quantity'] = $newItem['q'];
                        $stmt = $conn->prepare("UPDATE `orders` SET `quantity` = ?, `created` = current_timestamp() WHERE `orders`.`pizza_id` = ? AND `orders`.`pizza_sz` = ?;");
                        $stmt->bind_param("iis", $order['quantity'], $order['pizza_id'], $order['pizza_sz']);
                        $stmt->execute();
                    }
                    
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