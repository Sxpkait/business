<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-dark bg-dark mb-4 shadow-sm">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand fw-bold" href="index.php">ระบบจัดการข้อมูล</a>
    </div>
</nav>

<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header border-bottom border-secondary">
        <h5 class="offcanvas-title fw-bold" id="sidebarMenuLabel">เมนูหลัก (Menu)</h5>
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column mt-3">
            <li class="nav-item mb-3">
                <a class="nav-link h5 <?= ($current_page == 'index.php') ? 'text-warning fw-bold' : 'text-white' ?>" href="index.php">
                    🏠 หน้าหลัก (รายชื่อลูกค้า)
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link h5 <?= ($current_page == 'addcustomer.php') ? 'text-warning fw-bold' : 'text-white' ?>" href="addcustomer.php">
                    👤 เพิ่มข้อมูลลูกค้า
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link h5 <?= ($current_page == 'addcountry.php') ? 'text-warning fw-bold' : 'text-white' ?>" href="addcountry.php">
                    🌍 เพิ่มข้อมูลประเทศ
                </a>
            </li>
        </ul>
    </div>
</div>