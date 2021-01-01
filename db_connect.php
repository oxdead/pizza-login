<?php
    $dbhost = '127.0.0.1';
    $dbuser = 'oxdead';
    $dbpass = '1111';
    $dbname = '3664109_mkpz';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to host: '$dbhost'");
    mysqli_select_db($conn, $dbname) or die("Could not open the database '$dbname'");
    
    if(!$conn) {  echo 'Connection error: '.mysqli_connect_error(); }
    mysqli_query($conn,"SET NAMES UTF8");
 
    function fetchDB($resultDB)
    {
        $arr_assoc = [];
        while($row = mysqli_fetch_array($resultDB, MYSQLI_ASSOC))
        {
            $arr_assoc[] = $row;
        }
        return $arr_assoc;
    }
?>