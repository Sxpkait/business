<?php
require "connect.php";

$sql = "SELECT * FROM customer";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

print_r($result);
