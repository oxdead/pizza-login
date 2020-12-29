<?php
header('Content-Type: application/json');
require_once 'vendor/autoload.php';
$log = new Monolog\Logger('database');
$log->pushHandler(new Monolog\Handler\StreamHandler(__DIR__.'/logs/database.log', Monolog\Logger::ERROR));

require_once __DIR__.'/session_ease.php';
$s = new SessionEase();


if (filter_var($s->email(), FILTER_VALIDATE_EMAIL) && $s->valid()) 
{
    // delete all from a table
    $sql = "DELETE FROM `orders`";
    $conn->prepare($sql)->execute();

    $sql = "INSERT INTO `orders` (`email`, `pizza_id`, `pizza_sz`, `quantity`, `created`) VALUES ('i@i.i', 1, 's', 1, current_timestamp())"; 
    $conn->prepare($sql)->execute();
    $sql = "INSERT INTO `orders` (`email`, `pizza_id`, `pizza_sz`, `quantity`, `created`) VALUES ('som0@meta.ua', 2, 's', 1, current_timestamp())"; 
    $conn->prepare($sql)->execute();
    $sql = "INSERT INTO `orders` (`email`, `pizza_id`, `pizza_sz`, `quantity`, `created`) VALUES ('som0@meta.ua', 3, 's', 1, current_timestamp())"; 
    $conn->prepare($sql)->execute();
    $sql = "INSERT INTO `orders` (`email`, `pizza_id`, `pizza_sz`, `quantity`, `created`) VALUES ('som0@meta.ua', 3, 'm', 1, current_timestamp())"; 
    $conn->prepare($sql)->execute();
    $sql = "INSERT INTO `orders` (`email`, `pizza_id`, `pizza_sz`, `quantity`, `created`) VALUES ('som0@meta.ua', 4, 'l', 1, current_timestamp())"; 
    $conn->prepare($sql)->execute();
    
    /////////////////////////////////
    
    $newItems = (isset($_COOKIE["mikeypizzacart"])) ? json_decode($_COOKIE["mikeypizzacart"], true) : [];

    // also if some value is NULL, needs additional treatment (in our case we are good)
    //ELSE `quantity` statement is important, otherwise all other non-matching entries in a table will have quantity set to 0 (default)
    
    if(isset($newItems) && (count($newItems) > 0))
    {
        // insert distinct elements from cookie and update quantity of existing in db
        // table req unique compound key(email, pizza_id, pizza_sz)
        $sqlCompInsertUpdate = "INSERT INTO `orders` (`email`, `pizza_id`, `pizza_sz`, `quantity`, `created`) VALUES "; 
        foreach($newItems as $item)
        {
            $sqlCompInsertUpdate.="('{$s->email()}', {$item['id']}, '{$item['sz']}', {$item['q']}, current_timestamp()),";
        }
        $sqlCompInsertUpdate = rtrim ($sqlCompInsertUpdate , ",");

        $sqlCompInsertUpdate.=" ON DUPLICATE KEY UPDATE `quantity`=VALUES(`quantity`), `created`=VALUES(`created`);";
        $conn->prepare($sqlCompInsertUpdate)->execute();

    }
   
       // get from db only distinct values from cookie
        // if 1=1 then add to array, if 0 then skip
        $sqlCompSelect = "SELECT `pizza_id` AS `id`, `pizza_sz` AS `sz`, `quantity` AS `q` FROM `orders` WHERE `email`='{$s->email()}'";
        if (isset($newItems) && count($newItems) > 0)
        {
            $sqlCompSelect.=" AND (1 = CASE";
            foreach($newItems as $item)
            {
                $sqlCompSelect.=" WHEN (`pizza_id` = {$item['id']}) AND (`pizza_sz` = '{$item['sz']}') THEN 0";
            }
            $sqlCompSelect.=" ELSE 1 END);";
        }   
        $stmt = $conn->prepare($sqlCompSelect);
        $stmt->execute();
        $result = $stmt->get_result();
        $orders_from_db = $result->fetch_all(MYSQLI_ASSOC);
        
        
        setcookie("mikeypizzacart", json_encode($orders_from_db), time() + (86400*30), '/');

} 
else
{
    $log->error("$s->email() is not a valid email address or user has not activated account");
}
    




?>