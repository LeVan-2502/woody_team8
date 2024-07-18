<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers

require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/DashboardController.php';
require_once './controllers/AdminDonhangController.php';
require_once './controllers/AdminQuanTriVienController.php';
require_once './controllers/AdminXacThucController.php';
require_once './controllers/AdminBinhLuanController.php';
// require_once './controller/AdminSanPhamController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminQuanTriVien.php';
require_once './models/AdminXacThuc.php';
require_once './models/AdminBinhLuan.php';

// require_once './model/AdminDanhMuc.php';


// Route
$act = $_GET['act'] ?? '/';
middleware_auth_check($act);
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=>(new DashboardController())->dashboard(),

    'danhmuc' =>(new AdminDanhMucController())->danhSachDanhMuc(),
    'them-danhmuc' =>(new AdminDanhMucController())->postThemDanhMuc(),
    'form-them-danhmuc' =>(new AdminDanhMucController())->formThemDanhMuc(),
    'sua-danhmuc' =>(new AdminDanhMucController())->postSuaDanhMuc(),
    'form-sua-danhmuc' =>(new AdminDanhMucController())->formSuaDanhMuc(),
    'xoa-danhmuc' =>(new AdminDanhMucController())->deleteDanhMuc(),
    
    'sanpham' =>(new AdminSanPhamController())->danhSachSanPham(),
    'them-sanpham' =>(new AdminSanPhamController())->postThemSanPham(),
    'form-them-sanpham' =>(new AdminSanPhamController())->formThemSanPham(),
    'sua-sanpham' =>(new AdminSanPhamController())->postSuaSanPham(),
    'form-sua-sanpham' =>(new AdminSanPhamController())->formSuaSanPham(),
    'xoa-sanpham' =>(new AdminSanPhamController())->deleteSanPham(),
    'sua-albumsanpham' =>(new AdminSanPhamController())->formAlbumSanPham(),
    
    'donhang' =>(new AdminDonHangController())->danhSachDonHang(),
    'form-chitietdonhang' =>(new AdminDonHangController())->formDetailDonHang(),
    'sua-chitietdonhang' =>(new AdminDonHangController())->postDetailDonHang(),
    
    'quantrivien' =>(new AdminQuanTriVienController())->danhSachQuanTriVien(),
    'them-quantrivien' =>(new AdminQuanTriVienController())->postThemQuanTriVien(),
    'form-them-quantrivien' =>(new AdminQuanTriVienController())->formThemQuanTriVien(),
    'sua-quantrivien' =>(new AdminQuanTriVienController())->postSuaQuanTriVien(),
    'form-sua-quantrivien' =>(new AdminQuanTriVienController())->formSuaQuanTriVien(),
    'xoa-quantrivien' =>(new AdminQuanTriVienController())->deleteQuanTriVien(),
    'chitiet-quantrivien' =>(new AdminQuanTriVienController())->showQuanTriVien(),

    'binhluan' =>(new AdminBinhLuanController())->danhSachBinhLuan(),
    'sua-chitietbinhluan' =>(new AdminBinhLuanController())->updateTrangThaiBinhLuan(),
   
    'dangnhap' =>(new AdminXacThucController())->formLogin(),
    'dangxuat' =>(new AdminXacThucController())->logout(),
};