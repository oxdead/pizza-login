<?php
    session_start();
    include('db_connect.php'); 

    // isset listens for GET request from web-browser, _GET is a global array, which contains our data
    // if(isset($_GET['submit']))
    // {
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    $email = $title = $ingrediens = ''; // to prevent from undefined error on loading page
    $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');
    

    // POST is more secure, because it's not shown data in url bar
    if(isset($_POST['submit']))
    {

        
        // tutorial #19. Form validation
        //tutorial #18. htmlspecialchars for protecting from XSS attack, injecting javascript code into field
        //check email
        if(empty($_POST['email']))
        {
            $errors['email'] = 'email is required<br/>';
        }
        else
        {
            $email = htmlspecialchars($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $errors['email'] = 'email entered is not valid<br/>';
            }
        }

        if(empty($_POST['title']))
        {
            $errors['title'] = 'title is required<br/>';
        }
        else
        {
            $title = htmlspecialchars($_POST['title']);
            if(!preg_match('/^[a-zA-Z\s]+$/', $title))
            {
                $errors['title'] = 'title must be letters and spaces<br/>';
            }
        }

        if(empty($_POST['ingredients']))
        {
            $errors['ingredients'] = 'at least one ingredient is required<br/>';
        }
        else
        {
            $ingredients = htmlspecialchars($_POST['ingredients']);
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients))
            {
                $errors['ingredients'] = 'title must be letters and spaces, ingredients must be comma separated (example...)<br/>';
            }
        }



        // check if any errors axist, empty or evaluate to false in loose comparison
        if(array_filter($errors))
        {
            //echo 'there are errors in the form';
            // pass further without doing anything, sp user could correct a mistake
        }
        else // save input data for new pizza to database and return to main page
        {
            //echo 'form is valid';

            // clear from any possible malicious code going into database
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            // create sql command
            $sql = "INSERT INTO pizzas(email,title,ingredients) VALUES('$email', '$title', '$ingredients')";

            //save data to database and check
            if(mysqli_query($conn, $sql))
            {
                // go back to main page on success
                header('Location: index.php');
            }
            else
            {
                echo 'query error: '.mysqli_error($conn);
            }
        }



    } // the end of POST check


    mysqli_close($conn);


?>


<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<section class="container grey-text">
    <h4 class="center">
        Add a Pizza
    </h4>
    <form class="white" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        
        <input type="text" name="email" id="email_id" value="<?php echo empty($email) ? '' : htmlspecialchars($email); ?>"> <!-- persist inputed data-->
        <label for="email_id">Your Email</label>
        <div class="red-text">
            <?php echo $errors['email']; ?>
        </div>
        
        <input type="text" name="title" id="title_id" value="<?php echo empty($title) ? '' : htmlspecialchars($title); ?>">
        <label for="title_id">Pizza title</label>
        <div class="red-text">
            <?php echo $errors['title']; ?>
        </div>
        
        <input type="text" name="ingredients" id="ingredients_id" value="<?php echo empty($ingredients) ? '' : htmlspecialchars($ingredients); ?>">
        <label for="ingredients_id">Ingredients(comma separated)</label>
        <div class="red-text">
            <?php echo $errors['ingredients']; ?>
        </div>
        
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>

</section>
            
<?php include('footer.php'); ?>
</html>

