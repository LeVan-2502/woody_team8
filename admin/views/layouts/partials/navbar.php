<?php
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
}
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light navbar-fixed">
    <!-- Left navbar links -->
    <div class="navbar-container">
        <ul class="navbar-nav navbar-left">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= BASE_URL ?>" class="nav-link">Website-Woody</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <div class="info">
                    <span>Xin chào, <strong class="d-block"><?= $admin['ho_ten'] ?></Strong></span>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="" data-toggle="dropdown" href="#">
                    <img src="<?= BASE_URL ?><?= $admin['anh_dai_dien'] ?>" class="img-circle elevation-2 user-image" alt="User Image">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="<?= BASE_URL_ADMIN ?>?act=chitiet-quantrivien" class="dropdown-item">
                        <label for="">Xem profile</label>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= BASE_URL_ADMIN ?>?act=dangxuat"  class="dropdown-item">
                        <label for="">Đăng xuất</label>
                    </a>

                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="navbar-placeholder"></div>

