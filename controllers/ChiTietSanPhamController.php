<?php
class ChiTietSanPhamController
{
    public $modelChiTietSanPham;
    public function __construct()
    {
        $this->modelChiTietSanPham = new ChiTietSanPham();
    }
    public function chiTietSanPham()
    {

        $id = $_GET['id_san_pham'];

        $chiTietSanPham = $this->modelChiTietSanPham->getChiTietSanPham($id);
    
        $listAnh =  $this->modelChiTietSanPham->getAlbumSanPham($id);

        $danh_muc_id = $chiTietSanPham['danh_muc_id'];
        $binhLuan = $this->modelChiTietSanPham->getAllBinhLuanSanPham($id);

        
        
        $this->modelChiTietSanPham->updateLuotView($id);
        $sanPhamLienQuan = $this->modelChiTietSanPham->sanPhamLienQuan($danh_muc_id);
        
        require_once './views/chitietsanpham.php';
        unset($_SESSION['errors']);
    }

    
    public function postBinhLuan(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $san_pham_id = $_POST['san_pham_id'];
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $noi_dung = $_POST['noi_dung'];
            $email = $_POST['email'];
            $ho_ten = $_POST['ho_ten'];
            $trang_thai=1;
            $ngay_dang=date('Y-m-d'); 

            $errors = [];
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Tên danh mục không được để trống';
            }
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên danh mục không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Tên danh mục không được để trống';
            }
            $_SESSION['errors']= $errors;
            
            if (empty($errors)) {
                $this->modelChiTietSanPham->insertBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai);
                header('Location: ' . BASE_URL. '?act=chitietsanpham&id_san_pham='.$san_pham_id);
                exit();
            } else {
                header('Location: ' . BASE_URL. '?act=chitietsanpham&id_san_pham='.$san_pham_id);
                exit();
            }
        }
    }
    
}
