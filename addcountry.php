<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add country</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <?php
    require 'connect.php';
    $swal = "";

    if (!empty($_POST['CountryCode']) && !empty($_POST['CountryName'])) {
        try {
            $sql_insert = "INSERT INTO country (CountryCode, CountryName) VALUES (:CountryCode, :CountryName)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
            $stmt->bindParam(':CountryName', $_POST['CountryName']);

            if ($stmt->execute()) {
                $swal = "Swal.fire({ icon: 'success', title: 'สำเร็จ!', text: 'เพิ่มข้อมูลประเทศเรียบร้อยแล้ว!', confirmButtonText: 'ตกลง' }).then(() => { window.location.href = 'addcountry.php'; });";
            } else {
                $swal = "Swal.fire({ icon: 'error', title: 'ล้มเหลว!', text: 'ไม่สามารถเพิ่มข้อมูลประเทศได้' });";
            }
        } catch (PDOException $e) {
            $swal = "Swal.fire({ icon: 'error', title: 'เกิดข้อผิดพลาด!', text: '" . addslashes($e->getMessage()) . "' });";
        }
    }

    $sql_list = "SELECT * FROM country ORDER BY CountryCode ASC";
    $stmt_list = $conn->prepare($sql_list);
    $stmt_list->execute();
    $country_list = $stmt_list->fetchAll();
    ?>

    <div class="container mb-5">
        <div class="row">

            <div class="col-md-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">เพิ่มข้อมูลประเทศ (Add Country)</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="addcountry.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">รหัสประเทศ (Country Code):</label>
                                <input type="text" class="form-control" placeholder="ตัวอย่างเช่น: TH, US, JP" name="CountryCode" maxlength="2" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">ชื่อประเทศ (Country Name):</label>
                                <input type="text" class="form-control" placeholder="Enter Country name" name="CountryName" required>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                            <a href="index.php" class="btn btn-secondary">กลับหน้าหลัก</a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">รายชื่อประเทศในระบบ</h4>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-hover table-bordered mb-0">
                            <thead class="table-secondary" align="center">
                                <tr>
                                    <th width="30%">รหัสประเทศ</th>
                                    <th width="70%">ชื่อประเทศ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($country_list as $c) { ?>
                                    <tr>
                                        <td align="center"><strong><?= $c['CountryCode'] ?></strong></td>
                                        <td><?= $c['CountryName'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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