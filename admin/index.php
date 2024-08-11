<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers

require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonhangController.php';
require_once './controllers/AdminTaiKhoanController.php';
require_once './controllers/AdminXacThucController.php';
require_once './controllers/AdminBinhLuanController.php';
require_once './controllers/AdminBaiVietController.php';
require_once './controllers/AdminTagController.php';
require_once './controllers/AdminKhuyenMaiController.php';
require_once './controllers/AdminSliderBannerController.php';
require_once './controllers/AdminLienHeController.php';
require_once './controllers/AdminDashBoardController.php';
// require_once './controller/AdminSanPhamController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';
require_once './models/AdminXacThuc.php';
require_once './models/AdminBinhLuan.php';
require_once './models/AdminBaiViet.php';
require_once './models/AdminTag.php';
require_once './models/AdminKhuyenMai.php';
require_once './models/AdminSliderBanner.php';
require_once './models/AdminLienHe.php';
require_once './models/AdminDashBoard.php';

// require_once './model/AdminDanhMuc.php';


// Route
$act = $_GET['act'] ?? '/';
middleware_auth_check_admin($act);
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    
    '/' =>(new AdminDashBoardController())->doanhThuDashBoard(),
    'donhang-dashboard' =>(new AdminDashBoardController())->formThemDashBoard(),
    'khachhang-dashboard' =>(new AdminDashBoardController())->postSuaDashBoard(),
    'form-sua-dashboard' =>(new AdminDashBoardController())->formSuaDashBoard(),
    'xoa-dashboard' =>(new AdminDashBoardController())->deleteDashBoard(),

    'lien-he' =>(new AdminLienHeController())->danhSachLienHe(),

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
    'het-sanpham' =>(new AdminSanPhamController())->danhSachHetSanPham(),
    'form-sua-sanpham' =>(new AdminSanPhamController())->formSuaSanPham(),
    'xoa-sanpham' =>(new AdminSanPhamController())->deleteSanPham(),
    'sua-albumsanpham' =>(new AdminSanPhamController())->formAlbumSanPham(),
    'loc-sanpham' =>(new AdminSanPhamController())->locSanPham(),
    
    'donhang' =>(new AdminDonHangController())->danhSachDonHang(),
    'form-chitietdonhang' =>(new AdminDonHangController())->formDetailDonHang(),
    'sua-chitietdonhang' =>(new AdminDonHangController())->thayDoiTrangThai(),
    'loc-donhang' =>(new AdminDonHangController())->locDonHang(),
    
    'quantrivien' =>(new AdminTaiKhoanController())->danhSachQuanTriVien(),
    'khachhang' =>(new AdminTaiKhoanController())->danhSachKhachHang(),
    'them-taikhoan' =>(new AdminTaiKhoanController())->postThemTaiKhoan(),
    'form-them-taikhoan' =>(new AdminTaiKhoanController())->formThemTaiKhoan(),
    'sua-taikhoan' =>(new AdminTaiKhoanController())->postSuaTaiKhoan(),
    'form-sua-taikhoan' =>(new AdminTaiKhoanController())->formSuaTaiKhoan(),
    'xoa-taikhoan' =>(new AdminTaiKhoanController())->deleteTaiKhoan(),
    'chitiet-quantrivien' =>(new AdminTaiKhoanController())->showTaiKhoan(),
    'danhsach-donhang' =>(new AdminTaiKhoanController())->danhSachDonHang(),
    'capnhat-admin' => (new AdminTaiKhoanController())->postCapNhatAdmin(),

    'tag' =>(new AdminTagController())->danhSachTag(),
    'them-tag' =>(new AdminTagController())->postThemTag(),
    'form-them-tag' =>(new AdminTagController())->formThemTag(),
    'sua-tag' =>(new AdminTagController())->postSuaTag(),
    'form-sua-tag' =>(new AdminTagController())->formSuaTag(),
    'xoa-tag' =>(new AdminTagController())->deleteTag(),
    
    
    'baiviet' =>(new AdminBaiVietController())->danhSachBaiViet(),
    'them-baiviet' =>(new AdminBaiVietController())->postThemBaiViet(),
    'form-them-baiviet' =>(new AdminBaiVietController())->formThemBaiViet(),
    'sua-baiviet' =>(new AdminBaiVietController())->postSuaBaiViet(),
    'form-sua-baiviet' =>(new AdminBaiVietController())->formSuaBaiViet(),
    'xoa-baiviet' =>(new AdminBaiVietController())->deleteBaiViet(),
   

    'khuyenmai' =>(new AdminKhuyenMaiController())->danhSachKhuyenMai(),
    'them-khuyenmai' =>(new AdminKhuyenMaiController())->postThemKhuyenMai(),
    'form-them-khuyenmai' =>(new AdminKhuyenMaiController())->formThemKhuyenMai(),
    'sua-khuyenmai' =>(new AdminKhuyenMaiController())->postSuaKhuyenMai(),
    'form-sua-khuyenmai' =>(new AdminKhuyenMaiController())->formSuaKhuyenMai(),
    'xoa-khuyenmai' =>(new AdminKhuyenMaiController())->deleteKhuyenMai(),
    
    'listslider' =>(new AdminSliderBannerController())->danhSachSlider(),
    'listbanner' =>(new AdminSliderBannerController())->danhSachBanner(),
    'them-sliderbanner' =>(new AdminSliderBannerController())->postThemSliderBanner(),
    'form-them-sliderbanner' =>(new AdminSliderBannerController())->formThemSliderBanner(),
    'sua-sliderbanner' =>(new AdminSliderBannerController())->postSuaSliderBanner(),
    'form-sua-sliderbanner' =>(new AdminSliderBannerController())->formSuaSliderBanner(),
    'xoa-sliderbanner' =>(new AdminSliderBannerController())->deleteSliderBanner(),
   
    'binhluan' =>(new AdminBinhLuanController())->danhSachBinhLuan(),
    'sua-chitietbinhluan' =>(new AdminBinhLuanController())->updateTrangThaiBinhLuan(),
   
    'dangnhap' =>(new AdminXacThucController())->formLogin(),
    'dangxuat' =>(new AdminXacThucController())->logout(),

    
   
};