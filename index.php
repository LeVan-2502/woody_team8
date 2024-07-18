<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/ListSanPhamController.php';
require_once './controllers/ChiTietSanPhamController.php';
require_once './controllers/XacThucController.php';
require_once './controllers/TaiKhoanController.php';


// Require toàn bộ file Models

require_once './models/SanPham.php';
require_once './models/ListSanPham.php';
require_once './models/ChiTietSanPham.php';
require_once './models/XacThuc.php';
require_once './models/TaiKhoan.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=> (new HomeController())->home(),

    'listsanpham'=> (new ListSanPhamController())->listSanPham(),    
    'chitietsanpham'=> (new ChiTietSanPhamController())->chiTietSanPham(),

    'dangnhap'=> (new XacThucController())->formLogin(),
    'dangxuat'=> (new XacThucController())->logout(),
    'xacthuc'=> (new HomeController())->xacthuc(),


    'myaccount'=> (new TaiKhoanController())->taiKhoanCuaToi(),
    'capnhattaikhoan'=> (new TaiKhoanController())->formCapNhatTaiKhoan(),
    'post-capnhattaikhoan'=> (new TaiKhoanController())->postCapNhatTaiKhoan(),
    'chitiet-donhang'=> (new TaiKhoanController())->chiTietDonHang(),
        
};