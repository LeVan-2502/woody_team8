<?php
if(isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
} 
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:38 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Checkout | Ruper</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="media/favicon.png">

    <!-- Dependency Styles -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/feather-font/css/iconfont.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/icomoon-font/css/icomoon.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/font-awesome/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/wpbingofont/css/wpbingofont.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/elegant-icons/css/elegant.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/slick/css/slick.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/slick/css/slick-theme.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/mmenu/css/mmenu.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/slider/css/jslider.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/select2/css/select2.min.css">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/responsive.css" type="text/css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=swap" rel="stylesheet">
</head>

<body class="shop">
    <div id="page" class="hfeed page-wrapper">
        <?php require_once './views/layouts/partials/headerdangnhap.php' ?>

        <div id="site-main" class="site-main">
            <div id="main-content" class="main-content">
                <div id="primary" class="content-area">
                    <div id="title" class="page-title">
                        <div class="section-container">
                            <div class="content-title-heading">
                                <h1 class="text-title-heading">
                                    Checkout
                                </h1>
                            </div>
                            <div class="breadcrumbs">
                                <a href="index.html">Home</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Shopping Cart
                            </div>
                        </div>
                    </div>

                    <div id="content" class="site-content" role="main">
                        <div class="section-padding">
                            <div class="section-container p-l-r">
                                <div class="shop-checkout">
                                    <form name="checkout" method="post" class="checkout" action="<?= BASE_URL . '?act=checkout-thank' ?>" autocomplete="off">
                                        <input type="hidden" name="tong_tien" value="<?=$to_tal?>">
                                        
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-7 col-md-12 col-12">
                                                <div class="customer-details">
                                                    <div class="billing-fields">
                                                        <h3>Thông tin chi tiết của người nhận hàng</h3>
                                                        <div class="billing-fields-wrapper row">
                                                            <div class="col-6 form-row form-row-first validate-required">
                                                                <label>Tên người nhận hàng <span class="required" title="required">*</span></label>
                                                                <span class="input-wrapper"><input type="text" class="input-text" name="ten_nguoi_nhan" value="<?=$taiKhoan['ho_ten']?>"></span>
                                                                <?php if (isset($_SESSION['errors']['ten_nguoi_nhan'])) { ?>
                                                                    <div class="text-danger"><?= $_SESSION['errors']['ten_nguoi_nhan'] ?></div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="col-6 form-row form-row-last validate-required">
                                                                <label>Email <span class="required" title="required">*</span></label>
                                                                <span class="input-wrapper"><input type="email" class="input-text" name="email_nguoi_nhan" value="<?=$taiKhoan['email']?>"></span>
                                                                <?php if (isset($_SESSION['errors']['email_nguoi_nhan'])) { ?>
                                                                    <div class="text-danger"><?= $_SESSION['errors']['email_nguoi_nhan'] ?></div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="col-12 form-row address-field validate-required form-row-wide">
                                                                <label for="billing_city" class="">Địa chỉ người nhận<span class="required" title="required">*</span></label>
                                                                <span class="input-wrapper">
                                                                    <input type="text" class="input-text" name="dia_chi_nguoi_nhan" value="<?=$taiKhoan['dia_chi']?>">
                                                                </span>
                                                                <?php if (isset($_SESSION['errors']['dia_chi_nguoi_nhan'])) { ?>
                                                                    <div class="text-danger"><?= $_SESSION['errors']['dia_chi_nguoi_nhan'] ?></div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="col-6 form-row address-field validate-required form-row-wide">
                                                                <label>Sô điện thoại <span class="required" title="required">*</span></label>
                                                                <span class="input-wrapper">
                                                                    <input type="text" class="input-text" name="sdt_nguoi_nhan" placeholder="House number and street name" value="<?=$taiKhoan['so_dien_thoai']?>">
                                                                </span>
                                                                <?php if (isset($_SESSION['errors']['sdt_nguoi_nhan'])) { ?>
                                                                    <div class="text-danger"><?= $_SESSION['errors']['sdt_nguoi_nhan'] ?></div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="col-6 form-row address-field validate-required validate-postcode form-row-wide">
                                                                <label>Ngày đặt<span class="required" title="required">*</span></label>
                                                                <span class="input-wrapper">
                                                                    <input type="date" class="input-text" name="ngay_dat" value="<?=date('Y-m-d')?>">
                                                                </span>
                                                                <?php if (isset($_SESSION['errors']['ngay_dat'])) { ?>
                                                                    <div class="text-danger"><?= $_SESSION['errors']['ngay_dat'] ?></div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="additional-fields">
                                                    <p class="form-row notes">
                                                        <label>Ghi chú <span class="optional">(optional)</span></label>
                                                        <span class="input-wrapper">
                                                            <textarea name="ghi_chu" class="input-text" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                                                <div class="checkout-review-order">
                                                    <div class="checkout-review-order-table">
                                                        <div class="review-order-title">Sản phẩm</div>
                                                        <div class="cart-items">
                                                            <?php foreach ($listSPGioHang as $sp) : ?>
                                                                <div class="cart-item">
                                                                    <div class="info-product">
                                                                        <div class="product-thumbnail">
                                                                            <img width="600" height="600" src="<?= $sp['hinh_anh'] ?>" alt="">
                                                                        </div>
                                                                        <div class="product-name">
                                                                            <?= $sp['ten_san_pham'] ?>
                                                                            <strong class="product-quantity">SỐ LƯỢNG : <?= $sp['so_luong'] ?></strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-total">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach ?>

                                                        </div>
                                                        <div class="cart-subtotal">
                                                            <h2>Tổng tiền</h2>
                                                            <div class="subtotal-price">
                                                                <span><?=number_format($_SESSION['tong_tien'])?>VND</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">

                                                            <select name="phuong_thuc_thanh_toan_id" id="phuong_thuc_thanh_toan_id" class="form-control">
                                                                <option selected disabled value=""> --- Chọn phương thức thanh toán ---</option>
                                                                <?php foreach ($listPhuongThuc as $pt) : ?>
                                                                    <option value="<?= $pt['id'] ?>">$ <?= $pt['ten_phuong_thuc'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                            <?php if (isset($_SESSION['errors']['phuong_thuc_thanh_toan_id'])) { ?>
                                                                <p class="text-danger"><?= $_SESSION['errors']['phuong_thuc_thanh_toan_id'] ?></p>
                                                            <?php } ?>
                                                        </div>
                                                                
                                                    </div>
                                                    <div id="payment" class="checkout-payment">
                                                        
                                                        <div class="form-row place-order">
                                                            <div class="terms-and-conditions-wrapper">
                                                                <div class="privacy-policy-text"></div>
                                                            </div>
                                                            <button type="submit" class="button alt" name="redirect" value="Place order">Xác nhận đặt hàng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div><!-- #main-content -->
        </div>

        <?php require_once './views/layouts/partials/footer.php' ?>
    </div>

    <!-- Back Top button -->
    <?php require_once './views/layouts/partials/modal.php' ?>

    <!-- Dependency Scripts -->
    <script src="<?= BASE_URL ?>assets/ruper/libs/popper/js/popper.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/jquery/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/slick/js/slick.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/countdown/js/jquery.countdown.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/mmenu/js/jquery.mmenu.all.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/slider/js/tmpl.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/slider/js/jquery.dependClass-0.1.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/slider/js/draggable-0.1.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/slider/js/jquery.slider.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/elevatezoom/js/jquery.elevatezoom.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/select2/js/select2.min.js"></script>

    <!-- Site Scripts -->
    <script src="<?= BASE_URL ?>assets/ruper/assets/js/app.js"></script>
    <!-- Code injected by live-server -->
    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function() {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function(msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
</body>

<!-- Mirrored from caketheme.com/html/ruper/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:39 GMT -->

</html>