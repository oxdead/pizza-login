<?php
    session_start();
    require 'db_connect.php'; 

    //after clicking Submit button for deletion of pizza row
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



    // check GET request id parameter
    if(isset($_GET['id']))
    {

        $id = mysqli_real_escape_string($conn, $_GET['id']); // escaping any sensitive char sequence, that user may put in location bar himself

        // make sql sequence
        $sql = "SELECT * FROM pizzas WHERE id=$id";
        
        // get the query results
        $results = mysqli_query($conn, $sql);

        // fetch the result in array format
        $pizza_row = mysqli_fetch_assoc($results);

        // free from memory and close connection (optional, but it's good practice to do so)
        mysqli_free_result($results);
        mysqli_close($conn);

        

    }


?>


<!DOCTYPE html>
<html>

<?php include 'head.php'; ?>
<body onload="load()" class="grey lighten-4">

<?php include 'header.php'; ?>

    <div class="container center grey-text text-darken-2">
        <?php if($pizza_row) { ?> <!-- ':' is alternative syntax for '{' -->
        
            <h4> <?php echo htmlspecialchars($pizza_row['title']); ?> </h4>

            <h4>Інгредієнти:<br/> <?= htmlspecialchars($pizza_row['ingredients']); ?> </h4>
            
            <p> Create by: <?php echo htmlspecialchars($pizza_row['email']); ?> </p>
            <p> <?php echo date(htmlspecialchars($pizza_row['created'])); ?> </p>

            <!-- delete pizza row -->
            <!-- <form action="details.php" method="POST">
                <input type='hidden' name="id_to_delete" value="<?php echo $pizza_row['id']; ?>">
                <input type='submit' name="delete" value="Delete" class="btn brand z-depth-0">
            </form> -->

        <?php } else { ?> <!-- 'else:' is alternative syntax for '} else {' -->
            <p> No such pizza exists! </p>
        <?php } ?> <!-- 'endif' is alternative syntax for '}' -->


    </div>

    <?php include 'footer.php'; ?>
</body>
<?php include 'script.php'; ?>
</html>