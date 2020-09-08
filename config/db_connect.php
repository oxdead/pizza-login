
<?php
    //MySQLi or PDO approaches exist for now wewill use MySQLi, but experineced user should learn PDO

    $dbhost = 'eporqep6b4b8ql12.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306';
    $dbuser = 'crjbrew5zx2e5ofj';
    $dbpass = 'tff3cduhu03wgx8k';
    $dbname = 'j7pi3mr52z5cw6c7';

    //$dburl = getenv('JAWSDB_URL');
    //$dbparts = parse_url($dburl);
    
    //$dbhost = $dbparts['host'];
    //$dbuser = $dbparts['user'];
    //$dbpass = $dbparts['pass'];
    //$dbname = ltrim($dbparts['path'],'/');
    


    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'");
    mysqli_select_db($conn, $dbname) or die("Could not open the database '$dbname'");

    // create connection
    //$conn = mysqli_connect('localhost', 'ole', '1111', 'pd');

    //check connection
    if(!$conn) {  echo 'Connection error: '.mysqli_connect_error(); }

?>