<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>I Don't Like 67</title>
</head>


<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12"> <br>
                <h3>รายชื่อลูกค้า</h3>

                <div class="card shadow-sm mt-3 border-0">
                    <div class="card-body p-0">
                        <table class="table table-striped table-hover table-responsive table-bordered mb-0">
                            <thead class="table-dark" align="center">
                                <tr>
                                    <th width="10%">รหัสลูกค้า</th>
                                    <th width="20%">ชื่อ-นามสกุล</th>
                                    <th width="20%">วันเดือนปีเกิด</th>
                                    <th width="25%">อีเมล์</th>
                                    <th width="10%">ประเทศ</th>
                                    <th width="10%">ยอดหนี้</th>
                                    <th width="5%">แก้ไข</th>
                                    <th width="5%">ลบ</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                require 'connect.php';
                                $sql = "SELECT * FROM customer, country WHERE customer.CountryCode = country.CountryCode ORDER BY CustomerID";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach ($result as $r) { ?>
                                    <tr>
                                        <td align="center"><?= $r['CustomerID'] ?></td>
                                        <td><?= $r['Name'] ?></td>
                                        <td><?= $r['Birthdate'] ?></td>
                                        <td><?= $r['Email'] ?></td>
                                        <td align="center"><?= $r['CountryName'] ?></td>
                                        <td align="right"><?= number_format($r['OutstandingDebt'], 2) ?></td>
                                        <td align="center"><a href="updateCustomerForm.php?CustomerID=<?= $r['CustomerID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>

                                        <td align="center">
                                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="<?= $r['CustomerID'] ?>">ลบ</button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                let customerId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'คุณแน่ใจหรือไม่?',
                    text: "ต้องการลบข้อมูลลูกค้า รหัส " + customerId + " ใช่ไหม? (ข้อมูลที่ลบแล้วไม่สามารถกู้คืนได้)",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'ใช่, ลบเลย!',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'deleteCustomer.php?CustomerID=' + customerId;
                    }
                })
            });
        });
    </script>
</body>

</html>