
<?php
    //MySQLi or PDO approaches exist for now wewill use MySQLi, but experineced user should learn PDO

    $dbhost = 'f80b6byii2vwv8cx.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306';
    $dbuser = 'a58qtnfe0nj4m8ru';
    $dbpass = 'a8f513huzrcyztck';
    $dbname = 'kp5h26uxj4asym5b';

    //$dburl = getenv('JAWSDB_URL');
    //$dbparts = parse_url($dburl);
    //$dbhost = $dbparts['host'];
    //$dbuser = $dbparts['user'];
    //$dbpass = $dbparts['pass'];
    //$dbname = ltrim($dbparts['path'],'/');
    
    // $dbhost = '127.0.0.1';
    // $dbuser = 'oxdead';
    // $dbpass = '1111';
    // $dbname = 'accounts';



    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to host: '$dbhost'");
    mysqli_select_db($conn, $dbname) or die("Could not open the database '$dbname'");

    // create connection
    //$conn = mysqli_connect('localhost', 'ole', '1111', 'pd');

    //check connection
    if(!$conn) {  echo 'Connection error: '.mysqli_connect_error(); }

?>