<section class="section section-padding m-b-70">
    <div class="section-container">
        <!-- Block Posts -->
        <div class="block block-posts layout-2">
            <div class="block-widget-wrap">
                <div class="block-title">
                    <h2>Bài viết nổi bật</h2>
                    <div class="sub-title">Shop living room furniture, crafted by designers all over the world</div>
                </div>
                <div class="block-content">
                    <div class="posts-wrap slick-wrap">
                        <div class="slick-sliders slick-initialized slick-slider" data-slidestoscroll="true" data-dots="0" data-nav="1" data-columns4="1" data-columns3="2" data-columns2="2" data-columns1="3" data-columns="3"><i class="slick-arrow fa fa-angle-left"></i>

                            <div class="slick-list">
                                <div class="slick-track">
                                    <div class="post-grid row">
                                        <?php foreach ($top3BaiVietNoiBat as $item) : ?>
                                            <div class="post-inner col-4">
                                                <div class="post-image">
                                                    <a class="post-thumbnail" href="<?=BASE_URL . '?act=chitiet-baiviet&id_bai_viet='.$item['id']?>" tabindex="-1">
                                                        <img width="500px" src="<?= BASE_URL.$item['hinh_anh'] ?>" alt="How to Make your Home a Showplace">
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <div class="post-categories">
                                                        <a href="blog-grid-right.html" tabindex="-1"><?=$item['ten_danh_muc']?></a>
                                                    </div>
                                                    <h2 class="post-title">
                                                        <a href="<?=BASE_URL . '?act=chitiet-baiviet&id_bai_viet='.$item['id']?>" tabindex="-1"><?=$item['tieu_de']?></a>
                                                    </h2>
                                                    <div class="btn-read-more">
                                                        <a class="read-more btn-underline center" href="<?=BASE_URL . '?act=chitiet-baiviet&id_bai_viet='.$item['id']?>" tabindex="-1">Tìm hiểu thêm</a>
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
    </div>
</section>