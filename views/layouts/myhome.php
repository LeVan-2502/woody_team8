
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
							<section class="section section-padding m-b-60">
								<div class="section-container">
									<div class="section-row">
										<div class="section-column left sm-m-b">
											<div class="block-widget-wrap">
												<!-- Block Sliders -->
												<div class="block block-sliders layout-4 auto-height">
													<div class="slick-sliders" data-autoplay="true" data-dots="true" data-nav="false" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns1440="1" data-columns="1">
														<div class="item slick-slide">
															<div class="item-content">
																<div class="content-image">
																	<img width="691" height="713" src="<?= BASE_URL ?>assets/ruper/media/slider/10.jpg" alt="Image Slider">
																</div>
																<div class="item-info horizontal-start vertical-bottom animation-top">
																	<div class="content">
																		<h2 class="title-slider">Office Collection</h2>
																		<a class="button-slider btn-underline" href="shop-grid-left.html">Shop Collection</a>
																	</div>
																</div>
															</div>
														</div>
														<div class="item slick-slide">
															<div class="item-content">
																<div class="content-image">
																	<img width="691" height="713" src="<?= BASE_URL ?>assets/ruper/media/slider/11.jpg" alt="Image Slider">
																</div>
																<div class="item-info horizontal-start vertical-bottom animation-top">
																	<div class="content">
																		<h2 class="title-slider">Best Sellers</h2>
																		<a class="button-slider btn-underline" href="shop-grid-left.html">Shop Collection</a>
																	</div>
																</div>
															</div>
														</div>
														<div class="item slick-slide">
															<div class="item-content">
																<div class="content-image">
																	<img width="691" height="713" src="<?= BASE_URL ?>assets/ruper/media/slider/12.jpg" alt="Image Slider">
																</div>
																<div class="item-info horizontal-start vertical-bottom animation-top">
																	<div class="content">
																		<h2 class="title-slider">New Arrivals</h2>
																		<a class="button-slider btn-underline" href="shop-grid-left.html">Shop Collection</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="section-column right">
											<div class="block-widget-wrap">
												<!-- Block Banners -->
												<div class="block block-banners layout-5 banners-effect">
													<div class="block-widget-banner layout-6 m-b-15">
														<div class="bg-banner">
															<div class="banner-wrapper banners">
																<div class="banner-image">
																	<a href="shop-grid-left.html">
																		<img width="707" height="349" src="<?= BASE_URL ?>assets/ruper/media/banner/banner-9.jpg" alt="Banner Image">
																	</a>
																</div>
																<div class="banner-wrapper-infor">
																	<div class="info">
																		<div class="content">
																			<a class="link-title" href="shop-grid-left.html">
																				<h3 class="title-banner">Storage</h3>
																			</a>
																			<div class="banner-image-description">
																				Crisp, Clean Dining Room Designs <br>for Every Taste
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="block-widget-banner layout-6">
														<div class="bg-banner">
															<div class="banner-wrapper banners">
																<div class="banner-image">
																	<a href="shop-grid-left.html">
																		<img width="707" height="349" src="<?= BASE_URL ?>assets/ruper/media/banner/banner-10.jpg" alt="Banner Image">
																	</a>
																</div>
																<div class="banner-wrapper-infor right">
																	<div class="info">
																		<div class="content">
																			<a class="link-title" href="shop-grid-left.html">
																				<h3 class="title-banner">Lighting</h3>
																			</a>
																			<div class="banner-image-description">
																				Bring some light to your life with our<br> lighting designs
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
									</div>
								</div>
							</section>

                            <section class="section section-padding">
                            <div class="section-container">
                                <!-- Block Products -->
                                <div class="block block-products">
                                    <div class="block-widget-wrap">
                                        <ul class="nav nav-tabs layout-2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#top-rating" role="tab" aria-selected="false">SẢN PHẨM BÁN CHẠY</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="tab" href="#best-selling" role="tab" aria-selected="true">SẢN PHẨM XEM NHIỀU NHẤT</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab" href="#featured" role="tab" aria-selected="false">SẢM PHẨM MỚI </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade" id="top-rating" role="tabpanel">
                                                <div class="products-list grid">
                                                    <div class="row">
                                                        <?php foreach ($top8BanChay as $sp) : ?>
                                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                                <div class="items">
                                                                    <div class="products-entry clearfix product-wapper">
                                                                        <div class="products-thumb">
                                                                            <div class="product-lable">
                                                                                <div class="hot">Hot</div>
                                                                            </div>
                                                                            <div class="product-thumb-hover">
                                                                                <a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=' . $sp['san_pham_id'] ?>">
                                                                                    <img width="600" height="600" src="<?= $sp['hinh_anh'] ?>" class="post-image" alt="">
                                                                                    <img width="600" height="600" src="<?= $sp['hinh_anh'] ?>" class="hover-image back" alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="product-button">
                                                                                <div class="btn-add-to-cart" data-title="Add to cart">
                                                                                    <a rel="nofollow" href="<?= BASE_URL . '?act=add-giohang&san_pham_id=' . $sp['san_pham_id'] ?>" class="product-btn button">Thêm vào giỏ hàng</a>
                                                                                </div>
                                                                                <div class="btn-wishlist" data-title="Wishlist">
                                                                                    <button class="product-btn">Thêm vào yêu thích</button>
                                                                                </div>
                                                                                <div class="btn-compare" data-title="Compare">
                                                                                    <button class="product-btn">Sản phẩm liên quan</button>
                                                                                </div>
                                                                                <span class="product-quickview" data-title="Quick View">
                                                                                    <a href="#" class="quickview quickview-button">Chi tiết <i class="icon-search"></i></a>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="products-content">
                                                                            <div class="contents text-center">
                                                                                <h3 class="product-title"><a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=' . $sp['san_pham_id'] ?>"><?= $sp['ten_san_pham'] ?></a></h3>
                                                                                <span class="price">$<?= $sp['gia_san_pham'] ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="tab-pane fade active show" id="best-selling" role="tabpanel">
                                                <div class="products-list grid">
                                                    <div class="row">
                                                        <?php foreach ($top8Xem as $sp) : ?>
                                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                                <div class="items">
                                                                    <div class="products-entry clearfix product-wapper">
                                                                        <div class="products-thumb">
                                                                            <div class="product-lable">
                                                                                <div class="hot">Hot</div>
                                                                            </div>
                                                                            <div class="product-thumb-hover">
                                                                                <a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=' . $sp['san_pham_id'] ?>">
                                                                                    <img width="600" height="600" src="<?= $sp['hinh_anh'] ?>" class="post-image" alt="">
                                                                                    <img width="600" height="600" src="<?= $sp['hinh_anh'] ?>" class="hover-image back" alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="product-button">
                                                                                <div class="btn-add-to-cart" data-title="Add to cart">
                                                                                    <a rel="nofollow" href="<?= BASE_URL . '?act=add-giohang&san_pham_id=' . $sp['san_pham_id'] ?>" class="product-btn button">Thêm vào giỏ hàng</a>
                                                                                </div>
                                                                                <div class="btn-wishlist" data-title="Wishlist">
                                                                                    <button class="product-btn">Thêm vào yêu thích</button>
                                                                                </div>
                                                                                <div class="btn-compare" data-title="Compare">
                                                                                    <button class="product-btn">Sản phẩm liên quan</button>
                                                                                </div>
                                                                                <span class="product-quickview" data-title="Quick View">
                                                                                    <a href="#" class="quickview quickview-button">Chi tiết <i class="icon-search"></i></a>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="products-content">
                                                                            <div class="contents text-center">
                                                                                <h3 class="product-title"><a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=' . $sp['san_pham_id'] ?>"><?= $sp['ten_san_pham'] ?></a></h3>
                                                                                <span class="price">$<?= $sp['gia_san_pham'] ?> ID <?= $sp['san_pham_id'] ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="tab-pane fade " id="featured" role="tabpanel">
                                                <div class="products-list grid">
                                                    <div class="row">
                                                        <?php foreach ($top8Moi as $sp) : ?>
                                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                                <div class="items">
                                                                    <div class="products-entry clearfix product-wapper">
                                                                        <div class="products-thumb">
                                                                            <div class="product-lable">
                                                                                <div class="hot">Hot</div>
                                                                            </div>
                                                                            <div class="product-thumb-hover">
                                                                                <a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=' . $sp['san_pham_id'] ?>">
                                                                                    <img width="600" height="600" src="<?= $sp['hinh_anh'] ?>" class="post-image" alt="">
                                                                                    <img width="600" height="600" src="<?= $sp['hinh_anh'] ?>" class="hover-image back" alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="product-button">
                                                                                <div class="btn-add-to-cart" data-title="Add to cart">
                                                                                    <a rel="nofollow" href="<?= BASE_URL . '?act=add-giohang&san_pham_id=' . $sp['san_pham_id'] ?>" class="product-btn button">Thêm vào giỏ hàng</a>
                                                                                </div>
                                                                                <div class="btn-wishlist" data-title="Wishlist">
                                                                                    <button class="product-btn">Thêm vào yêu thích</button>
                                                                                </div>
                                                                                <div class="btn-compare" data-title="Compare">
                                                                                    <button class="product-btn">Sản phẩm liên quan</button>
                                                                                </div>
                                                                                <span class="product-quickview" data-title="Quick View">
                                                                                    <a href="#" class="quickview quickview-button">Chi tiết <i class="icon-search"></i></a>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="products-content">
                                                                            <div class="contents text-center">
                                                                                <h3 class="product-title"><a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=' . $sp['san_pham_id'] ?>"><?= $sp['ten_san_pham'] ?></a></h3>
                                                                                <span class="price">$<?= $sp['gia_san_pham'] ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>



                        <section class="section section-padding m-b-70">
                            <div class="section-container">
                                <div class="block-widget-wrap">
                                    <!-- Block Lookbook -->
                                    <div class="block block-lookbook no-space color-white">
                                        <div class="background-overlay background-2"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="lookbook-wrap default">
                                                    <div class="lookbook-container">
                                                        <div class="lookbook-content">
                                                            <div class="item">
                                                                <img width="703" height="702" src="<?= BASE_URL ?>assets/ruper/media/banner/lookbook-7.jpg" alt="Look Book 1">
                                                                <div class="item-lookbook" style="height:30px;width:30px;left:19.63%;top:82.62%">
                                                                    <span class="number-lookbook">1</span>
                                                                    <div class="content-lookbook" style="left:33px;bottom:10px;">
                                                                        <div class="item-thumb">
                                                                            <a href="shop-details.html">
                                                                                <img width="1000" height="1000" src="<?= BASE_URL ?>assets/ruper/media/product/1.jpg" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="content-lookbook-bottom">
                                                                            <div class="item-title">
                                                                                <a href="shop-details.html">Zunkel Schwarz</a>
                                                                            </div>
                                                                            <span class="price">
                                                                                <del aria-hidden="true"><span>$150.00</span></del>
                                                                                <ins><span>$100.00</span></ins>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="item-lookbook" style="height:30px;width:30px;left:83.91%;top:74.79%">
                                                                    <span class="number-lookbook">2</span>
                                                                    <div class="content-lookbook" style="right:33px;bottom:10px;">
                                                                        <div class="item-thumb">
                                                                            <a href="shop-details.html">
                                                                                <img width="1000" height="1000" src="<?= BASE_URL ?>assets/ruper/media/product/12.jpg" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="content-lookbook-bottom">
                                                                            <div class="item-title">
                                                                                <a href="shop-details.html">Mundo Sofa With Cushion</a>
                                                                            </div>
                                                                            <span class="price">$150.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="lookbook-intro-wrap position-center text-center">
                                                    <div class="lookbook-intro">
                                                        <h4 class="sub-title">Discover the new Koti Sofa</h4>
                                                        <h2 class="title">Like lounging on<br> a cloud</h2>
                                                        <a href="shop-grid-left.html" class="button button-white">SHOP NOW</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="section section-padding m-b-70">
                            <div class="section-container">
                                <!-- Block Posts -->
                                <div class="block block-posts layout-2">
                                    <div class="block-widget-wrap">
                                        <div class="block-title">
                                            <h2>Our Blog</h2>
                                            <div class="sub-title">Shop living room furniture, crafted by designers all over the world</div>
                                        </div>
                                        <div class="block-content">
                                            <div class="posts-wrap slick-wrap"><i class="slick-arrow fa fa-angle-left"></i>
                                                <div class="slick-sliders slick-initialized slick-slider" data-slidestoscroll="true" data-dots="0" data-nav="1" data-columns4="1" data-columns3="2" data-columns2="2" data-columns1="3" data-columns="3"><i class="slick-arrow fa fa-angle-left"></i>




                                                    <div class="slick-list draggable">
                                                        <div class="slick-track" style="opacity: 1; width: 5280px; transform: translate3d(-1440px, 0px, 0px);">
                                                            <div class="post-grid post slick-slide slick-cloned" style="width: 480px;" tabindex="-1" data-slick-index="-3" id="" aria-hidden="true">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="-1">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/2.jpg" alt="How to Make your Home a Showplace">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="-1">Home Decor</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="-1">How to Make your Home a Showplace</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="-1">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-grid post slick-slide slick-cloned" style="width: 480px;" tabindex="-1" data-slick-index="-2" id="" aria-hidden="true">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="-1">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/3.jpg" alt="Stunning Furniture with Aesthetic Appeal">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="-1">Life Style</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="-1">Stunning Furniture with Aesthetic Appeal</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="-1">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-grid post slick-slide slick-cloned" style="width: 480px;" tabindex="-1" data-slick-index="-1" id="" aria-hidden="true">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="-1">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/4.jpg" alt="How to Choose the Right Sectional Sofa">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="-1">Office</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="-1">How to Choose the Right Sectional Sofa</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="-1">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-grid post slick-slide slick-current slick-active" style="width: 480px;" tabindex="0" data-slick-index="0" aria-hidden="false">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="0">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/1.jpg" alt="Easy Fixes for Home Decor">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="0">Furniture</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="0">Easy Fixes for Home Decor</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="0">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-grid post slick-slide slick-active" style="width: 480px;" tabindex="0" data-slick-index="1" aria-hidden="false">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="0">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/2.jpg" alt="How to Make your Home a Showplace">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="0">Home Decor</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="0">How to Make your Home a Showplace</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="0">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-grid post slick-slide slick-active" style="width: 480px;" tabindex="0" data-slick-index="2" aria-hidden="false">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="0">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/3.jpg" alt="Stunning Furniture with Aesthetic Appeal">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="0">Life Style</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="0">Stunning Furniture with Aesthetic Appeal</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="0">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-grid post slick-slide" style="width: 480px;" tabindex="-1" data-slick-index="3" aria-hidden="true">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="-1">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/4.jpg" alt="How to Choose the Right Sectional Sofa">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="-1">Office</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="-1">How to Choose the Right Sectional Sofa</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="-1">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-grid post slick-slide slick-cloned" style="width: 480px;" tabindex="-1" data-slick-index="4" id="" aria-hidden="true">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="-1">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/1.jpg" alt="Easy Fixes for Home Decor">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="-1">Furniture</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="-1">Easy Fixes for Home Decor</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="-1">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-grid post slick-slide slick-cloned" style="width: 480px;" tabindex="-1" data-slick-index="5" id="" aria-hidden="true">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="-1">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/2.jpg" alt="How to Make your Home a Showplace">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="-1">Home Decor</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="-1">How to Make your Home a Showplace</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="-1">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-grid post slick-slide slick-cloned" style="width: 480px;" tabindex="-1" data-slick-index="6" id="" aria-hidden="true">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="-1">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/3.jpg" alt="Stunning Furniture with Aesthetic Appeal">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="-1">Life Style</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="-1">Stunning Furniture with Aesthetic Appeal</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="-1">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-grid post slick-slide slick-cloned" style="width: 480px;" tabindex="-1" data-slick-index="7" id="" aria-hidden="true">
                                                                <div class="post-inner">
                                                                    <div class="post-image">
                                                                        <a class="post-thumbnail" href="blog-details-right.html" tabindex="-1">
                                                                            <img width="720" height="484" src="<?= BASE_URL ?>assets/ruper/media/blog/4.jpg" alt="How to Choose the Right Sectional Sofa">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-categories">
                                                                            <a href="blog-grid-right.html" tabindex="-1">Office</a>
                                                                        </div>
                                                                        <h2 class="post-title">
                                                                            <a href="blog-details-right.html" tabindex="-1">How to Choose the Right Sectional Sofa</a>
                                                                        </h2>
                                                                        <div class="btn-read-more">
                                                                            <a class="read-more btn-underline center" href="blog-details-right.html" tabindex="-1">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><i class="slick-arrow fa fa-angle-right"></i>
                                                </div>
                                                <i class="slick-arrow fa fa-angle-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
		(function () {
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
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

<!-- Mirrored from caketheme.com/html/ruper/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:49 GMT -->
</html>