<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/shop-grid-fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:54:15 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Grid - No Sidebar | Ruper</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css
">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/assets/css/responsive.css" type="text/css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=swap" rel="stylesheet">
</head>

<body class="shop">
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
                                    Bed &amp; Bath
                                </h1>
                            </div>
                            <div class="breadcrumbs">
                                <a href="index.html">Home</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Bed &amp; Bath
                            </div>
                        </div>
                    </div>

                    <div id="content" class="site-content" role="main">
                        <div class="section-padding">
                            <div class="section-container p-l-r">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">

                                        <div class="products-topbar clearfix row">
                                            <div class="col-3 products-topbar-left">
                                                <form class="d-flex" action="<?= BASE_URL . '?act=timkiem-sanpham' ?>" method="post">
                                                    <input type="text" name="tu_khoa" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                                                    <button type="submit" class="btn btn-primary ml-2">
                                                        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-7"></div>
                                            <div class="col-2 d-flex justify-content-end align-items-center">
                                                <!-- Phần lọc sản phẩm hiện tại -->
                                                <div class="products-sort dropdown">
                                                    <span class="sort-toggle dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Lọc sản phẩm</span>
                                                    <ul class="sort-list dropdown-menu" x-placement="bottom-start">
                                                        <li class="active"><a href="<?= BASE_URL . '?act=listsanpham' ?>">Tất cả các sản phẩm</a></li>
                                                        <li><a href="<?= BASE_URL . '?act=locsanpham-caothap' ?>">Theo giá từ thấp đến cao</a></li>
                                                        <li><a href="<?= BASE_URL . '?act=locsanpham-thapcao' ?>">Theo giá từ cao đến thấp</a></li>
                                                        <li><a href="<?= BASE_URL . '?act=locsanpham-moinhat' ?>">Sản phẩm mới nhất</a></li>
                                                        <li><a href="<?= BASE_URL . '?act=locsanpham-phobien' ?>">Sản phẩm phổ biến nhất</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="layout-grid" role="tabpanel">
                                                <div id="dataContainer" class="products-list grid row">

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
                        </div><!-- #content -->
                    </div><!-- #primary -->
                </div><!-- #main-content -->
            </div>

            <?php require_once './views/layouts/partials/footer.php' ?>
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

        <script src="<?= BASE_URL ?>assets/ruper/libs/countdown/js/jquery.countdown.min.js"></script>
        <script src="<?= BASE_URL ?>assets/ruper/libs/mmenu/js/jquery.mmenu.all.min.js"></script>
        <script src="<?= BASE_URL ?>assets/ruper/libs/slider/js/tmpl.js"></script>
        <script src="<?= BASE_URL ?>assets/ruper/libs/slider/js/jquery.dependClass-0.1.js"></script>
        <script src="<?= BASE_URL ?>assets/ruper/libs/slider/js/draggable-0.1.js"></script>
        <script src="<?= BASE_URL ?>assets/ruper/libs/slider/js/jquery.slider.js"></script>
        <script src="<?= BASE_URL ?>assets/ruper/libs/slick/js/slick.min.js"></script>
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/slick/css/slick.css" type="text/css">
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/ruper/libs/slick/css/slick-theme.css" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>

        <!-- Site Scripts -->
        <script src="<?= BASE_URL ?>assets/ruper/assets/js/app.js"></script>
        <!-- Code injected by live-server -->
        <script>
            const products = <?php echo $listSanPham; ?>;

            const pageSize = 12; // Số lượng sản phẩm trên mỗi trang
            let currentPage = 1; // Trang hiện tại

            function renderProducts() {
                const start = (currentPage - 1) * pageSize;
                const end = Math.min(start + pageSize, products.length);
                const dataContainer = document.getElementById('dataContainer');
                dataContainer.innerHTML = '';

                for (let i = start; i < end; i++) {
                    const product = products[i];
                    const productElement = ` <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="products-entry clearfix product-wapper">
                    <div class="products-thumb">
                        <div class="product-lable">
                            <div class="hot">Hot</div>
                        </div>
                        <div class="product-thumb-hover">
                            <a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=${product.id}' ?>">
                                <img width="600" height="600" src="${product.hinh_anh}" class="post-image" alt="">
                                <img width="600" height="600" src="${product.hinh_anh}" class="hover-image back" alt="">
                            </a>
                        </div>
                        <div class="product-button">
                            <div class="btn-add-to-cart" data-title="Add to cart">
                             <a href="${product.trang_thai === 1 ? '<?= BASE_URL . '?act=add-giohang&san_pham_id=' ?>' + product.id : '#'}" 
                               class="added-to-cart product-btn" 
                               title="${product.trang_thai === 1 ? 'View cart' : 'Unavailable'}" 
                               tabindex="0"
                               ${product.trang_thai !== 1 ? 'aria-disabled="true" style="pointer-events: none; opacity: 0.5;"' : ''}>
                                ${product.trang_thai === 1 ? 'View cart' : 'Unavailable'}
                            </a>
                            </div>
                            
                            <div class="btn-compare" data-title="Compare">
                                <button class="product-btn">Compare</button>
                            </div>
                           
                        </div>
                    </div>
                    <div class="products-content">
                        <div class="contents text-center">
                            <h3 class="product-title"><a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=${product.id}' ?>">${product.ten_san_pham}</a></h3>
                             ${product.trang_thai === 1 
                                ? `<span class="price"><del>${Number(product.gia_khuyen_mai).toLocaleString()} VND</del></span>
                                   <span class="price"><strong>${Number(product.gia_san_pham).toLocaleString()} VND</strong></span>`
                                : `<button class="btn btn-danger">Hết hàng</button>`
                            }
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
                    const pageElement = ` <li><a class="page-numbers ${currentPage === i ? 'active' : ''}" href="#" onclick="setPage(${i})">${i}</a></li>
        `;
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
                    setPage(currentPage + 1)
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


</body>

<!-- Mirrored from caketheme.com/html/ruper/shop-grid-fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:54:15 GMT -->

</html>