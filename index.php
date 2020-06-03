<?php 
    include('config/db_connect.php'); 

    //1. wite query for all pizzas
    //$sql = 'SELECT * FROM pizzas'; // select data from all(*) columns from pizzas table
    $sql = "SELECT id, title, ingredients FROM pizzas ORDER BY created"; // select data from 3 columns from pizzas table and order them by 'created' timestamp property

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
    <!-- embed php code into html for further dynamic manipulation of page data -->
    
    <?php include('header.php'); ?>
            
    <h4 class="center grey-text">Pizzas!</h4>
    <div class='container'>
        <div class="row">
            <?php foreach($pizzas as $pizza) { ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">

                        <img src="img/pizza.svg" class="pizza_img">

                        <div class="card-content center">
                            <h6>
                                <?php 
                                    echo htmlspecialchars($pizza['title']); 
                                ?>
                            </h6>

                            <ul>
                                <?php 
                                    $ingredients_exploded = explode(',', $pizza['ingredients']);
                                    foreach($ingredients_exploded as $ingredient)
                                    {
                                ?>
                                        <li>
                                            <?php echo htmlspecialchars($ingredient); ?>
                                        </li>  

                                <?php } ?>
                            </ul>
                        </div>

                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $pizza['id'] ?>">more info</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        
        </div>
    
    </div>

    <?php include('footer.php'); ?>
</html>

