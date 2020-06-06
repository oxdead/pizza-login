<?php 

    // cookie
    $gender = $_COOKIE['gender'] ?? 'unknown';



    // session
    session_start();

    // foreach($_SERVER as $key => $value)
    // {
    //     echo "$key = ".$value."<br />";
    // }
    

    $locationbar_str = htmlspecialchars($_SERVER['QUERY_STRING']);
    $session_name = htmlspecialchars($_SESSION['name']);
    if(strlen($locationbar_str) > 0 || strlen($session_name) > 0)
    {
        echo "<br />".($_SERVER['REQUEST_METHOD'])."<br />locationbar_str= $locationbar_str<br />session = $session_name<br />";
    }

    if(strpos($locationbar_str, 'name=Guest') !== false) // if in input in tutorial.php was not submitted and string in location bar contains Guest, then unset name and create name "Guest", usage of !== is important as return maybe 0(int) or false
    {
        unset($_SESSION['name']); // delete session name
        //session_unset(); // wull clear all?
    }
    elseif($locationbar_str === 'name=' && strlen($locationbar_str) == 5) // if in input in tutorial.php was not submitted and string in location bar doesn't contain noname, then unset name and create name "Guest"
    {
        unset($_SESSION['name']); // delete session name
    }

    //echo ((isset($_SESSION['name'])) ? "ISSET=TRUE<br />" : "ISSET=FALSE<br />");
    //unset($_SESSION['name']);
    //echo ((isset($_SESSION['name'])) ? "ISSET=TRUE<br />" : "ISSET=FALSE<br />");

    //$name = (isset($_SESSION['name'])) ? (", ".($_SESSION['name'])) : ", Guest";
    $name = ", ";
    $name .= $_SESSION['name'] ?? 'Guest';
    

    


?>


<head>
    <title> Pizza, dude!</title>
    <!-- compiled and minimized CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }

        .pizza_img{
            width: 100px;
            margin: 40px auto -30px; /*40px at top, auto left and right and -30px at bottom*/
            display: block;
            position: relative;
            top: -30px;
        }        

    </style>
</head>

<!--open boy here and close in the footer.php-->
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Pizza, dude!</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text">


                    Hello<?php echo htmlspecialchars($name); ?>

                    
                </li>
                <li class=grey-text>
                    (<?php echo htmlspecialchars($gender); ?>)
                </li>
                <li>
                    <a href="add.php" class="btn brand z-depth-0">Add a pizza</a>
                </li>


            </ul>
        </div>
    
    </nav>