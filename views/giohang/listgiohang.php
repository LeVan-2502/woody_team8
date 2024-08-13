<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:38 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Cart | Ruper</title>

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

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/responsive.css" type="text/css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=swap" rel="stylesheet">
    <style>
        .form-control {
            border: 2px solid red;
        }
    </style>
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
                                    Shopping Cart
                                </h1>
                            </div>
                            <div class="breadcrumbs">
                                <a href="#">Home</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Shopping Cart
                            </div>
                        </div>
                    </div>

                    <div id="content" class="site-content" role="main">
                        <div class="section-padding">
                            <div class="section-container p-l-r">
                                <div class="shop-cart">
                                    
                                    <div class="row">
                                    <div class="col-12">
                                                <?php if (isset($_SESSION['thongbao'])) : ?>
                                                    <div class="alert alert-<?= $_SESSION['thongbao']['type'] ?> alert-dismissible fade show" role="alert">
                                                        <?= $_SESSION['thongbao']['message'] ?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <?php unset($_SESSION['thongbao']); ?>
                                                <?php endif ?>
                                            </div>
                                        <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                                            <form class="cart-form" action="<?= BASE_URL . '?act=capnhat-giohang' ?>" method="post">
                                                <div class="table-responsive">
                                                    <table class="cart-items table" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-thumbnail">ID sản phẩm</th>
                                                                <th class="product-thumbnail">Hình ảnh</th>
                                                                <th class="product-price">Giá</th>
                                                                <th class="product-quantity">Số lượng</th>
                                                                <th class="product-subtotal">Thành tiền</th>
                                                                <th class="product-remove">&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $to_tal = 0;
                                                            foreach ($listSPGioHang as $sp) :
                                                                $tong_tien = $sp['gia_san_pham'] * $sp['so_luong'];
                                                                $to_tal += $tong_tien;


                                                            ?>

                                                                <input type="hidden" name="id[]" value="<?= $sp['id'] ?>">
                                                                <tr class="cart-item">
                                                                    <td class="product-price">
                                                                        <span class="price"><?= $sp['id'] ?></span>
                                                                    </td>
                                                                    <td class="product-thumbnail">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600" src="<?= $sp['hinh_anh'] ?>" class="product-image" alt="">
                                                                        </a>
                                                                        <div class="product-name">
                                                                            <a href="shop-details.html"><?= $sp['ten_san_pham'] ?></a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-price">
                                                                        <span class="price"><?= number_format($sp['gia_san_pham']) ?>VND</span>
                                                                    </td>
                                                                    <td class="product-quantity">
                                                                        <div class="quantity">
                                                                            <button type="button" class="minus">-</button>
                                                                            <input type="number" class="qty" name="so_luong[]" data-product-id="<?= $sp['id'] ?>" step="1" min="0" max="" value="<?= $sp['so_luong'] ?>" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
                                                                            <button type="button" class="plus">+</button>
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-subtotal">
                                                                        <span><?= number_format($tong_tien) ?>VND</span>
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL . '?act=del-giohang&san_pham_id=' . $sp['id'] ?>">Xóa</a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach;
                                                            $_SESSION['to_tal'] = $to_tal ?>
                                                            <tr>
                                                                <td colspan="6" class="actions">
                                                                    <div class="bottom-cart">

                                                                        <div class="coupon">

                                                                            <select name="khuyen_mai_id" id="khuyen_mai_id" class="form-control">
                                                                                <option selected disabled value=""> --- Chọn mã khuyến mãi ---</option>
                                                                                <?php foreach ($listKhuyenMai as $km) : ?>
                                                                                    <option <?= isset($listKhuyenMai['khuyen_mai_id']) && $listKhuyenMai['khuyen_mai_id'] == $khuyen['id'] ? 'selected' : '' ?> value="<?= $km['id'] ?>"><strong><?= $km['ten_khuyen_mai'] ?></strong></option>
                                                                                <?php endforeach ?>
                                                                            </select>

                                                                        </div>
                                                                        <h2>
                                                                            <a class="button btn btn-info" href="<?= BASE_URL . '?act=listsanpham' ?>">
                                                                                Tiếp tục mua hàng
                                                                            </a>
                                                                        </h2>
                                                                        <button type="submit" name="update_cart" class="button btn btn-success" value="Update cart">Cập nhật giỏ hàng</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                                            <div class="cart-totals">
                                                <h2>Đơn hàng của bạn</h2>
                                                <div>
                                                    <div class="cart-subtotal">
                                                        <div class="title">Tổng giá trị</div>
                                                        <div><span><?= number_format($to_tal) ?> VND</span></div>
                                                    </div>
                                                    <div class="cart-subtotal">
                                                        <div class="title">Phí giao hàng</div>
                                                        <div><span><?= number_format(200000) ?> VND</span></div>
                                                    </div>
                                                    <div class="cart-subtotal">
                                                        <div class="title">Mã giảm giá đã chọn</div>
                                                        <button class="btn btn-danger">
                                                            <?php if($_SESSION['khuyen_mais']==[]){
                                                                echo 'Bạn chưa chọn';
                                                            }
                                                            else{
                                                                echo $_SESSION['thong_tin_gio_hang']['ten_khuyen_mai'];
                                                            } ?>
                                                        </button>

                                                    </div>

                                                </div>

                                                <?php
                                                
                                                // Khai báo biến phí giao hàng
                                                $shipping_fee = 200000;
                                                // Tính toán tổng tiền sau khi áp dụng mã giảm giá
                                                if($gioHang['khuyen_mai_id']==0){
                                                    $gioHang['gia_trị'] = 0;
                                                }
                                                $discount_value = $to_tal * ($gioHang['gia_tri'] / 100);
                                                $tong = $to_tal + $shipping_fee - $discount_value;
                                                // Lưu tổng tiền vào session
                                                $_SESSION['tong_tien'] = $tong;
                                                ?>
                                                <div class="order-total">
                                                    <div class="title">Tổng thanh toán</div>
                                                    <div><span><?= number_format($tong) ?> VND</span></div>
                                                </div>
                                                <div class="proceed-to-checkout">
                                                    <a href="<?= BASE_URL . '?act=checkout-giohang' ?>" class="btn btn-info button ">
                                                        Tiếp tục thanh toán
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-cart-empty">
                                <div class="notices-wrapper">
                                    <p class="cart-empty">Your cart is currently empty.</p>
                                </div>
                                <div class="return-to-shop">
                                    <a class="button" href="shop-grid-left.html">
                                        Return to shop
                                    </a>
                                </div>
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

        $('.qty').on('change', function() {
            var qty = $(this).val(); // Lấy giá trị số lượng mới
            var productId = $(this).data('product-id'); // Lấy ID sản phẩm

            // Gửi yêu cầu AJAX tới update_quantity.php
            $.ajax({
                url: 'update_quantity.php', // URL của tệp PHP xử lý yêu cầu
                type: 'POST', // Phương thức gửi yêu cầu
                data: {
                    san_pham_id: productId, // Dữ liệu ID sản phẩm
                    so_luong: qty // Dữ liệu số lượng mới
                },
                success: function(response) {
                    // Xử lý phản hồi từ PHP (có thể cập nhật giao diện nếu cần)
                    console.log(response); // In phản hồi ra console
                }
            });
        });
        // ]]>
    </script>
</body>

<!-- Mirrored from caketheme.com/html/ruper/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:38 GMT -->

</html>