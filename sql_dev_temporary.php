<?php
$sql = "CREATE DATABASE IF NOT EXISTS 3664109_mkpz";
    if ($conn->query($sql) === TRUE) 
    {
        $sql = "CREATE TABLE IF NOT EXISTS `3664109_mkpz`.`users` ( `id` INT NOT NULL AUTO_INCREMENT, `first_name` VARCHAR(50) NOT NULL, `last_name` VARCHAR(50) NOT NULL, `email` VARCHAR(100) NOT NULL UNIQUE, `password` VARCHAR(100) NOT NULL, `hash` VARCHAR(32) NOT NULL, `active` BOOL NOT NULL DEFAULT 0, PRIMARY KEY (`id`) )";
        if ($conn->query($sql) === FALSE)
        {
            echo "Error creating table: " . $conn->error;
        }

        $sql = "CREATE TABLE IF NOT EXISTS `3664109_mkpz`.`pizzas` ( `id` INT NOT NULL AUTO_INCREMENT, `title` VARCHAR(50) NOT NULL, `ingredients` VARCHAR(255) NOT NULL, `size` INT NOT NULL DEFAULT 0, `thickness` BOOL NOT NULL DEFAULT 0, PRIMARY KEY (`id`) )";
        if ($conn->query($sql) === FALSE)
        {
            echo "Error creating table: " . $conn->error;    
        }


        $sql = "INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `size`, `thickness`) VALUES ('1', 'Піца Пепероні з томатами', 'Моцарела, Пепероні, Помідори, Соус Барбекю', '0', '0')"; 
        $conn->query($sql);
        $sql = "INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `size`, `thickness`) VALUES ('2', 'Піца Маргарита', 'Моцарела, Соус Мама-Мія', '0', '0')"; 
        $conn->query($sql);
        $sql = "INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `size`, `thickness`) VALUES ('3', 'Піца Техас', 'Кукурудза, Цибуля, Гриби, Ковбаски баварські, Моцарела, Соус Барбекю', '0', '0')"; 
        $conn->query($sql);
        $sql = "INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `size`, `thickness`) VALUES ('4', 'Піца Пепероні Блюз', 'Бергадер Блю, Моцарела, Пепероні, Соус Альфредо', '0', '0')"; 
        $conn->query($sql);
        $sql = "INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `size`, `thickness`) VALUES ('5', 'Піца Гавайська', 'Курка, Ананас, Моцарела, Соус Мама-Мія', '0', '0')"; 
        $conn->query($sql);
        $sql = "INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `size`, `thickness`) VALUES ('6', 'Піца Барбекю', 'Курка, Цибуля, Бекон, Гриби, Моцарела, Соус Барбекю', '0', '0')"; 
        $conn->query($sql);
        $sql = "INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `size`, `thickness`) VALUES ('7', 'Піца Тоскана', 'Курка, Фета, Моцарела, Помідори чері, Соус Альфредо, Шпинат', '0', '0')"; 
        $conn->query($sql);
        $sql = "INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `size`, `thickness`) VALUES ('8', 'Піца Спайсі', 'Халапеньо, Бекон, Моцарела, Пепероні, Помідори, Соус Мама-Мія', '0', '0')"; 
        $conn->query($sql);

        $sql = "ALTER TABLE `pizzas` ADD `img` VARCHAR(256) NOT NULL AFTER `thickness`"; 
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `img` = 'img/pepperoni_tomato-960x960-70.jpg' WHERE `pizzas`.`id` = 1";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `img` = 'img/margarita-960x960-70.jpg' WHERE `pizzas`.`id` = 2";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `img` = 'img/texas-960x960-70.jpg' WHERE `pizzas`.`id` = 3";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `img` = 'img/pepperoni_blues-960x960-70.jpg' WHERE `pizzas`.`id` = 4";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `img` = 'img/hawaian-960x960-70.jpg' WHERE `pizzas`.`id` = 5";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `img` = 'img/bbq-960x960-70.jpg' WHERE `pizzas`.`id` = 6";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `img` = 'img/toskana-960x960-70.jpg' WHERE `pizzas`.`id` = 7";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `img` = 'img/spicy-960x960-70.jpg' WHERE `pizzas`.`id` = 8";
        $conn->query($sql);

        
        $sql = "ALTER TABLE `pizzas` ADD `price_small` FLOAT NOT NULL AFTER `img`;"; 
        $conn->query($sql);
        $sql = "ALTER TABLE `pizzas` ADD `price_medium` FLOAT NOT NULL AFTER `price_small`;"; 
        $conn->query($sql);
        $sql = "ALTER TABLE `pizzas` ADD `price_large` FLOAT NOT NULL AFTER `price_medium`;"; 
        $conn->query($sql);

        $sql = "UPDATE `pizzas` SET `price_small` = '90.5', `price_medium` = '164.5', `price_large` = '199.5' WHERE `pizzas`.`id` = 1";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `price_small` = '90.5', `price_medium` = '164.5', `price_large` = '199.5' WHERE `pizzas`.`id` = 2";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `price_small` = '90.5', `price_medium` = '164.5', `price_large` = '199.5' WHERE `pizzas`.`id` = 3";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `price_small` = '121.5', `price_medium` = '191.5', `price_large` = '233.5' WHERE `pizzas`.`id` = 4";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `price_small` = '121.5', `price_medium` = '191.5', `price_large` = '233.5' WHERE `pizzas`.`id` = 5";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `price_small` = '121.5', `price_medium` = '191.5', `price_large` = '233.5' WHERE `pizzas`.`id` = 6";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `price_small` = '167.5', `price_medium` = '227.5', `price_large` = '259.5' WHERE `pizzas`.`id` = 7";
        $conn->query($sql);
        $sql = "UPDATE `pizzas` SET `price_small` = '167.5', `price_medium` = '227.5', `price_large` = '259.5' WHERE `pizzas`.`id` = 8";
        $conn->query($sql);
        
        $sql = "CREATE TABLE IF NOT EXISTS `3664109_mkpz`.`orders` ( `order_id` INT NOT NULL AUTO_INCREMENT, `email` VARCHAR(40) NOT NULL, `pizza_id` INT NOT NULL, `pizza_sz` CHAR(1) NOT NULL, `quantity` INT NOT NULL, `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`order_id`) )";
        $conn->query($sql);
    
    } 
    else 
    {
        echo "Error creating database: " . $conn->error;
        die();
    }
    ?>