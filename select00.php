<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Information</title>
</head>
<body>

<?php
require "connect.php";

$sql = "SELECT customer.*, country.CountryName 
        FROM customer 
        JOIN country ON customer.CountryCode = country.CountryCode";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="800" border="1">
    <tr>
        <th width="90">
            <div align="center">Customer ID</div>
        </th>
        <th width="140">
            <div align="center">Name</div>
        </th>
        <th width="120">
            <div align="center">Birthdate</div>
        </th>
        <th width="100">
            <div align="center">Email</div>
        </th>
        <th width="50">
            <div align="center">Country</div>
        </th>
        <th width="70">
            <div align="center">Outstanding Debt</div>
        </th>
    </tr>

    <?php

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>

        <tr>
            <td>
                <div align="center">
                    <a href="detail.php?CustomerID=<?php echo $result['CustomerID']; ?>">
                        <?php echo $result["CustomerID"]; ?>
                    </a>
                </div>
            </td>
            <td>
                <?php echo $result["Name"]; ?>
            </td>
            <td>
                <div align="center"><?php echo $result["Birthdate"]; ?></div>
            </td>
            <td>
                <?php echo $result["Email"]; ?>
            </td>
            <td>
                <div align="center"><?php echo $result["CountryName"]; ?></div>
            </td>
            <td>
                <div align="right"><?php echo $result["OutstandingDebt"]; ?></div>
            </td>
        </tr>

    <?php
    }
    ?>

</table>

</body>
</html>