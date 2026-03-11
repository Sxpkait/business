<?php
require 'connect.php';

$sql = 'SELECT * FROM customer';
$stmt = $conn->prepare($sql);
$stmt->execute();
echo '<br/>';
$result = $stmt->fetchAll();

foreach ($result as $r) {

    print $r['CustomerID'] . '--' . $r['Name'] . '--' . $r['OutstandingDebt'] . '--' . $r['CountryCode'] . '<br>';
}
