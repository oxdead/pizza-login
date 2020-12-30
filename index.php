<?php 
session_start();
require_once 'db_connect.php'; 
require_once 'session_ease.php'; 
    

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
#replace pizza size with dropdown menu for changing size of pizza
#input field for quantity
#every day run event at 2:00 to clean stale cart items (not purchased in 30 days)
#fix all paths
#fix all login pages
#Menu: Головна, Реєстрація, Мій Профіль, Залишити відгук, Про нас
#add orders to database (id, foreign_user_id, pizza_id, pizza_sz, created_at, sessin_id) use cartClean(); before saving to db to save only orders with more than 1 item
#load from db orders and list them in details.php
#add phone, name, email fields to db
#add order_id into database and make it unique primary key
#save data into database as datetime
#unset and destroy session on log out




/////////////////////////////////////////////////
require_once 'sql_dev_temporary.php'; // for development only

//1. query for all pizzas
$sql = "SELECT id, title, ingredients, img, price_small, price_medium, price_large FROM pizzas"; // select data from 3 columns from pizzas table and order them by 'created' timestamp property
//2. send query and get some results
$results = $conn->query($sql);
//3. fetch the resulting rows as an associative array
$pizzas = $results->fetch_all(MYSQLI_ASSOC);

$s = new SessionEase();
if($s->valid())
{
    $sql = "SELECT pizza_id, pizza_sz, quantity FROM orders WHERE email='{$s->email()}'";
    $results = $conn->query($sql);
    $orders = $results->fetch_all(MYSQLI_ASSOC);
}

//4. free from memory and close connection (optional, but it's good practice to do so)
mysqli_free_result($results);
mysqli_close($conn);

?>



<!DOCTYPE html>
<html>
<?php require_once 'head.php'; ?>
<body onload="load()">

<?php require_once 'header.php'; ?>


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
    

<section class="container">
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
                            
                            <a id="addpizza<?=$pizza_id;?>" href="index.php">В кошик</a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
</section>

    <?php require_once 'footer.php'; ?>
</body>
<?php require_once 'script_carousel.php'; ?>
<?php require_once 'script.php'; ?>
</html>

