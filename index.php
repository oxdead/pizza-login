<?php 
    session_start();
    require 'db_connect.php'; 
    

#todo:
#change language of errors in tooltips on input field submit
#clear session message 
#client's profile logs all orders
#how to use a cookie to set mail automatically, when entering input field
#add cart, email, sms
#learn how to use sizes and srcset
#make sure all text inputs wrapped into htmlspecialchars | msqli_escape_string
#support for small screens
#clean code 
#Menu: Головна, Реєстрація, Мій Профіль, Залишити відгук, Про нас
#redo into php func pizza cards
#fix all paths
#fix all login pages
#add -1/+1 html elms and add number of pizzas to cookie, check if such pizza already added to cookie, then just increase quantity, do not add new object
#add orders to database (email, foreign_user_id, created_by, created_at) use cartClean(); before saving to db to save only orders with more than 1 item
#load from db orders and list them in details.php
#show ingredients in details.php
#add phone, name, email fields to details.php
#every day run event at 2:00 to clean stale cart items (not purchased in 30 days)
#input field for quantity
#add order_id into database and make it unique primary key
#save data into database as datetime
#finish -/+ buttons (add events on click)
#replace size with dropdown menu for changing size of pizza


    /////////////////////////////////////////////////
    // for development only
    $sql = "CREATE DATABASE IF NOT EXISTS accounts";
    if ($conn->query($sql) === TRUE) 
    {
        $sql = "CREATE TABLE IF NOT EXISTS `accounts`.`users` ( `id` INT NOT NULL AUTO_INCREMENT, `first_name` VARCHAR(50) NOT NULL, `last_name` VARCHAR(50) NOT NULL, `email` VARCHAR(100) NOT NULL, `password` VARCHAR(100) NOT NULL, `hash` VARCHAR(32) NOT NULL, `active` BOOL NOT NULL DEFAULT 0, PRIMARY KEY (`id`) )";
        if ($conn->query($sql) === FALSE)
        {
            echo "Error creating table: " . $conn->error;
        }

        $sql = "CREATE TABLE IF NOT EXISTS `accounts`.`pizzas` ( `id` INT NOT NULL AUTO_INCREMENT, `title` VARCHAR(50) NOT NULL, `ingredients` VARCHAR(255) NOT NULL, `size` INT NOT NULL DEFAULT 0, `thickness` BOOL NOT NULL DEFAULT 0, PRIMARY KEY (`id`) )";
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
    } 
    else 
    {
        echo "Error creating database: " . $conn->error;
        die();
    }
    ////////////////////////////////////////////////////////


    //1. query for all pizzas
    //$sql = 'SELECT * FROM pizzas'; // select data from all(*) columns from pizzas table
    $sql = "SELECT id, title, ingredients, img, price_small, price_medium, price_large FROM pizzas"; // select data from 3 columns from pizzas table and order them by 'created' timestamp property
    
    //2. send query and get some results
    $results = mysqli_query($conn, $sql);

    
    //3. fetch the resulting rows as an associative array
    $pizzas = mysqli_fetch_all($results, MYSQLI_ASSOC);

    //4. free from memory and close connection (optional, but it's good practice to do so)
    mysqli_free_result($results);
    mysqli_close($conn);
    
    // $cookie_k0 = 'id';
    // $cookie_v0 = 5;
    // $cookie_k1 = 'sz';
    // $cookie_v1 = 'large';
    // setcookie($cookie_k1, $cookie_v1, time() + (86400*30));
    // setcookie($cookie_k0, $cookie_v0, time() + (86400*30));

?>



<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body onload="load()">

<?php include 'header.php'; ?>


    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="my-slides fade">
            <!-- <div class="numbertext">1 / 4</div> -->
            <img src="img/mikey_main.jpg" class="crsl-img">
            <div class="captiontext">Піца від Mikey! :)</div>
        </div>


        <div class="my-slides fade">
            <!-- <div class="numbertext">2 / 4</div> -->
            <img src="img/carousel1.jpg" class="crsl-img">
            <div class="captiontext">Піца Барбекю: Класика, Незрівнянний смак!</div>
        </div>

        <div class="my-slides fade">
            <!-- <div class="numbertext">3 / 4</div> -->
            <img src="img/carousel2.jpg" class="crsl-img">
            <div class="captiontext">Піца Тоскана: Для справжніх гурманів</div>
        </div>

        <div class="my-slides fade">
            <!-- <div class="numbertext">4 / 4</div> -->
            <img src="img/carousel3.jpg" class="crsl-img">
            <div class="captiontext">Піца Техас: Спробуй неймовірну суміш інгредієнтів</div>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="prevSlide()">&#10094;</a>
        <a class="next" onclick="nextSlide()">&#10095;</a>
    </div>

    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="thumbnailSlide(1)"></span>
        <span class="dot" onclick="thumbnailSlide(2)"></span>
        <span class="dot" onclick="thumbnailSlide(3)"></span>
        <span class="dot" onclick="thumbnailSlide(4)"></span>
    </div> 

    <br>
    



    
    <div class='container'>
        <div class="row">
            
            <?php 
            foreach($pizzas as $pizza) { 
                $pizza_id = htmlspecialchars($pizza['id']);
            ?>
                <div class="col s6 md3">
                    <div class="card z-depth-1 hoverable">

                        
                        <!-- make another picture for mobile -->
                        <!-- learn how to use sizes and srcset -->

                        <div class="row">
                            <img src="<?= htmlspecialchars($pizza['img']); ?>" 
                                sizes="" 
                                srcset="<?= htmlspecialchars($pizza['img']);?> 2960w" 
                                class="col s12">
                        </div>
                        <div class="card-content center">
                            <h5 class="truncate"> <?php echo htmlspecialchars($pizza['title']); ?> </h5>

                            <ul>
                                <?php 
                                    $ingrs_exploded = explode(',', $pizza['ingredients']);
                                    foreach($ingrs_exploded as $ingredient)
                                    {
                                        echo '<li>', htmlspecialchars($ingredient), '</li>';
                                    }

                                    $ingrs_expl_sz = ($ingrs_exploded !== false) ? count($ingrs_exploded) : 0;
                                    if ($ingrs_expl_sz > 0 && $ingrs_expl_sz < 7)
                                    {
                                        for($i = 0; $i < 7 - $ingrs_expl_sz; ++$i)
                                        {
                                            echo '<li><br/></li>';
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width ">
                                <li class="tab"><a id="isactvsmall<?=$pizza_id;?>" class="grey-text text-darken-4" href="#psmall<?=$pizza_id;?>">Мала</a></li>
                                <li class="tab"><a id="isactvmedium<?=$pizza_id;?>" class="grey-text text-darken-4 active" href="#pmedium<?=$pizza_id;?>">Середня</a></li>
                                <li class="tab"><a id="isactvlarge<?=$pizza_id;?>" class="grey-text text-darken-4" href="#plarge<?=$pizza_id;?>">Велика</a></li>
                            </ul>
                        </div>
                        <div class="divider"></div>
                        <div class="card-content right-align grey lighten-4">
                            <div class="white left price-tag grey lighten-4" id="psmall<?=$pizza_id;?>"><?=htmlspecialchars($pizza['price_small']);?>&nbspгрн.</div>
                            <div class="white left price-tag grey lighten-4" id="pmedium<?=$pizza_id;?>"><?=htmlspecialchars($pizza['price_medium']);?>&nbspгрн.</div>
                            <div class="white left price-tag grey lighten-4" id="plarge<?=$pizza_id;?>"><?=htmlspecialchars($pizza['price_large']);?>&nbspгрн.</div>
                            
                            <a id="addpizza<?=$pizza_id;?>" href="details.php">В кошик</a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        
        </div>
    
    </div>

    <?php include 'footer.php'; ?>
</body>
<?php include 'script_carousel.php'; ?>
<?php include 'script.php'; ?>
</html>

