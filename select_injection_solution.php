<?php
require "connect.php";

if (isset($_GET["CustomerID"])) {
    $cid = $_GET["CustomerID"];

    $sql = "SELECT customer.CustomerID, customer.Name, customer.Email, customer.OutstandingDebt, country.CountryName 
            FROM customer 
            INNER JOIN country ON customer.CountryCode = country.CountryCode 
            WHERE customer.CustomerID = :customerID";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':customerID', $cid);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        echo "<br><br>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";

        echo "<tr>
                <th>รหัสลูกค้า</th>
                <th>ชื่อ-นามสกุล</th>
                <th>อีเมล</th>
                <th>ประเทศ</th>
                <th>ยอดหนี้ค้างชำระ (บาท)</th>
              </tr>";

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['CustomerID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['CountryName'] . "</td>";
            echo "<td>" . number_format($row['OutstandingDebt'], 2) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<br><br>ไม่พบข้อมูลของลูกค้ารหัส: " . htmlspecialchars($cid);
    }
} else {
    echo "<br>กรุณาระบุ CustomerID ใน URL (เช่น ?CustomerID=Cus001)";
}

$conn = null;
