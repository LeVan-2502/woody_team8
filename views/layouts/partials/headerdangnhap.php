<style>
    #site-header {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Tạo shadow bên dưới header */
    position: relative; /* Đảm bảo header ở vị trí tương đối */
}
</style>
<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} ?>
<header id="site-header" class="site-header header-v1 relative">
    <div class="header-mobile">
        <div class="section-padding">
            <div class="section-container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-left">
                        <div class="navbar-header">
                            <button type="button" id="show-megamenu" class="navbar-toggle"></button>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 header-center">
                        <div class="site-logo">
                            <a href="index5.html">
                                <img width="400" height="79" src="<?= BASE_URL ?>assets/ruper/media/logo.png" alt="Ruper – Furniture HTML Theme" />
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-right">
                        <div class="ruper-topcart dropdown">
                            <div class="dropdown mini-cart top-cart">
                                <div class="remove-cart-shadow"></div>
                                <a class="dropdown-toggle cart-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- <div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">2</span></div> -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-mobile-fixed">
            <!-- Shop -->
            <div class="shop-page">
                <a href="shop-grid-left.html"><i class="wpb-icon-shop"></i></a>
            </div>

            <!-- Login -->
            <div class="my-account">
                <div class="login-header">
                    <a href="page-my-account.html"><i class="wpb-icon-user"></i></a>
                </div>
            </div>

            <!-- Search -->
            <div class="search-box">
                <div class="search-toggle"><i class="wpb-icon-magnifying-glass"></i></div>
            </div>

            <!-- Wishlist -->
            <div class="wishlist-box">
                <a href="shop-wishlist.html"><i class="wpb-icon-heart"></i></a>
            </div>
        </div>
    </div>

    <div class="header-desktop">
        <div class="header-wrapper">
            <div class="section-padding">
                <div class="section-container ">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 col-md-12 col-sm-12 col-12 header-left">
                            <div class="site-logo">
                                <a href="<?=BASE_URL?>">
                                    <h1 class="fw-bold fs-1"><strong style="color: gray;">WOODY</strong></h1>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 text-center header-center">
                            <div class="site-navigation">
                                <nav id="main-navigation">
                                    <ul id="menu-main-menu" class="menu">
                                        <li class="level-0 menu-item  mega-menu current-menu-item">
                                            <a href="<?= BASE_URL ?>"><span class="menu-item-text">Trang chủ</span></a>

                                        </li>
                                        <li class="level-0 menu-item menu-item-has-children">
                                            <a href="<?= BASE_URL ?>?act=listsanpham"><span class="menu-item-text">Xem sản phẩm</span></a>
                                            <!-- <ul class="sub-menu">

                                                <li>
                                                    <a href="shop-details.html"><span class="menu-item-text">Nội thất phòng khách</span></a>
                                                </li>
                                                <li>
                                                    <a href="shop-cart.html"><span class="menu-item-text">Nội thất phòng ngủ</span></a>
                                                </li>
                                                <li>
                                                    <a href="shop-checkout.html"><span class="menu-item-text">Nội thất phòng bếp</span></a>
                                                </li>
                                                <li>
                                                    <a href="shop-wishlist.html"><span class="menu-item-text">Nội thất phòng bếp</span></a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html"><span class="menu-item-text">Sản phẩm khác</span></a>
                                                </li>
                                            </ul> -->
                                        </li>
                                        <li class="level-0 menu-item">
                                            <a href="<?= BASE_URL ?>?act=baiviet"><span class="menu-item-text">BÀI VIẾT</span></a>

                                        </li>

                                        <li class="level-0 menu-item">
                                            <a href="<?= BASE_URL ?>?act=lienhe"><span class="menu-item-text">Liên hệ</span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 header-right">
                            <div class="header-page-link">
                                <!-- Login -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img width="40px" src="<?= $user['anh_dai_dien'] ?>" class="avatar rounded-circle" alt="Avatar"> <!-- Avatar ảnh tròn -->
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?= BASE_URL .'?act=myaccount&id_tai_khoan='.$user['id']?>">My Account</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?= BASE_URL ?>?act=dangxuat">Đăng xuất</a>
                                        </div>
                                    </li>
                                </ul>

                                <!-- Search -->
                                <!-- <div class="search-box">
                                    <div class="search-toggle"><i class="icon-search"></i></div>
                                </div> -->

                                <!-- Wishlist -->
                                <!-- <div class="wishlist-box">
                                    <a href="shop-wishlist.html"><i class="icon-heart"></i></a>
                                    <span class="count-wishlist">1</span>
                                </div> -->

                                <!-- Cart -->
                                <div class="ruper-topcart dropdown light">
                                    <div class="dropdown mini-cart top-cart">
                                        <div class="remove-cart-shadow"></div>
                                        <a class="dropdown-toggle cart-icon" href="<?=BASE_URL .'?act=list-giohang'?>" role="button" aria-haspopup="true" aria-expanded="false">
                                            <div class="icons-cart"><i class="icon-large-paper-bag"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>