
<?php
    $dbhost = '127.0.0.1';
    $dbuser = 'oxdead';
    $dbpass = '1111';
    $dbname = 'accounts';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to host: '$dbhost'");
    mysqli_select_db($conn, $dbname) or die("Could not open the database '$dbname'");
    
    if(!$conn) {  echo 'Connection error: '.mysqli_connect_error(); }
?>