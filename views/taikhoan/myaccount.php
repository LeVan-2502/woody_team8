<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/page-my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:39 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Account | Ruper</title>

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=swap" rel="stylesheet">
    <style>
        .profile-img {
            width: 240px;
            height: 240px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>

<body class="blog">
    <div id="page" class="hfeed page-wrapper">
        <?php require_once './views/layouts/partials/headerdangnhap.php' ?>

        <div id="site-main" class="site-main">
            <div id="main-content" class="main-content">

                <div id="primary" class="content-area">
                    <div id="title" class="page-title">
                        <div class="section-container">
                            <div class="content-title-heading">
                                <h1 class="text-title-heading">
                                    My Account
                                </h1>
                            </div>
                            <div class="breadcrumbs">
                                <a href="index.html">Trang chủ</a><span class="delimiter"></span>My Account
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div id="content" class="site-content" role="main">
                            <div class="mt-4">
                                <div class="row justify-content-center">
                                    <div class="card p-4 col-9 mx-auto">
                                        <div class="row my-5">
                                            <div class="col-md-4 text-center">
                                                <img src="<?= $taiKhoan['anh_dai_dien'] ?>" alt="Profile Image" class="profile-img mb-3">
                                                <h3></h3>

                                                <a class="btn btn-primary" href="<?= BASE_URL . '?act=capnhattaikhoan&id_tai_khoan=' . $user['id'] ?>">Cập nhật thông tin</a>

                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h3 class="card-title"><?= $taiKhoan['ho_ten'] ?></h3>
                                                    <p class="card-text">Product Designer based in Melbourne</p>
                                                    <hr>
                                                    <ul class="list-unstyled">
                                                        <li><strong>Giới tính:</strong><?= $taiKhoan['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></li>
                                                        <li><strong>Ngày sinh:</strong><?= $taiKhoan['ngay_sinh'] ?></li>
                                                        <li><strong>Địa chỉ:</strong> <?= $taiKhoan['dia_chi'] ?></li>
                                                        <li><strong>Email:</strong> <?= $taiKhoan['email'] ?></li>
                                                        <li><strong>Phone:</strong><?= $taiKhoan['so_dien_thoai'] ?></li>


                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-4">
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
                                            <div class="col-12">
                                                <h4>Lịch sử mua hàng</h4>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="danhsach" role="tabpanel" aria-labelledby="danhsach-tab">
                                                        <div class="table-responsive py-2">
                                                            <table id="donHangTable" class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>STT</th>
                                                                        <th>Mã đơn</th>
                                                                        <th>Ngày đặt</th>
                                                                        <th>Trạng thái</th>
                                                                        <th>Phương thức thanh toán</th>
                                                                        <th>Tổng tiền</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($donHang as $key => $dh) : ?>
                                                                        <tr>
                                                                            <td><?= $key + 1 ?></td>
                                                                            <td><?= $dh['ma_don_hang'] ?></td>
                                                                            <td><?= $dh['ngay_dat'] ?></td>
                                                                            <td>
                                                                                <?php if (isset($dh['trang_thai_id']) && isset($dh['ten_trang_thai'])) : ?>
                                                                                    <?= hienThiTrangThai($dh['trang_thai_id'], $dh['ten_trang_thai']); ?>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                            <td><?= $dh['ten_phuong_thuc'] ?></td>
                                                                            <td><?= $dh['tong_tien'] ?></td>
                                                                            <td>
                                                                                <a class="btn btn-success" href="<?= BASE_URL . '?act=chitiet-donhang&id_don_hang=' . $dh['id'] ?>">Chi tiết</a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach ?>
                                                                    <?php
                                                                    function hienThiTrangThai($trang_thai_id, $ten_trang_thai)
                                                                    {
                                                                        $mauTrangThai = [
                                                                            0 => 'badge-primary',  // Đặt hàng thành công - Màu xanh dương
                                                                            1 => 'badge-info',     // Đang chuẩn bị hàng - Màu xanh nhạt
                                                                            2 => 'badge-warning',  // Đang giao hàng - Màu vàng
                                                                            3 => 'badge-success',  // Giao hàng thành công - Màu xanh lá
                                                                            4 => 'badge-danger'    // Đơn hàng bị hủy - Màu đỏ
                                                                        ];
                                                                        $mau = isset($mauTrangThai[$trang_thai_id]) ? $mauTrangThai[$trang_thai_id] : 'badge-secondary';
                                                                        return "<span class='badge $mau'>" . htmlspecialchars($ten_trang_thai) . "</span>";
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- #primary -->
            </div><!-- #main-content -->
        </div>

        <footer id="site-footer" class="site-footer background">
            <div class="footer">
                <div class="section-padding">
                    <div class="section-container">
                        <div class="block-widget-wrap">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="block block-menu m-b-20">
                                        <h2 class="block-title">Contact Us</h2>
                                        <div class="block-content">
                                            <ul>
                                                <li>
                                                    <a href="page-contact.html">616.774.0561</a>
                                                </li>
                                                <li>
                                                    <a href="page-contact.html">866.453.4748</a>
                                                </li>
                                                <li>
                                                    <a href="page-contact.html">HR Fax: 810.222.5439</a>
                                                </li>
                                                <li>
                                                    <a href="page-contact.html">sales@ruperfurniture.com</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="block block-social">
                                        <ul class="social-link">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="block block-menu">
                                        <h2 class="block-title">Showroom</h2>
                                        <div class="block-content">
                                            <p>1000 84th Street SW , Byron Center, MI 49315</p>
                                            <p>AmericasMart Bldg. #1</p>
                                            <p>Suite 5C-1, Atlanta, GA 30303</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="block block-menu">
                                        <h2 class="block-title">Services</h2>
                                        <div class="block-content">
                                            <ul>
                                                <li>
                                                    <a href="page-about.html">Sale</a>
                                                </li>
                                                <li>
                                                    <a href="page-about.html">Quick Ship</a>
                                                </li>
                                                <li>
                                                    <a href="page-about.html">New Designs</a>
                                                </li>
                                                <li>
                                                    <a href="page-about.html">Accidental Fabric Protection</a>
                                                </li>
                                                <li>
                                                    <a href="page-about.html">Furniture Care</a>
                                                </li>
                                                <li>
                                                    <a href="page-about.html">Gift Cards</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="block block-newsletter">
                                        <h2 class="block-title">Newsletter</h2>
                                        <div class="block-content">
                                            <div class="newsletter-text">Enter your email below to be the first to know about new collections and product launches.</div>
                                            <form action="#" method="post" class="newsletter-form">
                                                <input type="email" class="bg-white" name="your-email" value="" size="40" placeholder="Email address">
                                                <span class="btn-submit">
                                                    <input type="submit" value="Subscribe">
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="block block-image">
                                        <img width="309" height="32" src="<?= BASE_URL ?>assets/ruper/media/payments.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="section-padding">
                    <div class="section-container">
                        <div class="block-widget-wrap">
                            <p class="copyright text-center">Copyright © 2022. All Right Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Back Top button -->
    <div class="back-top button-show">
        <i class="arrow_carrot-up"></i>
    </div>

    <!-- Search -->
    <div class="search-overlay">
        <div class="close-search"></div>
        <div class="wrapper-search">
            <form role="search" method="get" class="search-from ajax-search" action="#">
                <div class="search-box">
                    <button id="searchsubmit" class="btn" type="submit">
                        <i class="icon-search"></i>
                    </button>
                    <input id="myInput" type="text" autocomplete="off" value="" name="s" class="input-search s" placeholder="Search...">
                    <div class="search-top">
                        <div class="close-search">Cancel</div>
                    </div>
                    <div class="content-menu_search">
                        <label>Suggested</label>
                        <ul id="menu_search" class="menu">
                            <li><a href="#">Furniture</a></li>
                            <li><a href="#">Home Décor</a></li>
                            <li><a href="#">Industrial</a></li>
                            <li><a href="#">Kitchen</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Wishlist -->
    <div class="wishlist-popup">
        <div class="wishlist-popup-inner">
            <div class="wishlist-popup-content">
                <div class="wishlist-popup-content-top">
                    <span class="wishlist-name">Wishlist</span>
                    <span class="wishlist-count-wrapper"><span class="wishlist-count">2</span></span>
                    <span class="wishlist-popup-close"></span>
                </div>
                <div class="wishlist-popup-content-mid">
                    <table class="wishlist-items">
                        <tbody>
                            <tr class="wishlist-item">
                                <td class="wishlist-item-remove"><span></span></td>
                                <td class="wishlist-item-image">
                                    <a href="shop-details.html">
                                        <img width="600" height="600" src="<?= BASE_URL ?>assets/ruper/media/product/3.jpg" alt="">
                                    </a>
                                </td>
                                <td class="wishlist-item-info">
                                    <div class="wishlist-item-name">
                                        <a href="shop-details.html">Chair Oak Matt Lacquered</a>
                                    </div>
                                    <div class="wishlist-item-price">
                                        <span>$150.00</span>
                                    </div>
                                    <div class="wishlist-item-time">June 4, 2022</div>
                                </td>
                                <td class="wishlist-item-actions">
                                    <div class="wishlist-item-stock">
                                        In stock
                                    </div>
                                    <div class="wishlist-item-add">
                                        <div data-title="Add to cart">
                                            <a rel="nofollow" href="#" class="button">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="wishlist-item">
                                <td class="wishlist-item-remove"><span></span></td>
                                <td class="wishlist-item-image">
                                    <a href="shop-details.html">
                                        <img width="600" height="600" src="<?= BASE_URL ?>assets/ruper/media/product/4.jpg" alt="">
                                    </a>
                                </td>
                                <td class="wishlist-item-info">
                                    <div class="wishlist-item-name">
                                        <a href="shop-details.html">Pillar Dining Table Round</a>
                                    </div>
                                    <div class="wishlist-item-price">
                                        <del aria-hidden="true"><span>$150.00</span></del>
                                        <ins><span>$100.00</span></ins>
                                    </div>
                                    <div class="wishlist-item-time">June 4, 2022</div>
                                </td>
                                <td class="wishlist-item-actions">
                                    <div class="wishlist-item-stock">
                                        In stock
                                    </div>
                                    <div class="wishlist-item-add">
                                        <div data-title="Add to cart">
                                            <a rel="nofollow" href="#" class="button">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="wishlist-popup-content-bot">
                    <div class="wishlist-popup-content-bot-inner">
                        <a class="wishlist-page" href="shop-wishlist.html">
                            Open wishlist page
                        </a>
                        <span class="wishlist-continue" data-url="">
                            Continue shopping
                        </span>
                    </div>
                    <div class="wishlist-notice wishlist-notice-show">Added to the wishlist!</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Compare -->
    <div class="compare-popup">
        <div class="compare-popup-inner">
            <div class="compare-table">
                <div class="compare-table-inner">
                    <a href="#" id="compare-table-close" class="compare-table-close">
                        <span class="compare-table-close-icon"></span>
                    </a>
                    <div class="compare-table-items">
                        <table id="product-table" class="product-table">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="#" class="compare-table-settings">Settings</a>
                                    </th>
                                    <th>
                                        <a href="shop-details.html">Chair Oak Matt Lacquered</a> <span class="remove">remove</span>
                                    </th>
                                    <th>
                                        <a href="shop-details.html">Zunkel Schwarz</a> <span class="remove">remove</span>
                                    </th>
                                    <th>
                                        <a href="shop-details.html">Namaste Vase</a> <span class="remove">remove</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-image">
                                    <td class="td-label">Image</td>
                                    <td>
                                        <a href="shop-details.html">
                                            <img width="600" height="600" src="<?= BASE_URL ?>assets/ruper/media/product/3.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="shop-details.html">
                                            <img width="600" height="600" src="<?= BASE_URL ?>assets/ruper/media/product/1.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="shop-details.html">
                                            <img width="600" height="600" src="<?= BASE_URL ?>assets/ruper/media/product/2.jpg" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr class="tr-sku">
                                    <td class="td-label">SKU</td>
                                    <td>VN00189</td>
                                    <td></td>
                                    <td>D1116</td>
                                </tr>
                                <tr class="tr-rating">
                                    <td class="td-label">Rating</td>
                                    <td>
                                        <div class="star-rating">
                                            <span style="width:80%"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="star-rating">
                                            <span style="width:100%"></span>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr class="tr-price">
                                    <td class="td-label">Price</td>
                                    <td><span class="amount">$150.00</span></td>
                                    <td><del><span class="amount">$150.00</span></del> <ins><span class="amount">$100.00</span></ins></td>
                                    <td><span class="amount">$200.00</span></td>
                                </tr>
                                <tr class="tr-add-to-cart">
                                    <td class="td-label">Add to cart</td>
                                    <td>
                                        <div data-title="Add to cart">
                                            <a href="#" class="button">Add to cart</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div data-title="Add to cart">
                                            <a href="#" class="button">Add to cart</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div data-title="Add to cart">
                                            <a href="#" class="button">Add to cart</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="tr-description">
                                    <td class="td-label">Description</td>
                                    <td>Phasellus sed volutpat orci. Fusce eget lore mauris vehicula elementum gravida nec dui. Aenean aliquam varius ipsum, non ultricies tellus sodales eu. Donec dignissim viverra nunc, ut aliquet magna posuere eget.</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                    <td>The EcoSmart Fleece Hoodie full-zip hooded jacket provides medium weight fleece comfort all year around. Feel better in this sweatshirt because Hanes keeps plastic bottles of landfills by using recycled polyester.7.8 ounce fleece sweatshirt made with up to 5 percent polyester created from recycled plastic.</td>
                                </tr>
                                <tr class="tr-content">
                                    <td class="td-label">Content</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
                                </tr>
                                <tr class="tr-dimensions">
                                    <td class="td-label">Dimensions</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quickview -->
    <div class="quickview-popup">
        <div id="quickview-container">
            <div class="quickview-container">
                <a href="#" class="quickview-close"></a>
                <div class="quickview-notices-wrapper"></div>
                <div class="product single-product product-type-simple">
                    <div class="product-detail">
                        <div class="row">
                            <div class="img-quickview">
                                <div class="product-images-slider">
                                    <div id="quickview-slick-carousel">
                                        <div class="images">
                                            <div class="scroll-image">
                                                <div class="slick-wrap">
                                                    <div class="slick-sliders image-additional" data-dots="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
                                                        <div class="img-thumbnail slick-slide">
                                                            <a href="media/product/3.jpg" class="image-scroll" title="">
                                                                <img width="900" height="900" src="<?= BASE_URL ?>assets/ruper/media/product/3.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="img-thumbnail slick-slide">
                                                            <a href="media/product/3-2.jpg" class="image-scroll" title="">
                                                                <img width="900" height="900" src="<?= BASE_URL ?>assets/ruper/media/product/3-2.jpg" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quickview-single-info">
                                <div class="product-content-detail entry-summary">
                                    <h1 class="product-title entry-title">Chair Oak Matt Lacquered</h1>
                                    <div class="price-single">
                                        <div class="price">
                                            <del><span>$150.00</span></del>
                                            <span>$100.00</span>
                                        </div>
                                    </div>
                                    <div class="product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                            <span style="width:80%">Rated <strong class="rating">4.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <a href="#" class="review-link">(<span class="count">1</span> customer review)</a>
                                    </div>
                                    <div class="description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore…</p>
                                    </div>
                                    <form class="cart" method="post" enctype="multipart/form-data">
                                        <div class="quantity-button">
                                            <div class="quantity">
                                                <button type="button" class="plus">+</button>
                                                <input type="number" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
                                                <button type="button" class="minus">-</button>
                                            </div>
                                            <button type="submit" class="single-add-to-cart-button button alt">Add to cart</button>
                                        </div>
                                        <button class="button quick-buy">Buy It Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- Page Loader -->
    <div class="page-preloader">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>

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
    <script>
        $(document).ready(function() {
            $('#donHangTable').DataTable();
        });
    </script>
</body>

</html>

</body>

<!-- Mirrored from caketheme.com/html/ruper/page-my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:39 GMT -->

</html>