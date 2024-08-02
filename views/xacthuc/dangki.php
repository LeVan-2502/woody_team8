<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:54:16 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login / Register | Ruper</title>

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
        label {
            font-weight: bold;
        }

        body.hold-transition.login-page {
            background: url('https://images.unsplash.com/photo-1468581264429-2548ef9eb732?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div id="page" class="hfeed page-wrapper">

        <div id="site-main" class="site-main mt-4">
            <div id="main-content" class="main-content">
                <div id="primary" class="content-area">


                    <div id="content" class="site-content" role="main">
                        <div class="section-padding">
                            <div class="container justify-content-center align-items-center">
                                <div class="page-login-register">
                                    <div class="col-lg-3 col-md-3">

                                    </div>
                                    <div class="container d-flex justify-content-center align-items-center min-vh-50 mb-5">
                                        <div class="row justify-content-center w-100">
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <div class="card-header bg-secondary">
                                                            <h2 class="card-title text-center text-white">ĐĂNG KÍ</h2>
                                                        </div>
                                                        <form enctype="multipart/form-data" action="<?= BASE_URL ?>?act=post-dangki" method="POST">
                                                            <div class="card-body row">
                                                                <div class="form-group col-12">
                                                                    <label for="ho_ten">Tên tài khoản</label>
                                                                    <input name="ho_ten" type="text" class="form-control" id="ho_ten" placeholder="Nhập tên">
                                                                    <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                                                                        <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="">Ảnh đại diện</label>
                                                                    <input name="anh_dai_dien" type="file" class="form-control" id="anh_dai_dien">
                                                                    <?php if (isset($_SESSION['errors']['anh_dai_dien'])) { ?>
                                                                        <p class="text-danger"><?= $_SESSION['errors']['anh_dai_dien'] ?></p>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="">Ngày sinh</label>
                                                                    <input name="ngay_sinh" type="date" class="form-control" id="ngay_sinh" placeholder="Ngày sinh">
                                                                    <?php if (isset($_SESSION['errors']['ngay_sinh'])) { ?>
                                                                        <p class="text-danger"><?= $_SESSION['errors']['ngay_sinh'] ?></p>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="">Email</label>
                                                                    <input name="email" type="email" class="form-control" id="email" placeholder="Nhập email">
                                                                    <?php if (isset($_SESSION['errors']['email'])) { ?>
                                                                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                                                    <?php } ?>
                                                                </div>

                                                                <div class="form-group col-6">
                                                                    <label for="">Số điện thoại</label>
                                                                    <input name="so_dien_thoai" type="number" class="form-control" id="so_dien_thoai" placeholder="Nhập số điện thaoij">
                                                                    <?php if (isset($_SESSION['errors']['so_dien_thoai'])) { ?>
                                                                        <p class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?></p>
                                                                    <?php } ?>
                                                                </div>

                                                                <div class="form-group col-6">
                                                                    <label for="">Chọn giới tính</label>
                                                                    <select name="gioi_tinh" id="" class="form-control">
                                                                        <option selected disabled value="">-- Chọn giới tính</option>
                                                                        <option value="1">Nữ</option>
                                                                        <option value="2">Nam</option>
                                                                    </select>
                                                                    <?php if (isset($_SESSION['errors']['gioi_tinh'])) { ?>
                                                                        <p class="text-danger"><?= $_SESSION['errors']['gioi_tinh'] ?></p>
                                                                    <?php } ?>
                                                                </div>

                                                                <div class="form-group col-6">
                                                                    <label for="">Mật khẩu</label>
                                                                    <input name="mat_khau" type="text" class="form-control" id="mat_khau" placeholder="Nhập mật nhẩu">
                                                                    <?php if (isset($_SESSION['errors']['mat_khau'])) { ?>
                                                                        <p class="text-danger"><?= $_SESSION['errors']['mat_khau'] ?></p>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label for="">Địa chỉ</label>
                                                                    <input name="dia_chi" type="text" class="form-control" id="dia_chi" placeholder="Đại chỉ">
                                                                    <?php if (isset($_SESSION['errors']['dia_chi'])) { ?>
                                                                        <p class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?></p>
                                                                    <?php } ?>
                                                                </div>



                                                            </div>
                                                            <!-- /.card-body -->

                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div><!-- #main-content -->
        </div>


    </div>

    <!-- Back Top button -->


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
</body>

<!-- Mirrored from caketheme.com/html/ruper/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:54:16 GMT -->

</html>