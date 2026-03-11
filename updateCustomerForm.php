<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Customer</title>
</head>

<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <?php
    require 'connect.php';
    $swal = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $sql_update = "UPDATE customer SET Name = :Name, Birthdate = :Birthdate, Email = :Email, CountryCode = :CountryCode, OutstandingDebt = :OutstandingDebt WHERE CustomerID = :CustomerID";
            $stmt_update = $conn->prepare($sql_update);

            $stmt_update->bindParam(':CustomerID', $_POST['customerID']);
            $stmt_update->bindParam(':Name', $_POST['Name']);
            $stmt_update->bindParam(':Birthdate', $_POST['birthdate']);
            $stmt_update->bindParam(':Email', $_POST['email']);
            $stmt_update->bindParam(':CountryCode', $_POST['countryCode']);
            $stmt_update->bindParam(':OutstandingDebt', $_POST['outstandingDebt']);

            if ($stmt_update->execute()) {
                $swal = "Swal.fire({ icon: 'success', title: 'สำเร็จ!', text: 'อัปเดตข้อมูลสำเร็จเรียบร้อย!', confirmButtonText: 'ตกลง' }).then(() => { window.location.href = 'index.php'; });";
            } else {
                $swal = "Swal.fire({ icon: 'error', title: 'ล้มเหลว!', text: 'เกิดข้อผิดพลาดในการอัปเดตข้อมูล' });";
            }
        } catch (PDOException $e) {
            $swal = "Swal.fire({ icon: 'error', title: 'เกิดข้อผิดพลาด!', text: '" . addslashes($e->getMessage()) . "' });";
        }
    }
    ?>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php

                if (isset($_GET['CustomerID'])) {
                    $customerID = $_GET['CustomerID'];
                    try {
                        $sql_select = "SELECT * FROM customer WHERE CustomerID = :CustomerID";
                        $stmt = $conn->prepare($sql_select);
                        $stmt->bindParam(':CustomerID', $customerID);
                        $stmt->execute();
                        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

                        if (!$customer) {
                            echo '<div class="alert alert-warning">ไม่พบข้อมูลลูกค้าที่ต้องการแก้ไข</div>';
                            exit;
                        }

                        $sql_country = "SELECT CountryCode, CountryName FROM country";
                        $stmt_country = $conn->prepare($sql_country);
                        $stmt_country->execute();
                        $countries = $stmt_country->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                ?>


                    <div class="card shadow-sm">
                        <div class="card-header bg-warning text-dark">
                            <h4 class="mb-0">แก้ไขข้อมูลลูกค้า</h4>
                        </div>
                        <div class="card-body p-4">
                            <form action="updateCustomerForm.php?CustomerID=<?= $customer['CustomerID'] ?>" method="POST">
                                <input type="hidden" name="customerID" value="<?= $customer['CustomerID'] ?>">

                                <div class="mb-3">
                                    <label class="form-label">รหัสลูกค้า:</label>
                                    <input type="text" class="form-control" value="<?= $customer['CustomerID'] ?>" disabled>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">ชื่อ-นามสกุล:</label>
                                    <input type="text" class="form-control" name="Name" value="<?= $customer['Name'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">วันเดือนปีเกิด:</label>
                                    <input type="date" class="form-control" name="birthdate" value="<?= $customer['Birthdate'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">อีเมล:</label>
                                    <input type="email" class="form-control" name="email" value="<?= $customer['Email'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">ประเทศ:</label>
                                    <select name="countryCode" class="form-select" required>
                                        <option value="">-- เลือกประเทศ --</option>
                                        <?php foreach ($countries as $country) {
                                            $selected = ($country['CountryCode'] == $customer['CountryCode']) ? 'selected' : '';
                                            echo '<option value="' . $country['CountryCode'] . '" ' . $selected . '>' . $country['CountryName'] . ' (' . $country['CountryCode'] . ')</option>';
                                        } ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">ยอดหนี้:</label>
                                    <input type="number" class="form-control" name="outstandingDebt" value="<?= $customer['OutstandingDebt'] ?>" step="0.01">
                                </div>

                                <hr>
                                <button type="submit" class="btn btn-primary">บันทึกการแก้ไข (Update)</button>
                                <a href="index.php" class="btn btn-secondary">ยกเลิก (Cancel)</a>
                            </form>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if ($swal !== "") echo "<script>$swal</script>"; ?>
</body>

</html>