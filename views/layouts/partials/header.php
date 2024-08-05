<style>
    #site-header {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Tạo shadow bên dưới header */
    position: relative; /* Đảm bảo header ở vị trí tương đối */
   
}
</style>
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
                                <div class="dropdown-menu cart-popup">
                                    <div class="cart-empty-wrap">
                                        <ul class="cart-list">
                                            <li class="empty">
                                                <span>No products in the cart.</span>
                                                <a class="go-shop" href="shop-grid-left.html">GO TO SHOP<i aria-hidden="true" class="arrow_right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-list-wrap">
                                        <ul class="cart-list ">
                                            <li class="mini-cart-item">
                                                <a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
                                                <a href="shop-details.html" class="product-image"><img width="600" height="600" src="<?= BASE_URL ?>assets/ruper/media/product/3.jpg" alt=""></a>
                                                <a href="shop-details.html" class="product-name">Chair Oak Matt Lacquered</a>
                                                <div class="quantity">Qty: 1</div>
                                                <div class="price">$150.00</div>
                                            </li>
                                            <li class="mini-cart-item">
                                                <a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
                                                <a href="shop-details.html" class="product-image"><img width="600" height="600" src="<?= BASE_URL ?>assets/ruper/media/product/1.jpg" alt=""></a>
                                                <a href="shop-details.html" class="product-name">Zunkel Schwarz</a>
                                                <div class="quantity">Qty: 1</div>
                                                <div class="price">$100.00</div>
                                            </li>
                                        </ul>
                                        <div class="total-cart">
                                            <div class="title-total">Total: </div>
                                            <div class="total-price"><span>$100.00</span></div>
                                        </div>
                                        <div class="free-ship">
                                            <div class="title-ship">Buy <strong>$400</strong> more to enjoy <strong>FREE Shipping</strong></div>
                                            <div class="total-percent">
                                                <div class="percent" style="width:20%"></div>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                            <a href="shop-cart.html" class="button btn view-cart btn-primary">View cart</a>
                                            <a href="shop-checkout.html" class="button btn checkout btn-default">Check out</a>
                                        </div>
                                    </div>
                                </div>
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
                <div class="section-container p-l-r">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 col-md-12 col-sm-12 col-12 header-left">
                            <div class="site-logo">
                                <a href="<?= BASE_URL ?>">
                                    <h1 class="fw-bold fs-1">WOODY</h1>
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
                                            <ul class="sub-menu">

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
                                                <li >
                                                    <a href=" #"><span class="menu-item-text">Sản phẩm khác</span></a>
                                                </li>
                                            </ul>
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
                                <div class="login-header">
                                    <a class="login" href="<?= BASE_URL ?>?act=dangnhap">Đăng nhập</a>    
                                </div>

                                <!-- Search -->


                                <!-- Wishlist -->
                                <!-- <div class="wishlist-box">
                                    <a href="<?= BASE_URL ?>?act=dangnhap"><i class="icon-heart"></i></a>
                                </div> -->

                                <!-- Cart -->

                                <div class="cart-box">
                                    <a href="<?= BASE_URL . '?act=dangnhap' ?>">
                                        <i style="font-size: 1.3em;" class="icon-large-paper-bag custom-icon"></i>
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>