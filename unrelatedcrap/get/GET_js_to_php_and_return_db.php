<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

require_once __DIR__.'/../../.secret.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, 'accounts');
$stmt = $conn->prepare("SELECT * FROM users LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>