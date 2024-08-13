<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/blog-details-fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:54:16 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Details - No Sidebar | Ruper</title>

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
       body{
        background-color: #f5f5f5;
       }
        #content {
            width: 70%;
            margin: 0 auto;
            /* Canh giữa phần tử */
        }

        /* Căn giữa phần tử chứa ảnh avatar và thông tin */
        .comment-item {
            display: flex;
            align-items: center;
            /* Căn giữa dọc */
            justify-content: center;
            /* Căn giữa ngang */
        }

        /* Định dạng avatar hình tròn */
        .comment-avatar {
            margin-right: 10px;
            /* Khoảng cách giữa ảnh và nội dung */
        }

        .comment-avatar .avatar {
            border-radius: 50%;
            /* Tạo hình tròn cho ảnh */
            object-fit: cover;
            /* Đảm bảo ảnh không bị kéo dãn */
        }

        /* Căn giữa văn bản */
        .comment-content-wrap {
            display: flex;
            flex-direction: column;
            /* Hiển thị các phần tử theo cột */
            justify-content: center;
            /* Căn giữa dọc trong phần tử */
        }

        /* Định dạng tiêu đề và ngày tháng */
        .post-categories,
        .post-time {
            display: block;
            text-align: center;
            /* Căn giữa văn bản trong phần tử */
        }

        

        /* Tùy chỉnh thêm cho tiêu đề và ngày tháng */
        .post-categories a,
        .comment-author {
            color: #333;
            /* Màu văn bản */
            text-decoration: none;
            /* Bỏ gạch chân */
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

        <div id="site-main" class="site-main">
            <div id="main-content" class="main-content">
                <div id="primary" class="content-area">
                    <div id="title" class="page-title">
                        <div class="section-container">
                            <div class="content-title-heading">
                                <h1 class="text-title-heading">
                                    <?= $chiTietBaiViet['tieu_de']; ?>
                                </h1>
                            </div>
                            <div class="breadcrumbs">
                                <a href="index.html">Home</a><span class="delimiter"></span> <?= $chiTietBaiViet['tieu_de']; ?>
                            </div>
                        </div>
                    </div>

                    <div id="content" class="site-content" role="main">
                        <div class="section-padding">
                            <div class="section-container p-l-r">
                                <div class="post-details no-sidebar">
                                    <div class="post-image">
                                        <img src="<?= $chiTietBaiViet['hinh_anh']; ?>" alt="">
                                    </div>
                                    <h2 class="post-title text-center">
                                        <?= $chiTietBaiViet['tieu_de']; ?>
                                    </h2>
                                    <div class="post-meta">

                                        <span class="post-categories"><i class="icon_clock_alt"></i> <a href="blog-grid-right.html"> <?= $chiTietBaiViet['ngay_dinh_dang']; ?></a></span>
                                        <span class="post-time">
                                            <div class="comment-item align-center">
                                                <span class="comment-avatar">
                                                    <img alt="" src="<?= $chiTietBaiViet['anh_dai_dien'] ?>" class="avatar" height="32" width="32">
                                                </span>
                                                <span class="comment-content-wrap">
                                                    <span class="comment-author">
                                                    <?= $chiTietBaiViet['ho_ten']; ?>
                                                    </span>

                                                </span>
                                            </div>
                                        </span>
                                        <i class="icon_folder-alt"></i><?= $chiTietBaiViet['ten_danh_muc']; ?>
                                    </div>
                                    <div class="post-content clearfix">
                                        <?= $chiTietBaiViet['noi_dung']; ?>
                                    </div>
                                    <div class="post-content-entry">
                                        <div class="tags-links">
                                            <label>Tags :</label> 
                                           
                                            <?php foreach($listTagBV as $tag):?>
                                            <a href="blog-grid-right.html" rel="tag"><?= $tag['ten_tag']; ?></a>
                                                <?php endforeach?>
                                        </div>
                                        <div class="entry-social-share">
                                            <label>Share :</label>
                                            <div class="social-share">
                                                <a href="#" title="Facebook" class="share-facebook" target="_blank"><i class="fa fa-facebook"></i>Facebook</a>
                                                <a href="#" title="Twitter" class="share-twitter"><i class="fa fa-twitter"></i>Twitter</a>
                                                <a href="#" title="Pinterest" class="share-pinterest"><i class="fa fa-pinterest"></i>Pinterest</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prev-next-post">
                                        <div class="previous-post">
                                            <a href="blog-details-right.html" rel="prev">
                                                <div class="hover-extend active"><span>Previous</span></div>
                                                <h2 class="title">How to Make your Home a Showplace</h2>
                                            </a>
                                        </div>
                                        <div class="next-post">
                                            <a href="blog-details-right.html" rel="next">
                                                <div class="hover-extend active"><span>Next</span></div>
                                                <h2 class="title">Stunning Furniture with Aesthetic Appeal</h2>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="comments" class="comments-area">
                                        <h3 class="comments-title">1 Bình luận</h3>
                                        <div class="comments-list">
                                            <div class="comment-item">
                                                <div class="comment-avatar">
                                                    <img alt="" src="<?= BASE_URL ?>assets/ruper/media/user.jpg" class="avatar" height="70" width="70">
                                                </div>
                                                <div class="comment-content-wrap">
                                                    <div class="comment-author">
                                                        Peter Capidal
                                                    </div>
                                                    <div class="comment-time">
                                                        June 15, 2022
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                                    </div>
                                                    <a class="comment-reply-link" href="#">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-form">
                                            <div class="form-header">
                                                <h3>Bình luận bài viết</h3>
                                            </div>
                                            <form action="#" method="post" class="row" novalidate="">
                                                
                                                <div class="form-group col-md-12 col-sm-12">
                                                    <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Nhập nội dung" class="form-control bg-white"></textarea>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <input id="author" placeholder="Tên của bạn *" name="author" type="text" value="" size="30" class="form-control bg-white">
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <input id="email" placeholder="Email *" name="email" type="text" value="" size="30" class="form-control bg-white">
                                                </div>
                                               
                                                <div class="form-group col-md-12">
                                                    <input name="submit" type="submit" id="submit" class="btn button-outline" value="Gửi bình luận">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<!-- Mirrored from caketheme.com/html/ruper/blog-details-fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:54:16 GMT -->

</html>