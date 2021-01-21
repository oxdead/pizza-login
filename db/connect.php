<?php
    require_once __DIR__.'/../.secret.php';

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Unable to connect to host: '".DB_HOST."'");
    mysqli_select_db($conn, DB_DB) or die("Could not open the database '".DB_DB."'");
    
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