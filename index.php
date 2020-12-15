<?php 
    session_start();
    include('db_connect.php'); 
    

#todo:
#clear session message 
#how to use a cookie to set mail automatically, when entering input field



    $sql = "CREATE DATABASE accounts";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Database created successfully";
        $sql = "CREATE TABLE `accounts`.`users` ( `id` INT NOT NULL AUTO_INCREMENT, `first_name` VARCHAR(50) NOT NULL, `last_name` VARCHAR(50) NOT NULL, `email` VARCHAR(100) NOT NULL, `password` VARCHAR(100) NOT NULL, `hash` VARCHAR(32) NOT NULL, `active` BOOL NOT NULL DEFAULT 0, PRIMARY KEY (`id`) )";
        if ($conn->query($sql) === TRUE) 
        {
            echo "Table created successfully";
        }
        else
        {
            echo "Error creating table: " . $conn->error;    
        }
    } 
    else 
    {
        echo "Error creating database: " . $conn->error;
    }



    /*
    //1. wite query for all pizzas
    //$sql = 'SELECT * FROM pizzas'; // select data from all(*) columns from pizzas table
    //$sql = "SELECT id, title, ingredients FROM pizzas ORDER BY created"; // select data from 3 columns from pizzas table and order them by 'created' timestamp property

    // create feed line for sql
    $sql = "SHOW DATABASES";
    
    //2. send query and get some results
    $results = mysqli_query($conn, $sql);
    
    //3. fetch the resulting rows as an associative array
    $show_dbs = mysqli_fetch_all($results, MYSQLI_ASSOC);
    $exists_db = FALSE;

    print_r($show_dbs);
    */


    foreach($show_dbs as $db)
    {
        foreach($db as $temp_dbname)
        {
            if($temp_dbname === "accounts")
            {
                $exists_db = TRUE;
            }
        }
    }

    if($exists_db !== TRUE)
    {
        $sql = "CREATE DATABASE accounts";
        if ($conn->query($sql) === TRUE) 
        {
            echo "Database is created successfully";
            $sql = "CREATE TABLE `accounts`.`users` ( `id` INT NOT NULL AUTO_INCREMENT, `first_name` VARCHAR(50) NOT NULL, `last_name` VARCHAR(50) NOT NULL, `email` VARCHAR(100) NOT NULL, `password` VARCHAR(100) NOT NULL, `hash` VARCHAR(32) NOT NULL, `active` BOOL NOT NULL DEFAULT 0, PRIMARY KEY (`id`) )";
            if ($conn->query($sql) === TRUE) 
            {
                echo "Table is created successfully";
            }
            else
            {
                echo "Error creating table: " . $conn->error;    
            }
        } 
        else 
        {
            echo "Error creating database: " . $conn->error;
        }
    }


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
        <ul>
            <li> <a href="add.php" class="btn brand z-depth-0">Add a pizza</a> </li>
        </ul>


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

