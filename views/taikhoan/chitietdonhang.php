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

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=swap" rel="stylesheet">
    <style>
        body.hold-transition.login-page {
            background: url('https://images.unsplash.com/photo-1468581264429-2548ef9eb732?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
        }
        .card-header-custom {
            background-color: #0068a9;
            color: #fff;
            text-align: center;
        }
        .card-body-custom {
            background-color: #E7E8E7;
        }
        .card-header-info {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .badge-info {
            background-color: #17a2b8;
        }
        .order-summary p {
            margin-bottom: 0;
        }
        .order-summary p strong {
            display: inline-block;
            width: 200px;
        }
        .order-summary {
            margin-top: 20px;
        }
        .action-buttons .btn {
            margin-left: 10px;
        }
    </style>
</head>

<body class="hold-transition login-page ">

<div class="container mt-5">
        <div class="card">
            <div class="card-header card-header-custom">
                <h3>Chi Tiết Đơn Hàng <strong><?= $donHang['ma_don_hang'] ?></strong></h3>
            </div>

            <div class="card-body card-body-custom">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header card-header-info">
                                Thông tin đơn hàng
                            </div>
                            <div class="card-body">
                                <p><strong>Ngày đặt hàng:</strong> <?= $donHang['ngay_dat'] ?></p>
                                <p><strong>Tình trạng đơn hàng:</strong> <span class="badge badge-info"><?= $donHang['ten_trang_thai'] ?></span></p>
                                <p><strong>Phương thức thanh toán:</strong> <?= $donHang['ten_phuong_thuc'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header card-header-info">
                                Thông tin giao hàng
                            </div>
                            <div class="card-body">
                                <p><strong>Tên người nhận:</strong> <?= $donHang['ten_nguoi_nhan'] ?></p>
                                <p><strong>Địa chỉ giao hàng:</strong> <?= $donHang['dia_chi_nguoi_nhan'] ?></p>
                                <p><strong>Số điện thoại:</strong> <?= $donHang['sdt_nguoi_nhan'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header card-header-info">
                        Danh sách sản phẩm
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php foreach ($chiTietDonHang as $item) : ?>
                                    <tr>
                                        <td><img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="Sản phẩm 1" class="img-thumbnail" style="max-width: 100px;"></td>
                                        <td><?= $item['ten_san_pham'] ?></td>
                                        <td><?= $item['so_luong'] ?></td>
                                        <td><?= $item['gia_san_pham'] ?></td>
                                        <td><?= $item['so_luong'] * $item['gia_san_pham'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                                
                            </tbody>
                        </table>

                        <div class="order-summary text-right">
                            <?php
                            $to_tal = 0;
                            foreach ($chiTietDonHang as $sp) {
                                $tong_tien = $sp['gia_san_pham'] * $sp['so_luong'];
                                $to_tal += $tong_tien;
                            }
                            ?>
                            <p><strong>Tổng giá sản phẩm:</strong> <?= $to_tal ?> VNĐ</p>
                            <p><strong>Phí vận chuyển:</strong> 200,000 VNĐ</p>
                            <p><strong>Áp dụng mã giảm giá:</strong></p>
                            <p><strong>Tổng số tiền:</strong> <?= $to_tal + 200000   ?> VNĐ</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <div class="action-buttons">
                    <a href="<?= BASE_URL .'?act=myaccount&id_tai_khoan='.$user['id']?>" class="btn btn-primary">Về trang cá nhân</a>
                    <?php
                        // Giả sử trạng thái đơn hàng được lưu trong biến $donHang['trang_thai']
                        if ($donHang['trang_thai_id'] !==4) {
                            echo '<a onclick="return confirm(\'Bạn có chắc chắn muốn hủy đơn không?\')" href="' . BASE_URL . '?act=huy-donhang&id_don_hang=' . $donHang['id'] . '" class="btn btn-danger">Hủy đơn hàng</a>';
                        }
                        ?>
                </div>
            </div>
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
</body>

<!-- Mirrored from caketheme.com/html/ruper/page-my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:40 GMT -->

</html>