<?php 
session_start();
require_once __DIR__.'/db/connect.php'; 
require_once __DIR__.'/site/session_ease.php'; 
   

#todo:
#learn and apply caching
#profile.php: client's profile logs all orders
#meta facebook-og, twittercards
#change language of errors in tooltips on input field submit
#every day run event at 2:00 to clean stale cart items (not purchased in 30 days)
#add phone field to users table in db
#add transactions, sms
#learn how to use sizes and srcset
#support for small screens for footer using Materialize (flex, grid)
#support for small screens for other pages except index.php
#make sure all text inputs wrapped into htmlspecialchars | msqli_escape_string
#details.php: input field for quantity
#Menu: Мій Профіль, Залишити відгук, Про нас
#link to profile in header dropdown
#make profile page
#build site-tree

$sql = "SELECT id, title, ingredients, img, price_small, price_medium, price_large FROM pizzas"; // select data from 3 columns from pizzas table and order them by 'created' timestamp property
$results = $conn->query($sql);
//$pizzas = $results->fetch_all(MYSQLI_ASSOC); // doesn't work on free tier plan at awardspace.com, no mysqlnd installed 
$pizzas = [];
while($row = mysqli_fetch_array($results,MYSQLI_ASSOC))
{
    $pizzas[] = $row;
}



if($s->valid())
{
    $sEmail = $conn->escape_string($s->email());
    $sql = "SELECT pizza_id, pizza_sz, quantity FROM orders WHERE email='{$sEmail}'";
    $results = $conn->query($sql);
    //$orders = $results->fetch_all(MYSQLI_ASSOC);
    $orders = [];
    while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
    {
        $orders[] = $row;
    }
}

//4. free from memory and close connection (optional, but it's good practice to do so)
mysqli_free_result($results);
mysqli_close($conn);

// for now limited to 7 ingredients at max
function renderIngredients($pizza)
{
    if(!$pizza) { return; } 
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
}



?>



<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__.'/site/head.php'; ?>
<body>
<?php require_once __DIR__.'/site/header.php'; ?>


<!-- Slideshow container -->
<div class="slideshow-container">
    <!-- Full-width images (with number) and caption text will be added here from javascript-->

    <!-- Next and previous buttons -->
    <a class="prev" onclick="prevSlide()">&#10094;</a>
    <a class="next" onclick="nextSlide()">&#10095;</a>
</div>

<br>

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
                <div class="col s12 m6 xl4 md3">
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

                            <ul> <?php renderIngredients($pizza); ?> </ul>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width" style="overflow:hidden;">
                                <li class="tab"><a id="isactvsmall<?=$pizza_id;?>" class="grey-text text-darken-4" href="#psmall<?=$pizza_id;?>">Мала</a></li>
                                <li class="tab"><a id="isactvmedium<?=$pizza_id;?>" class="grey-text text-darken-4 active" href="#pmedium<?=$pizza_id;?>">Середня</a></li>
                                <li class="tab"><a id="isactvlarge<?=$pizza_id;?>" class="grey-text text-darken-4" href="#plarge<?=$pizza_id;?>">Велика</a></li>
                            </ul>
                        </div>
                        <div class="divider"></div>
                        <div class="card-content right-align grey lighten-4">
                            <div class="left price-tag grey lighten-4" id="psmall<?=$pizza_id;?>"><?=htmlspecialchars($pizza['price_small']);?>&nbspгрн.</div>
                            <div class="left price-tag grey lighten-4" id="pmedium<?=$pizza_id;?>"><?=htmlspecialchars($pizza['price_medium']);?>&nbspгрн.</div>
                            <div class="left price-tag grey lighten-4" id="plarge<?=$pizza_id;?>"><?=htmlspecialchars($pizza['price_large']);?>&nbspгрн.</div>
                            
                            <a id="addpizza<?=$pizza_id;?>" href="index.php">В кошик</a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
</section>

<?php require_once __DIR__.'/site/footer.php'; ?>
</body>
</html>