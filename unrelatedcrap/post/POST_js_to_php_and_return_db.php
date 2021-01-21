<?php
header("Content-Type: application/json; charset=UTF-8");

function msgboxJS($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}


$obj = json_decode($_POST["x"], false);

//echo (isset($_GET["x"]) ? "GET set" : "get NO");
//echo isset($_POST["x"]) ? "POST set".PHP_EOL : "post NO";


require_once __DIR__.'/../../.pw.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, 'accounts');
$stmt = $conn->prepare("SELECT * FROM users LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);


?>