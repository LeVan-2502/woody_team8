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
        /* body{
            background-color: #f5f1de;
        }
         */
        .order-summary {
            margin-top: 20px;
        }

        .action-buttons {
            margin-top: 20px;
        }

        .card-header {
            font-weight: bold;
            background-color: #4D555B;
            color: #fff;
        }

        .card-header title {
            background-color: #406346;
        }

        .table img {
            max-width: 100px;
        }

        .container {
            margin-top: 30px;
        }

        .card-body {
            background-color: #fff;
        }
    </style>
</head>

<body class="hold-transition login-page ">

    <div class="container">
        <div class="card">
            <div style="background-color: #152935;" class="card-header">
                <h3 style="color:#fff; text-align: center;">Chi Tiết Đơn Hàng <strong><?= $donHang['ma_don_hang'] ?></strong></h3>
            </div>

            <!-- Thông tin đơn hàng -->
            <div style="background-color: #E7E8E7;" class="card-body father">
                <div class="row">
                   
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Thông tin đơn hàng
                            </div>
                            <div class="card-body">
                                <p><strong>Ngày đặt hàng:</strong> <?= $donHang['ngay_dat'] ?></p>
                                <p><strong>Tình trạng đơn hàng:</strong> <span class="badge badge-info"><?= $donHang['ten_trang_thai'] ?></span></p>
                                <p><strong>Phương thức thanh toán:</strong> <?= $donHang['ten_phuong_thuc'] ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Thông tin giao hàng -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
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

                <!-- Danh sách sản phẩm -->
                <div class="card mt-4">
                    <div class="card-header">
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
                                        <td><img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="Sản phẩm 1"></td>
                                        <td><?= $item['ten_san_pham'] ?></td>
                                        <td><?= $item['so_luong'] ?></td>
                                        <td><?= $item['gia_san_pham'] ?></td>
                                        <td><?= $item['so_luong'] * $item['gia_san_pham'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <!-- Tổng cộng đơn hàng -->
                        <div class="order-summary text-right">
                            <?php
                            $to_tal = 0;
                            foreach ($chiTietDonHang as $sp) {
                                $tong_tien = $sp['gia_san_pham'] * $sp['so_luong'];
                                $to_tal += $tong_tien;
                            }
                            ?>
                            <p><strong>Tổng giá sản phẩm:</strong> <?= $to_tal ?></p>
                            <p><strong>Phí vận chuyển:</strong> 30,000 VNĐ</p>
                            <p><strong>Áp dụng mã giảm giá:</strong> 30,000 VNĐ</p>
                            <p><strong>Tổng số tiền:</strong> <?= $to_tal + 30000 - 30000 ?> VNĐ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="action-buttons text-right">
                    <a href="<?= BASE_URL ?>" class="btn btn-primary">Về trang chủ</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn không?')" href="<?= BASE_URL.'?act=huy-donhang&id_don_hang='.$donHang['id'] ?>" class="btn btn-danger">Hủy đơn hàng</a>
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