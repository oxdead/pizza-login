<?php

// // example of compound update
// // ELSE `quantity` statement is important, otherwise all other non-matching entries in a table will have quantity set to 0 (default)
// // If some value is NULL, needs additional treatment (in our case we are good)
// $newItems = array(
//     ['id'=>1, 'sz'=>'s', 'q'=>2],
//     ['id'=>2, 'sz'=>'s', 'q'=>2],
//     ['id'=>3, 'sz'=>'m', 'q'=>2],
// );
// if(isset($newItems) && count($newItems) > 0)
// {
    // $sqlUpdateCompound = "UPDATE `orders` SET `quantity` = CASE";
    // foreach($newItems as $item)
    // {
    //     $sqlUpdateCompound.= " WHEN `pizza_id`={$item['id']} AND `pizza_sz`='{$item['sz']}' THEN {$item['q']}";
    // }
    // $sqlUpdateCompound.=" ELSE `quantity` END;";
    // $conn->prepare($sqlUpdateCompound)->execute();
// }


// insert new rows to db, if key found, then modify existing row instead
// table needs unique compound key(email, pizza_id, pizza_sz)
// $sqlUpdateCompound = "INSERT INTO `orders` (`email`, `pizza_id`, `pizza_sz`, `quantity`, `created`) 
//    VALUES ('a1@meta.ua', 1, 's', 6, current_timestamp()),
//           ('b1@meta.ua', 2, 'm', 7, current_timestamp()) 
//    ON DUPLICATE KEY UPDATE `quantity`=VALUES(`quantity`), `created`=VALUES(`created`);";
// $conn->prepare($sqlUpdateCompound)->execute();



// // if 1=1 then add to array, if 0 then skip
// $sql = "SELECT `pizza_id`, `pizza_sz` FROM `orders` WHERE `email`='i@i.i' AND (1 = CASE 
//     WHEN `pizza_id` = 2 AND `pizza_sz` = 's' THEN 0
//     WHEN `pizza_id` = 3 AND `pizza_sz` = 'm' THEN 0
//     ELSE 1
// END);";


// same as above, but return fields with null values for other email than 'i@i.i'
// $sql = "SELECT
// CASE
//     WHEN `pizza_id` != 2 OR `pizza_sz` != 's' THEN `pizza_id`
// END AS `pizza_id`, 
// CASE
//     WHEN `pizza_id` != 2 OR `pizza_sz` != 's' THEN `pizza_sz`
// END AS `pizza_sz` 
// FROM `orders` WHERE email='i@i.i';";

?>