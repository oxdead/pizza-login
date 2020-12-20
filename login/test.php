
<!DOCTYPE html> 
<html> 
  
<head> 
    <!--Import Google Icon Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"> 
  
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
  
    <!-- Let the browser know that the website is optimized for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
</head> 
  
<body> 
    <h4>Dropdown in Materialize:</h4> 
    <!-- Dropdown Trigger -->
    <h5>
        <a class='dropdown-button btn green' href='#' data-activates='dropdown1'>Drop Me!
            <i class="large material-icons">arrow_drop_down</i> 
        </a> 
    </h5> 
  
    <!-- Dropdown Structure -->
    <ul id='dropdown1' class='dropdown-content'> 
  
        <!-- Define the links in the dropdown -->
        <li> 
            <a href="https://www.geeksforgeeks.org/materialize-css-collections/?ref=rp">Collections</a> 
        </li> 
        <li> 
            <a href="https://www.geeksforgeeks.org/materialize-css-icons/?ref=rp">Icons</a> 
        </li> 
  
        <!-- Define a divider -->
        <li class="divider"></li> 
        <li><a href="#!">Table</a></li> 
  
        <!-- Define a list item with an icon -->
        <li> 
            <a href="#!"> 
                <i class="material-icons"> 
                    view_module 
                </i> 
                Home 
            </a> 
        </li> 
    </ul> 
  
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script> 
</body> 
  
</html> 
