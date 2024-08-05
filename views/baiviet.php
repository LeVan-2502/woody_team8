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

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/responsive.css" type="text/css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=swap" rel="stylesheet">
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
                                    Blog Woody
                                </h1>
                            </div>
                            <div class="breadcrumbs">
                                <a href="">Trang chủ</a><span class="delimiter"></span> Blog Woody
                            </div>
                        </div>
                    </div>

                    <div id="content" class="site-content" role="main">
                        <div class="section-padding">
                            <div class="section-container p-l-r">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-12 sidebar left-sidebar md-b-50">
                                        <!-- Block Post Search -->


                                        <!-- Block Post Categories -->
                                        <div class="block block-post-cats">
                                            <div class="block-title">
                                                <h2>Danh mục</h2>
                                            </div>
                                            <div class="block-content">
                                                <div class="post-cats-list">
                                                    <ul>
                                                        <?php foreach ($countSanPhamDanhMuc as $dm) : ?>
                                                            <li class="current">
                                                                <a href="<?= BASE_URL . '?act=listbaiviet-bydanhmuc&id_danh_muc=' . $dm['id'] ?>"><?= $dm['ten_danh_muc'] ?><span class="count"><?= $dm['so_bai_viet'] ?></span></a>
                                                            </li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Block Posts -->
                                        <div class="block block-posts">
                                            <div class="block-title">
                                                <h2>Bài viết gần đây</h2>
                                            </div>
                                            <div class="block-content">
                                                <ul class="posts-list">
                                                    <?php foreach ($bonBaiVietGanDay as $bv) : ?>
                                                        <li class="post-item">
                                                            <a href="<?= BASE_URL . '?act=chitiet-baiviet&id_bai_viet='.$bv['id']?>" class="post-image">
                                                                <img src="<?= $bv['hinh_anh'] ?>">
                                                            </a>
                                                            <div class="post-content">
                                                                <h2 class="post-title">
                                                                    <a href="<?= BASE_URL . '?act=chitiet-baiviet&id_bai_viet='.$bv['id']?>">
                                                                        <?= $bv['tieu_de'] ?>
                                                                    </a>
                                                                </h2>
                                                                <div class="post-time">
                                                                    <span class=""><?= $bv['ngay_dinh_dang'] ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php endforeach ?>

                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Block Post Archives -->


                                        <!-- Block Post Tags -->
                                        <div class="block block-post-tags">
                                            <div class="block-title">
                                                <h2>Tags</h2>
                                            </div>
                                            <div class="block-content">
                                                <div class="post-tags-list">
                                                    <ul>
                                                        <?php foreach ($listAllTag as $tag) : ?>
                                                            <li>
                                                                <a href="<?= BASE_URL . '?act=listbaiviet-bytag&id_tag=' . $tag['id'] ?>"><?= $tag['ten_tag'] ?></a>
                                                            </li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-9 col-lg-9 col-md-12 col-12">
                                        <div class="posts-list grid">
                                            <div class="row">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="layout-grid" role="tabpanel">
                                                        <div class="row ml-1 mb-3">
                                                            <strong class="mr-3" style="font-size: 1.5rem;">Danh sách bài viết <span style="font-weight: 400; font-size:1.25rem;"><?=$title?></span>
                                                            </strong>
                                                        </div>
                                                        <div id="dataContainer" class="products-list grid row">

                                                            <!-- Các bài viết sẽ được thêm vào đây -->
                                                        </div>
                                                    </div>
                                                    <nav id="demo-pagination" class="pagination">
                                                        <ul style="display: flex; justify-content:center;" class="page-numbers">
                                                            <li><a class="prev page-numbers" href="#" onclick="prevPage()">Trước</a></li>
                                                            <div id="page-numbers">
                                                                <!-- Các liên kết phân trang sẽ được thêm vào đây -->
                                                            </div>
                                                            <li><a class="next page-numbers" href="#" onclick="nextPage()">Tiếp</a></li>
                                                        </ul>
                                                    </nav>
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