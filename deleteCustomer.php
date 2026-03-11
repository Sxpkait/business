<?php
require 'connect.php';

$status = "";
$message = "";


if (isset($_GET['CustomerID'])) {
    $customerID = $_GET['CustomerID'];

    try {
        $sql = "DELETE FROM customer WHERE CustomerID = :CustomerID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':CustomerID', $customerID);

        if ($stmt->execute()) {
            $status = "success";
            $message = "ลบข้อมูลลูกค้า รหัส $customerID สำเร็จเรียบร้อย!";
        } else {
            $status = "error";
            $message = "เกิดข้อผิดพลาด! ไม่สามารถลบข้อมูลได้";
        }
    } catch (PDOException $e) {
        $status = "error";
        $message = "Database Error: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <script>
        Swal.fire({
            title: '<?= $status == "success" ? "สำเร็จ!" : "ผิดพลาด!" ?>',
            text: '<?= $message ?>',
            icon: '<?= $status ?>',
            confirmButtonText: 'ตกลง',
            confirmButtonColor: '#0d6efd'
        }).then((result) => {
            window.location.href = 'index.php';
        });
    </script>

</body>

</html>