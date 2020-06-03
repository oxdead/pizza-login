
<?php
    //MySQLi or PDO approaches exist for now wewill use MySQLi, but experineced user should learn PDO

    // create connection
    $conn = mysqli_connect('localhost', 'ole', '1111', 'pd');

    //check connection
    if(!$conn) {  echo 'Connection error: '.mysqli_connect_error(); }

?>