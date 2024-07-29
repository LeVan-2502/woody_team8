<section class="section section-padding m-b-60">
    <div class="section-container">
        <div class="section-row">
            <div class="section-column left sm-m-b">
                <div class="block-widget-wrap">
                    <!-- Block Sliders -->
                    <div class="block block-sliders layout-4 auto-height">
                        <div class="slick-sliders" data-autoplay="true" data-dots="true" data-nav="false" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns1440="1" data-columns="1">
                            <?php foreach ($listSlider as $item) : ?>
                                <div class="item slick-slide">
                                    <div class="item-content">
                                        <div class="content-image">
                                            <img width="713" height="713" src="<?= BASE_URL.$item['hinh_anh'] ?>" alt="Image Slider">
                                        </div>
                                        <div class="item-info horizontal-start vertical-bottom animation-top">
                                            <div class="content">
                                                <h2 class="title-slider"><?=$item['tieu_de']?></h2>
                                                <a class="button-slider btn-underline" href="<?= BASE_URL.'?act=listsanpham'?>">Mua hàng ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-column right">
                <div class="block-widget-wrap">
                    <!-- Block Banners -->
                    <div class="block block-banners layout-5 banners-effect">
                    <?php foreach ($listBanner as $item) : ?>
                        <div class="block-widget-banner layout-6 m-b-15">
                            <div class="bg-banner">
                                <div class="banner-wrapper banners">
                                    <div class="banner-image">
                                        <a href="shop-grid-left.html">
                                            <img width="707" height="340" src="<?= BASE_URL.$item['hinh_anh'] ?>" alt="Banner Image">
                                        </a>
                                    </div>
                                    <div class="banner-wrapper-infor">
                                        <div class="info">
                                            <div class="content">
                                                <a class="link-title" href="shop-grid-left.html">
                                                    <h3 class="title-banner"><?=$item['tieu_de']?></h3>
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
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>