<?php
    session_start();
    require_once __DIR__.'/../db/connect.php'; 

    $sql = "SELECT id, title, ingredients, price_small AS s, price_medium AS m, price_large AS l FROM pizzas"; // select data from 3 columns from pizzas table and order them by 'created' timestamp property
    $results = mysqli_query($conn, $sql);
    $pizzas = fetchDB($results);
    mysqli_free_result($results);
    mysqli_close($conn);

    // gather all orders info into 1 array
    $oLines = [];
    $totalPrice = 0.0;
    if(isset($_COOKIE['mikeypizzacart']))
    {
        $orders = JSON_decode($_COOKIE['mikeypizzacart'], true);

        foreach($orders as $order)
        {
            foreach($pizzas as $pizza)
            {
                if($order['id'] == $pizza['id'])
                {
                    $sz = '';
                    if($order['sz'] == 's') { $sz = 'Мала'; }
                    else if($order['sz'] == 'm') { $sz = 'Середня'; }
                    else if($order['sz'] == 'l') { $sz = 'Велика'; }

                    $price = (isset($pizza[$order['sz']])) ? number_format((float)($pizza[$order['sz']]*$order['q']), 2, '.', '') : NAN;

                    if($sz !== '' && is_numeric($price) && !is_nan($price))
                    {
                        $oLines[] = [
                            'suffix' => htmlspecialchars($order['id'].'-'.$order['sz']),
                            'title' => htmlspecialchars($pizza['title']),
                            'sz' => htmlspecialchars($sz),
                            'price' => htmlspecialchars($price),
                            'q' => htmlspecialchars($order['q']),
                            'ingredients' => htmlspecialchars($pizza['ingredients'])
                        ];

                        $totalPrice += round($price, 2); 

                    }
                }
            }
        }
    }

    //calc total sum
    $totalPrice = htmlspecialchars(number_format((float)$totalPrice, 2, '.', ''));

?>


<!DOCTYPE html>
<html>
<?php require_once __DIR__.'/head.php'; ?>
<body class="grey lighten-4">
<?php require_once __DIR__.'/header.php'; ?>

    <section class="container">
        <h2 class="center grey-text" >Замовлення</h2>
        
        <ul class="collapsible expandable">
            <?php 
                if(count($oLines) < 1)
                {
                    echo "<p class=\"center-align\">Замовлення відсутні</p>";
                }
                else
                {
                    foreach($oLines as $o)
                    {
            ?>
                        <li id="li<?=$o['suffix'];?>">
                            <div class="row">
                                <div class="collapsible-header">
                                    <div class="col s4 truncate">
                                        <?=$o['title'];?>
                                    </div>
                                    <div class="col s2">
                                        <?=$o['sz'];?>
                                    </div>
                                    <div id="order-price<?=$o['suffix'];?>"class="col s2 price-tag">
                                        <?=$o['price'];?>
                                    </div>
                                    <div class="col s1">
                                        <div id="order-q-minus<?=$o['suffix'];?>" class="btn-minus prevent-collapse">
                                            <strong>-</strong>
                                        </div>
                                    </div>
                                    <!-- todo: make this an input field -->
                                    <p id="order-q-input<?=$o['suffix'];?>" class="col s1 center-align prevent-collapse" style="margin:0%;padding:0%;">
                                        <?=$o['q'];?>
                                    </p>
                                    <div class="col s1">
                                        <div id="order-q-plus<?=$o['suffix'];?>" class="btn-plus prevent-collapse">
                                            <strong>+</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body"><p>Інгредієнти:<br/>&nbsp&nbsp&nbsp&nbsp<?=$o['ingredients']?></p></div>
                        </li>
            <?php
                    }
                }
            ?>

            <li>
                <div class="row teal lighten-4">
                    <p class="col s2 push-s4">Всього:</p>
                    <p id="order-total-price" class="col s2 push-s4 price-tag">
                        <?php echo $totalPrice, " грн."; ?>
                    </p>

                    <a href="#" class="col offset-s4 btn brand z-depth-0" style="margin-top:1%;margin-bottom:1%;padding-left:3%;padding-right:3%">
                        Підтвердити
                    </a>

                </div>
            </li>
        </ul>    
    </section>


<?php require_once __DIR__.'/footer.php'; ?>
</body>
</html>