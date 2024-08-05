<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:47 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Grid | Ruper</title>

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

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/responsive.css" type="text/css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=swap" rel="stylesheet">
</head>

<body class="home home-4 title-4">
    <div id="page" class="hfeed page-wrapper">
        <?php
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            require_once './views/layouts/partials/headerdangnhap.php';
        } else {
            require_once './views/layouts/partials/header.php';
        }
        ?>

        <div id="site-main" class="site-main">
            <div id="main-content" class="main-content">
                <div id="primary" class="content-area">
                    <div id="content" class="site-content" role="main">
                        <?php require_once './views/home/partials/slider.php' ?>
                        <?php require_once './views/home/partials/danhsach.php' ?>
                       
                        <?php require_once './views/home/partials/baiviet.php' ?>
                        <?php require_once './views/home/partials/khampha.php' ?>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div><!-- #main-content -->
        </div>

        <?php require_once './views/layouts/partials/footer.php'; ?>
    </div>

    <?php require_once './views/layouts/partials/modal.php'; ?>

    <!-- Dependency Scripts -->
    <script src="<?= BASE_URL ?>assets/ruper/libs/popper/js/popper.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/jquery/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/slick/js/slick.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/countdown/js/jquery.countdown.min.js"></script>
    <script src="<?= BASE_URL ?>assets/ruper/libs/mmenu/js/jquery.mmenu.all.min.js"></script>

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

<!-- Mirrored from caketheme.com/html/ruper/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:49 GMT -->

</html>