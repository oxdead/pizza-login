<?php
    session_start();
    require 'db_connect.php'; 

    $sql = "SELECT id, title, ingredients, price_small, price_medium, price_large FROM pizzas"; // select data from 3 columns from pizzas table and order them by 'created' timestamp property
    $results = mysqli_query($conn, $sql);
    $pizzas = mysqli_fetch_all($results, MYSQLI_ASSOC);
    mysqli_free_result($results);
    mysqli_close($conn);


    // // after clicking Submit button for deletion of pizza row
    // if(isset($_POST['delete']))
    // {
    //     $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    //     $sql = "DELETE FROM pizzas WHERE id = $id_to_delete"; // select data from 3 columns from pizzas table and order them by 'created' timestamp property

    //     if(mysqli_query($conn, $sql)) // success
    //     {
    //         header('Location: index.php');
    //     }
    //     else // failed
    //     {
    //         echo 'query error'.mysqli_error($conn);
    //     }
    
    //     //3. fetch the resulting rows as an associative array
    //     //$pizzas = mysqli_fetch_all($results, MYSQLI_ASSOC);
    
    //     mysqli_close($conn);
    // }



    // // check GET request id parameter
    // if(isset($_GET['id']))
    // {

    //     $id = mysqli_real_escape_string($conn, $_GET['id']); // escaping any sensitive char sequence, that user may put in location bar himself

    //     // make sql sequence
    //     $sql = "SELECT * FROM pizzas WHERE id=$id";
        
    //     // get the query results
    //     $results = mysqli_query($conn, $sql);

    //     // fetch the result in array format
    //     $pizza_row = mysqli_fetch_assoc($results);

    //     // free from memory and close connection (optional, but it's good practice to do so)
    //     mysqli_free_result($results);
    //     mysqli_close($conn);

        

    // }


?>


<!DOCTYPE html>
<html>

<?php include 'head.php'; ?>
<body onload="load()" class="grey lighten-4">

<?php include 'header.php'; ?>

    <div class="container">
        
        <ul class="collapsible">
            <?php 
                if(isset($_COOKIE['mikeypizzacart']))
                {
                    $orders = JSON_decode($_COOKIE['mikeypizzacart'], true);
                    if(count($orders) < 1)
                    {
                        echo "Замовлення відсутні";
                    }
                    else
                    {
                        foreach($orders as $order)
                        {
                            foreach($pizzas as $pizza)
                            {
                                if($pizza['id'] == $order['id'])
                                {
            ?>
                                    <li>
                                        <div class="row">
                                            <div class="collapsible-header">
                                                <div class="col s4 truncate">
                                                    <?=$pizza['title'];?>
                                                </div>
                                                <div class="col s2">
                                                    <?php
                                                        if($order['sz'] === 's') { echo "Мала"; }
                                                        else if($order['sz'] === 'm') { echo "Середня"; }
                                                        else if($order['sz'] === 'l') { echo "Велика"; }
                                                    ?>
                                                </div>
                                                <div class="col s2 price-tag">
                                                    <?php
                                                        if($order['sz'] === 's') { echo number_format((float)($pizza['price_small']*$order['q']), 2, '.', ''); }
                                                        else if($order['sz'] === 'm') { echo number_format((float)($pizza['price_medium']*$order['q']), 2, '.', ''); }
                                                        else if($order['sz'] === 'l') { echo number_format((float)($pizza['price_large']*$order['q']), 2, '.', ''); }
                                                    ?>
                                                </div>
                                                <div class="col s1">
                                                    <div class="btn-minus">
                                                        -
                                                    </div>
                                                </div>
                                                <!-- todo: make this an input field -->
                                                <p class="col s1 center-align" style="margin:0%;padding:0%;">
                                                    <?=$order['q'];?>
                                                </p>
                                                <div class="col s1">
                                                    <div class="btn-plus">
                                                        +
                                                    </div>
                                                </div>
                                                                        
                                                    
                                            </div>
                                        </div>
                                        <div class="collapsible-body"><p><?=$pizza['ingredients']?></p></div>
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
                    <p class="col s2 push-s4 price-tag">
                        <?php
                            $total_price = 0.0;
                            if(isset($orders))
                            {
                                if(isset($order)) { unset($order); }
                                foreach($orders as $order)
                                {
                                    if($order['sz'] === 's') 
                                    { 
                                        if(isset($pizza)) { unset($pizza); }
                                        foreach($pizzas as $pizza)
                                        {
                                            if($pizza['id'] == $order['id'])
                                            {
                                                $total_price += round($pizza['price_small'], 2); 
                                            }
                                        }
                                    }
                                    else if($order['sz'] === 'm') 
                                    { 
                                        if(isset($pizza)) { unset($pizza); }
                                        foreach($pizzas as $pizza)
                                        {
                                            if($pizza['id'] == $order['id'])
                                            {
                                                $total_price += round($pizza['price_medium'], 2); 
                                            }
                                        }
                                    }
                                    else if($order['sz'] === 'l') 
                                    { 
                                        if(isset($pizza)) { unset($pizza); }
                                        foreach($pizzas as $pizza)
                                        {
                                            if($pizza['id'] == $order['id'])
                                            {
                                                $total_price += round($pizza['price_large'], 2); 
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
        



    </div>


    <?php include 'footer.php'; ?>
</body>
<?php include 'script.php'; ?>
</html>