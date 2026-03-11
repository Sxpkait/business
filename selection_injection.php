<?php
require "connect.php";

if (isset($_GET["CustomerID"])) {
    $strCustomID = $_GET["CustomerID"];
    echo "<br>" . "strCustomerID = " . $strCustomID;
    $sql = "SELECT * FROM customer where CustomerID = '" . $strCustomID . "'";
    echo "<br>" . " sql = " . $sql . "<br>";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll();

    print_r($result);
}
