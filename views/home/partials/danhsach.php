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