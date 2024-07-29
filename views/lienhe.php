<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/blog-grid-left.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:54:15 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Grid - Left Sidebar | Ruper</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/responsive.css" type="text/css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        label{
            color:gray;
            font-weight: bold;
        }

        .container {
            margin-top: 50px;
        }

        h3 {
            color: #f9a825;
        }

        .form-control {

            border-radius: 1;
            background-color: #fff;
            color: #fff;
        }

        .btn-block {
            background-color:   ;
            color: #fff;
        }


        .btn-block:hover {
            background-color: #e69100;
        }

        .list-unstyled li {
            margin-bottom: 15px;
            font-size: 1.25rem;
        }

        .list-unstyled strong {
            color: #f9a825;
        }

        .icon-background {
            background-color: gray;
            border-radius: 50%;
            padding: 10px;
            color: white;
            display: inline-block;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 20px;
        }

        .list-unstyled li {
            display: flex;
            align-items: center;
        }

        .list-unstyled li i {
            margin-right: 10px;
        }

        .list-unstyled li {
            display: flex;
            align-items: center;
        }

        .list-unstyled li i {
            margin-right: 10px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-icons a {
            text-decoration: none;
            color: white;
            margin-right: 10px;
        }

        .social-icons a i {
            color: #259755;
            background-color: #fff;
            border-radius: 50%;
            padding: 10px;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 20px;
        }
    </style>
</head>

<body class="blog">
    <div id="page" class="hfeed page-wrapper">

        <?php
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            require_once './views/layouts/partials/headerdangnhap.php';
        } else {
            require_once './views/layouts/partials/header.php';
        }
        ?>

        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg mt-5">
                    <div class="row no-gutters">


                        <div class="col-md-7 box">
                            <div class="p-5">
                                <h3 class="mb-4">GỬI TIN NHẮN</h3>
                                <form method="post" action="<?= BASE_URL . '?act=post-lienhe' ?>">
                                    <div class="form-group">
                                        <label for="name">Họ và tên</label>
                                        <input name="ho_ten" type="text" class="form-control" id="name" placeholder="Nhập họ và tên">
                                        <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                                            <div class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Nhập email của bạn">
                                        <?php if (isset($_SESSION['errors']['email'])) { ?>
                                            <div class="text-danger"><?= $_SESSION['errors']['email'] ?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Tiêu đề</label>
                                        <input name="tieu_de" type="text" class="form-control" id="subject" placeholder="Nhập tiêu đề">
                                        <?php if (isset($_SESSION['errors']['tieu_de'])) { ?>
                                            <div class="text-danger"><?= $_SESSION['errors']['tieu_de'] ?></div>
                                        <?php } ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="message">Nội dung</label>
                                        <textarea name="noi_dung" class="form-control" id="message" rows="5" placeholder="Nhập nội dung tin nhắn"></textarea>
                                        <?php if (isset($_SESSION['errors']['noi_dung'])) { ?>
                                            <div class="text-danger"><?= $_SESSION['errors']['noi_dung'] ?></div>
                                        <?php } ?>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-block mb-4">Gửi</button>
                                    <?php
                                    if (isset($_SESSION['message'])) {
                                        $message = $_SESSION['message'];
                                        $message_type = $_SESSION['message_type'];

                                        echo '<div class="alert alert-' . $message_type . '">' . $message . '</div>';

                                        // Xóa thông báo sau khi hiển thị
                                        unset($_SESSION['message']);
                                        unset($_SESSION['message_type']);
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 bg-dark text-white d-flex flex-column align-items-start justify-content-center p-5">
                            <h3 class="mb-4">THÔNG TIN LIÊN HỆ</h3>
                            <ul class="list-unstyled">
                                <li class="mb-3 mt-3">
                                    <strong><i class="fas fa-map-marker-alt icon-background"></i> Địa chỉ:</strong> 220 Tôn Đức Thắng
                                </li>
                                <li class="mb-3 mt-3">
                                    <strong><i class="fas fa-phone icon-background"></i> Điện thoại:</strong> 1235 2355 98
                                </li>
                                <li class="mb-3 mt-3">
                                    <strong><i class="fas fa-envelope icon-background"></i> Email:</strong> woodyshop@gamil.com
                                </li>
                                <li class="mb-3 mt-3">
                                    <strong><i class="fas fa-globe icon-background"></i> Website:</strong> woodyshop.com
                                </li>
                            </ul>
                            <div class="social-icons">
                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <?php require_once './views/layouts/partials/footer.php'; ?>
    </div>

    <!-- Back Top button -->
    <?php require_once './views/layouts/partials/modal.php'; ?>

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
        const products = <?php echo $listAllBaiViet; ?>;
        console.log(products);
        const pageSize = 9; // Số lượng sản phẩm trên mỗi trang
        let currentPage = 1; // Trang hiện tại

        function renderProducts() {
            const start = (currentPage - 1) * pageSize;
            const end = Math.min(start + pageSize, products.length);
            const dataContainer = document.getElementById('dataContainer');
            dataContainer.innerHTML = '';

            for (let i = start; i < end; i++) {
                const product = products[i];
                const productElement = ` 
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <div class="post-entry clearfix post-wapper">
                        <div class="post-image">
                            <a href="<?= BASE_URL . '?act=chitiet-baiviet&id_bai_viet=${product.id}' ?>">
                                <img src="${product.hinh_anh}" alt="">
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="post-categories">
                                <a href="#">${product.ten_danh_muc}</a>
                            </div>
                            <h2 class="post-title">
                                <a href="<?= BASE_URL . '?act=chitiet-baiviet&id_bai_viet=${product.id}' ?>">${product.tieu_de}</a>
                            </h2>
                            <div class="post-meta">
                                <span class="post-time">${product.ngay_dinh_dang}</span>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                dataContainer.innerHTML += productElement;
            }
        }

        function renderPagination() {
            const pageCount = Math.ceil(products.length / pageSize);
            const paginationContainer = document.getElementById('page-numbers');
            paginationContainer.innerHTML = '';

            for (let i = 1; i <= pageCount; i++) {
                const pageElement = `<li><a class="page-numbers ${currentPage === i ? 'active' : ''}" href="#" onclick="setPage(${i})">${i}</a></li>`;
                paginationContainer.innerHTML += pageElement;
            }
        }

        function setPage(page) {
            currentPage = page;
            renderProducts();
            renderPagination();
        }

        function nextPage() {
            const pageCount = Math.ceil(products.length / pageSize);
            if (currentPage < pageCount) {
                setPage(currentPage + 1);
            }
        }

        function prevPage() {
            if (currentPage > 1) {
                setPage(currentPage - 1);
            }
        }

        // Khởi tạo trang đầu tiên khi trang được tải
        document.addEventListener('DOMContentLoaded', () => {
            renderProducts();
            renderPagination();
        });
    </script>

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

<!-- Mirrored from caketheme.com/html/ruper/blog-grid-left.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:54:16 GMT -->

</html>