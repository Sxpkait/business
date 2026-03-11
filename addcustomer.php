<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <?php
    require 'connect.php';
    $swal = "";

    // ดึงข้อมูลประเทศ
    try {
        $sql_country = "SELECT CountryCode, CountryName FROM country";
        $stmt_country = $conn->prepare($sql_country);
        $stmt_country->execute();
        $countries = $stmt_country->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching countries: " . $e->getMessage();
    }

    // ประมวลผลเพิ่มลูกค้า
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['customerID'])) {
        try {
            $sql = "INSERT INTO customer (CustomerID, Name, Birthdate, Email, CountryCode, OutstandingDebt) 
                    VALUES (:customerID, :Name, :birthdate, :email, :countryCode, :outstandingDebt)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':customerID', $_POST['customerID']);
            $stmt->bindParam(':Name', $_POST['Name']);
            $stmt->bindParam(':birthdate', $_POST['birthdate']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':countryCode', $_POST['countryCode']);
            $stmt->bindParam(':outstandingDebt', $_POST['outstandingDebt']);

            if ($stmt->execute()) {
                $swal = "Swal.fire({ icon: 'success', title: 'สำเร็จ!', text: 'เพิ่มข้อมูลลูกค้าเรียบร้อยแล้ว!', confirmButtonText: 'ตกลง' }).then(() => { window.location.href = 'index.php'; });";
            } else {
                $swal = "Swal.fire({ icon: 'error', title: 'ล้มเหลว!', text: 'ไม่สามารถเพิ่มข้อมูลได้' });";
            }
        } catch (PDOException $e) {
            $swal = "Swal.fire({ icon: 'error', title: 'เกิดข้อผิดพลาด!', text: '" . addslashes($e->getMessage()) . "' });";
        }
    }
    ?>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">เพิ่มข้อมูลลูกค้า (Add Customer)</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="addcustomer.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">รหัสลูกค้า:</label>
                                <input type="text" class="form-control" placeholder="Enter Customer ID" name="customerID" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">ชื่อ-นามสกุล:</label>
                                <input type="text" class="form-control" placeholder="Name" name="Name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">วันเดือนปีเกิด:</label>
                                <input type="date" class="form-control" name="birthdate" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">อีเมล:</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">ประเทศ:</label>
                                <select class="form-select" name="countryCode" required>
                                    <option value="">-- เลือกประเทศ --</option>
                                    <?php foreach ($countries as $country) { ?>
                                        <option value="<?php echo $country['CountryCode']; ?>">
                                            <?php echo $country['CountryName'] . " (" . $country['CountryCode'] . ")"; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">ยอดหนี้ (Outstanding Debt):</label>
                                <input type="number" class="form-control" placeholder="0.00" name="outstandingDebt" step="0.01">
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                            <a href="index.php" class="btn btn-secondary">ย้อนกลับ</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if ($swal !== "") echo "<script>$swal</script>"; ?>
</body>


</html>