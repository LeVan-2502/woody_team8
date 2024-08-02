 <!-- Back Top button -->
 

 <!-- Search -->
 <div class="search-overlay">
     <div class="close-search"></div>
     <div class="wrapper-search">
         <form role="search" method="get" class="search-from ajax-search" action="">
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