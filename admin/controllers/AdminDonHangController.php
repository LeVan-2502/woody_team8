<?php
class AdminDonHangController
{
    public $modelDonHang;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDonHang()
    {
        $view = 'donhang/index';
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function formDetailDonHang()
    {
        $id = $_GET['id_don_hang'];

        $trangThai = $this->modelDonHang->getAllTrangThai();
        $donHang=$this->modelDonHang->getDetailDonHang($id);
       
        $sanPhamDonHang =$this->modelDonHang->getSanPhamDonHang($id);
        
        $view = 'donhang/detail';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function postDetailDonHang()
    {
        
        $id = $_POST['don_hang_id'];
        $trang_thai_id = $_POST['trang_thai_id'];
      
        if(empty($trang_thai_id)){
            $donhang=$this->modelDonHang->getDetailDonHang($id);
            $trang_thai_id=$donhang['trang_thai_id'];
        }

        
        $donhang=$this->modelDonHang->updateTrangThaiDonHang($id, $trang_thai_id);

        $sanPhamDonHang =$this->modelDonHang->getSanPhamDonHang($id);
       
        $sanPhamDonHang['trang_thai_id'] = $trang_thai_id;
        header('Location: ' . BASE_URL_ADMIN . '?act=form-chitietdonhang&id_don_hang='.$id);
        exit();
    }
    
    // public function postThemDonHang()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         $ten_san_pham = $_POST['ten_san_pham'];
    //         $gia_san_pham = $_POST['gia_san_pham'];
    //         $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
    //         $so_luong = $_POST['so_luong'];
    //         $ngay_nhap = $_POST['ngay_nhap'];
    //         $danh_muc_id = $_POST['danh_muc_id'];
    //         $trang_thai = $_POST['trang_thai'];
    //         $mo_ta = $_POST['mo_ta'];

    //         $hinh_anh = $_FILES['hinh_anh'];
    //         $file_thumb = uploadFile($hinh_anh, './uploads/');

    //         $errors = [];
    //         if (empty($ten_san_pham)) {
    //             $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
    //         }
    //         if (empty($gia_san_pham)) {
    //             $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
    //         }
    //         if (empty($gia_khuyen_mai)) {
    //             $errors['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
    //         }
    //         if (empty($so_luong)) {
    //             $errors['so_luong'] = 'Số lượng không được để trống';
    //         }
    //         if (empty($ngay_nhap)) {
    //             $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
    //         }
    //         if (empty($danh_muc_id)) {
    //             $errors['danh_muc_id'] = 'Loại danh mục không được để trống';
    //         }
    //         if (empty($trang_thai)) {
    //             $errors['trang_thai'] = 'Trạng thái phải chọn';
    //         }
    //         if (empty($mo_ta)) {
    //             $errors['mo_ta'] = 'Mô tả không được để trống';
    //         }

    //         if (empty($errors)) {
    //             $this->modelDonHang->insertDonHang(
    //                 $ten_san_pham,
    //                 $gia_san_pham,
    //                 $gia_khuyen_mai,
    //                 $so_luong,
    //                 $ngay_nhap,
    //                 $danh_muc_id,
    //                 $trang_thai,
    //                 $mo_ta,
    //                 $file_thumb
    //             );
    //             header('Location: ' . BASE_URL_ADMIN . '?act=donhang');
    //             exit();
    //         } else {
    //             $view = 'donhang/add'; // Sửa tên view đúng cú pháp
    //             require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    //         }
    //     }
    // }

   

   
    
}
