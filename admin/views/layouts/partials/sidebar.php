<?php
if(isset($_SESSION['admin'])) {
  $admin = $_SESSION['admin'];
} 
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link d-flex justify-content-center align-items-center">
    <h1 class="brand-text font-weight-light"><strong>WOODY</strong></h1>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-5">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="<?= BASE_URL_ADMIN ?>" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa-solid fa-layer-group mr-2"></i>
            <p>
              Danh mục
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=danhmuc" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=them-danhmuc" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa-solid fa-couch mr-2"></i>
            <p>
              Sản phẩm
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=sanpham" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=het-sanpham" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Hết hàng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=them-sanpham" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa-solid fa-cart-shopping mr-2"></i>
            <p>
              Đơn hàng
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=donhang" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=them-donhang" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa-solid fa-user mr-2"></i>
            <p>
              Tài khoản
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=quantrivien" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quản trị viên</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=khachhang" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Khách hàng</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa-solid fa-tag mr-2"></i>
            <p>
              Tags
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=tag" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=them-tag" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
              </a>
            </li>



          </ul>
        </li>
        
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa-solid fa-square-pen mr-2"></i>
            <p>
              Bài viết
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=baiviet" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=them-baiviet" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa-solid fa-image mr-2"></i>
            <p>
              Sliders-Banners
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=listslider" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sliders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=listbanner" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Banners</p>
              </a>
            </li>
          </ul>
        </li>

        
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa-solid fa-burst mr-2"></i>
            <p>
             Khuyến mãi
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=khuyenmai" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN ?>?act=them-khuyenmai" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
              </a>
            </li>



          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN ?>?act=lien-he" class="nav-link">
          <i class="fa-solid fa-id-card-clip mr-2"></i>
            <p>
             Liên hệ
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          
        </li>

      </ul>
      </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>