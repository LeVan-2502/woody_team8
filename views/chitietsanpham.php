<?php
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from caketheme.com/html/ruper/shop-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:37 GMT -->

<head>
	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shop Details | Ruper</title>

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
									<?= $chiTietSanPham['ten_san_pham'] ?>
								</h1>
							</div>
							<div class="breadcrumbs">
								<a href="<?= BASE_URL ?>?act=home">Trang chủ</a><span class="delimiter"></span>
								<a href="<?= BASE_URL ?>?act=listsanpham">Mua sản phẩm</a><span class="delimiter"></span><?= $chiTietSanPham['ten_san_pham'] ?>
							</div>
						</div>
					</div>

					<div id="content" class="site-content" role="main">
						<div class="shop-details zoom" data-product_layout_thumb="scroll" data-zoom_scroll="true" data-zoom_contain_lens="true" data-zoomtype="inner" data-lenssize="200" data-lensshape="square" data-lensborder="" data-bordersize="2" data-bordercolour="#f9b61e" data-popup="false">
							<div class="product-top-info">
								<div class="section-padding">
									<div class="section-container p-l-r">
										<div class="row">
											<div class="product-images col-lg-7 col-md-12 col-12">
												<div class="row">
													<div class="col-md-2">
														<div class="content-thumbnail-scroll">
															<div class="image-thumbnail slick-carousel slick-vertical" data-asnavfor=".image-additional" data-centermode="true" data-focusonselect="true" data-columns4="5" data-columns3="4" data-columns2="4" data-columns1="4" data-columns="4" data-nav="true" data-vertical="&quot;true&quot;" data-verticalswiping="&quot;true&quot;">
																<?php foreach ($listAnh as $anh) : ?>
																	<div class="img-item slick-slide">
																		<span class="img-thumbnail-scroll">
																			<img width="600" height="600" src="<?= $anh['link_hinh_anh'] ?>" alt="">
																		</span>
																	</div>
																<?php endforeach ?>
															</div>
														</div>
													</div>
													<div class="col-md-10">
														<div class="scroll-image main-image">
															<div class="image-additional slick-carousel" data-asnavfor=".image-thumbnail" data-fade="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
																<?php foreach ($listAnh as $anh) : ?>
																	<div class="img-item slick-slide">
																		<span class="img-thumbnail-scroll">
																			<img width="600" height="600" src="<?= $anh['link_hinh_anh'] ?>" alt="">
																		</span>
																	</div>
																<?php endforeach ?>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="product-info col-lg-5 col-md-12 col-12 ">
												<h1 class="title"><?= $chiTietSanPham['ten_san_pham'] ?></h1>
												
												<span class="price">
													
													<del aria-hidden="true">
														<span><?= number_format($chiTietSanPham['gia_san_pham']) ?> VND</span>
													</del>
													<ins>
														<span><?= number_format($chiTietSanPham['gia_khuyen_mai']) ?> VND</span>
													</ins>
												</span>
												

												<!-- Mô tả -->
												<div class="description">
													<p><?= $chiTietSanPham['mo_ta'] ?></p>
												</div>


												<div class="buttons">
													<form action="<?= BASE_URL . '?act=add-giohang&san_pham_id=' .  $chiTietSanPham['id'] ?>" method="post">
														<input type="hidden" name="id" value="<?= $chiTietSanPham['id'] ?>">
														<div class="add-to-cart-wrap">
															<div class="quantity">
																<button type="button" class="plus">+</button>
																<input type="number" class="qty" step="1" min="0" max="<?= $chiTietSanPham['so_luong'] ?>" name="so_luong" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
																<button type="button" class="minus">-</button>
															</div>
															<?php
																// Kiểm tra trạng thái sản phẩm
																if ($chiTietSanPham['trang_thai'] === 1) {
																	// Hiển thị giá cũ và giá khuyến mãi nếu còn hàng
																	echo '<button class="btn btn-primary" type="submit">Thêm vào giỏ hàng</button>';
																} else {
																	// Hiển thị nút "Hết hàng" nếu hết hàng
																	echo '<button type="button" class="btn btn-danger">Hết hàng</button>';
																}
																?>

															

														</div>
													</form>
													<br>
													<!-- <div class="btn-wishlist" data-title="Wishlist">
														<button class="product-btn">Thêm vào yêu thich</button>
													</div>
													<div class="btn-compare" data-title="Compare">
														<button class="product-btn">Sản phẩm liên quan</button>
													</div> -->
												</div>
												<div class="product-meta">
													<span class="sku-wrapper">ID sản phẩm:  <span class="sku"><?= $chiTietSanPham['id'] ?></span></span>
													<span class="posted-in">Danh mục: <a href="shop-grid-left.html" rel="tag"><?= $chiTietSanPham['ten_danh_muc'] ?></a></span>

												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="product-tabs">
								<div class="section-padding">
									<div class="section-container p-l-r">
										<div class="product-tabs-wrap">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#description" role="tab">MÔ TẢ CHI TIẾT</a>
												</li>
												
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">BÌNH LUẬN SẢN PHẨM</a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane fade show active" id="description" role="tabpanel">
													<p><?= $chiTietSanPham['mo_ta'] ?></p>
												</div>
												<div class="tab-pane fade" id="additional-information" role="tabpanel">
													<table class="product-attributes">
														<tbody>
															<tr class="attribute-item">
																<th class="attribute-label">Color</th>
																<td class="attribute-value">Black, Blue, Green</td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="tab-pane fade" id="reviews" role="tabpanel">
													<div id="reviews" class="product-reviews">

														<div id="comments">
															<h2 class="reviews-title"><span><?= $chiTietSanPham['ten_san_pham'] ?></span></h2>
															<ol class="comment-list">
															
																<?php foreach ($binhLuan as $bl) : ?>
																	<li class="review">
																		<div class="content-comment-container">
																			<div class="comment-container">
																				<img src="<?= $bl['anh_dai_dien'] ?>" class="avatar" height="60" width="60" alt="">
																				<div class="comment-text">
																					<div class="rating small">
																						<div class="star star-5"></div>
																					</div>
																					<div class="review-author"><?= $bl['ho_ten'] ?></div>
																					<div class="review-time">January 12, 2022</div>
																				</div>
																			</div>
																			<div class="description">
																				<p><?= $bl['noi_dung'] ?></p>
																			</div>
																		</div>
																	</li>
																<?php endforeach ?>
															</ol>
														</div>

														<div id="review-form">
															<div id="respond" class="comment-respond">
																<span id="reply-title" class="comment-reply-title">Đánh giá sản phẩm</span>
																<form action="<?= BASE_URL . '?act=post-binhluan' ?>" method="post" id="comment-form" class="comment-form">
																	<input type="hidden" name="san_pham_id" value="<?= $chiTietSanPham['id'] ?>">
																	<input type="hidden" name="tai_khoan_id" value="<?= $user['id'] ?>">
																	<p class="comment-form-comment">
																		<textarea id="noi_dung" name="noi_dung" placeholder="Ý kiến của bạn về sản phẩm *" cols="45" rows="8" aria-required="true" required=""></textarea>
																	</p>
																	<?php if (isset($_SESSION['errors']['noi_dung'])) { ?>
																		<div class="text-danger"><?= $_SESSION['errors']['noi_dung'] ?></div>
																	<?php } ?>
																	<div class="content-info-reviews">
																		<p class="comment-form-author">
																			<input value="<?= $user['ho_ten'] ?>" id="ho_ten" name="ho_ten" placeholder="Tên người đăng  *" type="text" value="" size="30" aria-required="true" required="">
																		</p>
																		<?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
																			<div class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></div>
																		<?php } ?>
																		<p class="comment-form-email">
																			<input id="email" name="email" placeholder="Email *" type="email" value="<?= $user['email'] ?>" size="30" aria-required="true" required="">
																		</p>
																		<?php if (isset($_SESSION['errors']['email'])) { ?>
																			<div class="text-danger"><?= $_SESSION['errors']['email'] ?></div>
																		<?php } ?>
																		<p class="form-submit">
																			<input name="submit" type="submit" id="submit" class="submit" value="Submit">
																		</p>
																	</div>
																</form><!-- #respond -->
															</div>
														</div>
														<div class="clear"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="product-related">
								<div class="section-padding">
									<div class="section-container p-l-r">
										<div class="block block-products slider">
											<div class="block-title">
												<h2>SẢN PHẨM LIÊN QUAN</h2>
											</div>
											<div class="block-content">

												<div class="content-product-list slick-wrap">
													<div class="slick-sliders products-list grid" data-slidestoscroll="true" data-dots="false" data-nav="1" data-columns4="1" data-columns3="2" data-columns2="3" data-columns1="3" data-columns1440="4" data-columns="4">
														<?php foreach ($sanPhamLienQuan as $sp) : ?>
															<div class="item-product slick-slide">

																<div class="items">

																	<div class="products-entry clearfix product-wapper">
																		<div class="products-thumb">
																			<div class="product-lable">
																				<div class="hot">Hot</div>
																			</div>
																			<div class="product-thumb-hover">
																				<a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=0'.$sp['id']?>">
																					<img width="600" height="600" src="<?= $sp['hinh_anh'] ?>" alt="">

																				</a>
																			</div>
																			<div class="product-button">
																				<div class="btn-add-to-cart" data-title="Add to cart">

																					<a href="<?= BASE_URL . '?act=add-giohang&san_pham_id='.$sp['id'] ?>" class="added-to-cart product-btn" title="Thêm vào giỏ hàng" tabindex="0">Thêm vào giỏ hàng</a>
																				</div>
																				<span class="product-quickview" data-title="">
																					<a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=0'.$sp['id']?>" class="quickview quickview-button">Xem chi tiêt<i class="icon-search"></i></a>
																				</span>
																			</div>
																		</div>
																		<div class="products-content">
																			<div class="contents text-center">
																				<h3 class="product-title"><a href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=0'.$sp['id']?>"><?= $sp['ten_san_pham'] ?></a></h3>

																				<span class="price"><?= $sp['gia_san_pham'] ?></span>
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
	<script src="<?= BASE_URL ?>assets/ruper/libs/elevatezoom/js/jquery.elevatezoom.js"></script>

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
			$('a[class^="star-"]').click(function(e) {
				e.preventDefault();

				// Lấy giá trị rating từ class của link
				var danh_gia = $(this).attr('class').split('-')[1];
				var id = 1; // Thay đổi cho phù hợp với user thực tế
				var san_pham_id = $chiTietSanPham['id']; // Thay đổi cho phù hợp với sản phẩm thực tế

				$.ajax({
					url: 'ajax/submit_rating.php',
					type: 'POST',
					data: {
						id: id,
						san_pham_id: san_pham_id,
						danh_gia: danh_gia
					},
					success: function(response) {
						alert(response);
					},
					error: function(xhr, status, error) {
						console.error(xhr);
						alert('Có lỗi xảy ra khi gửi đánh giá.');
					}
				});
			});
		});
	</script>
</body>

<!-- Mirrored from caketheme.com/html/ruper/shop-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 00:53:38 GMT -->

</html>