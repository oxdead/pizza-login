<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    require 'db_connect.php'; 
    include 'session_ease.php';

    $s = new SessionEase();

    // check if POST
    // check is user is valid in session


    $obj = json_decode($_POST["x"], false);

    $sql = "INSERT INTO `orders` (`order_id`, `user_id`, `pizza_id`, `pizza_sz`, `created`) VALUES (NULL, '4', '2', 'm', current_timestamp());"; 
    $conn->query($sql);

    $stmt = $conn->prepare("SELECT order_id, user_id, pizza_id, pizza_sz, created FROM orders");
    $stmt->execute();

    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    // todo: figure out how this thing sends data to onreadystatechange event into this.responseText ??
    echo json_encode($outp);
}
// else
// {
//     echo "";
// }



?>