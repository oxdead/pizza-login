<?php 
    session_start();
    require 'db_connect.php'; 
    

#todo:
#change language of errors in tooltips on input field submit
#clear session message 
#how to use a cookie to set mail automatically, when entering input field
#add cart, email, sms

#make sure all text inputs wrapped into htmlspecialchars
#support for small screens
#clean code 
#fix all paths
#add links to pizza profiles in carousel images
#Menu: Головна, Реєстрація, Мій Профіль, Залишити відгук, Про нас
#redo into php func pizza cards
#details.php before sending to cart


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

    



    <!-- <h4 class="center grey-text">Піца від Mikey!</h4> -->
    <div class='container'>
        <!-- <ul>
            <li> <a href="add.php" class="btn brand z-depth-0">Add a pizza</a> </li>
        </ul> -->

        

        
        <div class="row">
            
            <?php foreach($pizzas as $pizza) { ?>

                <div class="col s6 md3">
                    <div class="card z-depth-1 hoverable">

                        
                        <!-- make another picture for mobile -->
                        <!-- learn how to use sizes and srcset -->

                        <div class="row">
                            <img src="<?= $pizza['img']; ?>" 

                                sizes="" 
                                srcset="<?=$pizza['img'];?> 2960w" 
                                
                                class="col s12">
                        </div>
                        <div class="card-content center">
                            <h5 class="truncate">
                                <?php 
                                    echo htmlspecialchars($pizza['title']); 
                                ?>
                            </h5>

                            <ul>
                                <?php 
                                    $ingredients_exploded = explode(',', $pizza['ingredients']);
                                    foreach($ingredients_exploded as $ingredient)
                                    {
                                ?>
                                        <li>
                                            <?php echo htmlspecialchars($ingredient); ?>
                                        </li>  

                                <?php }
                                    if ($ingredients_exploded !== false && count($ingredients_exploded) > 0 && count($ingredients_exploded) < 7)
                                    {
                                        for($i = 0; $i < 7 - count($ingredients_exploded); ++$i)
                                        {
                                ?>
                                            <li> <br /> </li>
                                <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width ">
                                <li class="tab"><a class="grey-text text-darken-4" href="#psmall<?=$pizza['id'];?>">Мала</a></li>
                                <li class="tab"><a class="grey-text text-darken-4 active" href="#pmedium<?=$pizza['id'];?>">Середня</a></li>
                                <li class="tab"><a class="grey-text text-darken-4" href="#plarge<?=$pizza['id'];?>">Велика</a></li>
                            </ul>
                        </div>
                        <div class="divider"></div>
                        <div class="card-content right-align">
                            <div class="white left price-tag" id="psmall<?=$pizza['id'];?>"><?=$pizza['price_small'];?>&nbspгрн.</div>
                            <div class="white left price-tag" id="pmedium<?=$pizza['id'];?>"><?=$pizza['price_medium'];?>&nbspгрн.</div>
                            <div class="white left price-tag" id="plarge<?=$pizza['id'];?>"><?=$pizza['price_large'];?>&nbspгрн.</div>


                            <a href="details.php?id=<?php echo $pizza['id'] ?>">В кошик</a>

                        </div>

                        <!-- <script>
                            var el = document.querySelector('.tabs');
                            var instance = M.Tabs.init(el, {});
                        </script> -->

                        <!-- <div class="card-action right-align">
                        <div class="left">
                            <p style="margin:0px;">
                                <?php 

                                ?>
                            </p>
                        </div>
                        <a class="" href="details.php?id=<?php echo $pizza['id'] ?>">В кошик</a>




                        </div> -->
                        

                    </div>
                </div>
            <?php } ?>
        
        </div>
    
    </div>

    <?php include('footer.php'); ?>
</body>
<?php include('script_carousel.php'); ?>
<?php include('script.php'); ?>
</html>

