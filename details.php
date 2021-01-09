<?php
    session_start();
    require_once __DIR__.'/db_connect.php'; 

    $sql = "SELECT id, title, ingredients, price_small AS s, price_medium AS m, price_large AS l FROM pizzas"; // select data from 3 columns from pizzas table and order them by 'created' timestamp property
    $results = mysqli_query($conn, $sql);
    $pizzas = fetchDB($results);
    mysqli_free_result($results);
    mysqli_close($conn);

    $sizes = ["s" => "Мала", "m" => "Середня", "l" => "Велика"];
?>


<!DOCTYPE html>
<html>
<?php require_once __DIR__.'/head.php'; ?>
<body onload="load()" class="grey lighten-4">
<?php require_once __DIR__.'/header.php'; ?>

    <section class="container">
        <h2 class="center grey-text" >Замовлення</h2>
        
        <ul class="collapsible expandable">
            <?php 
                if(isset($_COOKIE['mikeypizzacart']))
                {
                    $orders = JSON_decode($_COOKIE['mikeypizzacart'], true);
                    if(count($orders) < 1)
                    {
                       echo "<p class=\"center-align\">Замовлення відсутні</p>";
                    }
                    else
                    {
                        foreach($orders as $order)
                        {
                            foreach($pizzas as $pizza)
                            {
                                if($order['id'] == $pizza['id'])
                                {
                                    $orderSuffix = $order['id'].'-'.$order['sz'];
            ?>
                                    <li id="li<?=$orderSuffix;?>">
                                        <div class="row">
                                            <div class="collapsible-header">
                                                <div class="col s4 truncate">
                                                    <?=$pizza['title'];?>
                                                </div>
                                                <div class="col s2">
                                                    <?php
                                                        if(isset($sizes[$order['sz']])) { echo $sizes[$order['sz']]; }
                                                    ?>
                                                </div>
                                                <div id="order-price<?=$orderSuffix;?>"class="col s2 price-tag">
                                                    <?php
                                                        if(isset($pizza[$order['sz']]))
                                                        {
                                                            echo number_format((float)($pizza[$order['sz']]*$order['q']), 2, '.', '');
                                                        }
                                                    ?>
                                                </div>
                                                <div class="col s1">
                                                    <div id="order-q-minus<?=$orderSuffix;?>" class="btn-minus prevent-collapse">
                                                        -
                                                    </div>
                                                </div>
                                                <!-- todo: make this an input field -->
                                                <p id="order-q-input<?=$orderSuffix;?>" class="col s1 center-align prevent-collapse" style="margin:0%;padding:0%;">
                                                    <?=$order['q'];?>
                                                </p>
                                                <div class="col s1">
                                                    <div id="order-q-plus<?=$orderSuffix;?>" class="btn-plus prevent-collapse">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapsible-body"><p>Інгредієнти:<br/>&nbsp&nbsp&nbsp&nbsp<?=$pizza['ingredients']?></p></div>
                                    </li>
            <?php
                                }
                            }
                        }
                    }
                }
            ?>

            <li>
                <div class="row teal lighten-4">
                    <p class="col s2 push-s4">
                            Всього:
                    </p>
                    <p id="order-total-price" class="col s2 push-s4 price-tag">
                        <?php
                            $total_price = 0.0;
                            if(isset($orders))
                            {
                                if(isset($order)) { unset($order); }
                                foreach($orders as $order)
                                {
                                    if(isset($pizza)) { unset($pizza); }
                                    foreach($pizzas as $pizza)
                                    {
                                        if($order['id'] == $pizza['id'])
                                        {
                                            if(isset($pizza[$order['sz']]))
                                            {
                                                $total_price += round($pizza[$order['sz']]*$order['q'], 2); 
                                            }
                                        }
                                    }
                                }
                            }
                            echo number_format((float)$total_price, 2, '.', ''), " грн.";
                        ?>
                    </p>

                    <a href="#" class="col offset-s4 btn brand z-depth-0" style="margin-top:1%;margin-bottom:1%;padding-left:3%;padding-right:3%">Підтвердити</a>

                </div>
            </li>
        </ul>    
    </section>


<?php require_once 'footer.php'; ?>
</body>
<?php require_once 'script.php'; ?>
</html>