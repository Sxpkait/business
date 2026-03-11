<html> <head>
<title> Display Selected Customer Information 65</title>
</head>
<body>

<?php
    // รับค่ารหัสลูกค้าที่ส่งมาทาง URL (Method GET)
    if (isset($_GET["CustomerID"])) 
    {
        $strCustomerID = $_GET["CustomerID"];
    }
    echo "กำลังค้นหารหัสลูกค้า: " . $strCustomerID . "<br><br>";

    require "connect.php";
    
    // 1. ปรับคำสั่ง SQL ให้ทำการเชื่อม (JOIN) ตาราง country และค้นหาตามรหัส CustomerID
    $sql = "SELECT customer.*, country.CountryName 
            FROM customer 
            JOIN country ON customer.CountryCode = country.CountryCode 
            WHERE customer.CustomerID = ?";
            
    $params = array($strCustomerID);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<table width="300" border="1">
  <tr>
    <th width="325">รหัสลูกค้าสมาชิก</th>
    <td width="240"><?php echo $result["CustomerID"]; ?></td>
  </tr>

  <tr>
    <th width="130">ชื่อ</th>
    <td><?php echo $result["Name"]; ?></td>
  </tr>
  <tr>
    <th width="130">BirthDate</th>
    <td><?php echo $result["Birthdate"]; ?></td>
  </tr>

  <tr>
    <th width="130">Email</th>
    <td><?php echo $result["Email"]; ?></td>
  </tr>

  <tr>
    <th width="130">Country Name</th>
    <td><?php echo $result["CountryName"]; ?></td>
  </tr>
  
  <tr>
    <th width="130">OutstandingDebt</th>
    <td><?php echo $result["OutstandingDebt"]; ?></td>
    </tr>
  </table>
  
<?php
$conn = null;
?>
</body>
</html>