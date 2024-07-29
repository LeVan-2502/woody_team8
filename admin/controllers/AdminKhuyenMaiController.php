<?php
class AdminKhuyenMaiController
{
    public $modelKhuyenMai;
    public function __construct()
    {
        $this->modelKhuyenMai = new AdminKhuyenMai();
       
    }
    public function thayDoiTrangThai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['don_hang_id'] ?? null;
            $trang_thai_id = $_POST['trang_thai_id'] ?? null;
    
            $trangThaiHienTai = $this->modelDonHang->getTrangThaiHienTai($id);
            
            if ($trangThaiHienTai !== null && $this->modelDonHang->laChuyenDoiTrangThaiHopLe($trangThaiHienTai, $trang_thai_id)) {
                if ($this->modelDonHang->updateTrangThaiDonHang($id, $trang_thai_id)) {
                    $_SESSION['thongbao']='Cập nhật trạng thái đơn hàng thành công.';
                } else {
                    $_SESSION['thongbao']='Lỗi khi cập nhật trạng thái đơn hàng.';
                }
            } else {
                $_SESSION['thongbao']='echo "Chuyển đổi trạng thái không hợp lệ.';
            }
        }
    }
    public function danhSachKhuyenMai()
    {
        $view = 'khuyenmai/index';
        $listKhuyenMai = $this->modelKhuyenMai->getAllKhuyenMai();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        unset($_SESSION['errors']);
    }
    public function formThemKhuyenMai()
    {
        $view = 'khuyenmai/add';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
   
    public function postThemKhuyenMai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten_khuyen_mai = $_POST['ten_khuyen_mai'] ?? null;
            $gia_tri = $_POST['gia_tri'] ?? null;
            $ngay_bat_dau = $_POST['ngay_bat_dau'] ?? null;
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'] ?? null;
            $ngay_hien_tai = date('Y-m-d');

            if ($ngay_bat_dau <= $ngay_hien_tai && $ngay_hien_tai <= $ngay_ket_thuc) {
                $trang_thai = 1;
            } else {
                $trang_thai = 0;
            }
            


            $errors = [];
            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Tên khuyến mãi không được để trống';
            }
            if (empty($gia_tri)) {
                $errors['gia_tri'] = 'Giấ trị  không được để trống';
            }
            // if (empty($ngay_bat_dau)) {
            //     $errors['ngay_bat_dau'] =ay_bắt đầu không được để trống';
            // }
            // if (empty($ngay_ket_thuc)) {
            //     $errors['ngay_ket_thuc'] = 'Ngày kết thúc không được để trống';
            // }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trang thái không được để trống';
            }
           
            $_SESSION['errors']= $errors;
            if (empty($errors)) {
                $this->modelKhuyenMai->insertKhuyenMai(
                    $ten_khuyen_mai,
                    $gia_tri,
                    $ngay_bat_dau,
                    $ngay_ket_thuc,
                    $trang_thai,
                );
                header('Location: ' . BASE_URL_ADMIN . '?act=khuyenmai');
                exit();
            } else {
                
                $view = 'khuyenmai/add'; // Sửa tên view đúng cú pháp
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }

    public function formSuaKhuyenMai()
    {

        $id = $_GET['id_khuyen_mai'];
     
        $khuyenMai = $this->modelKhuyenMai->getDetailKhuyenMai($id);
        if ($khuyenMai) {
            $view = 'khuyenmai/edit';
            require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        } else {
            header('Location:' . BASE_URL_ADMIN . '?act=khuyenmai');
            exit();
        }
    }
   
    public function postSuaKhuyenMai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_khuyen_mai'];
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'] ?? null;
            $gia_tri = $_POST['gia_tri'] ?? null;
            $ngay_bat_dau = !empty($_POST['ngay_bat_dau']) ? $_POST['ngay_bat_dau'] : null;
            $ngay_ket_thuc = !empty($_POST['ngay_ket_thuc']) ? $_POST['ngay_ket_thuc'] : null;
            $ngay_hien_tai = date('Y-m-d');

            if ($ngay_bat_dau <= $ngay_hien_tai && $ngay_hien_tai <= $ngay_ket_thuc) {
                $trang_thai = 1;
            } else {
                $trang_thai = 0;
            }

            $errors = [];
            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Tên khuyến mãi không được để trống';
            }
            if (empty($gia_tri)) {
                $errors['gia_tri'] = 'Giá trị không được để trống';
            }
            
    
            $_SESSION['errors'] = $errors;
            if (empty($errors)) {
                $this->modelKhuyenMai->updateKhuyenMai(
                    $id,
                    $ten_khuyen_mai,
                    $gia_tri,
                    $ngay_bat_dau,
                    $ngay_ket_thuc,
                    $trang_thai
                );
               
                header('Location: ' . BASE_URL_ADMIN . '?act=khuyenmai');
                exit();
            } else {
                // Nếu có lỗi, render lại form với thông tin sản phẩm và thông báo lỗi
                $khuyenMai = [
                    'id' => $id,
                    'ten_khuyen_mai' => $ten_khuyen_mai,
                    'gia_tri' => $gia_tri,
                    'ngay_bat_dau' => $ngay_bat_dau,
                    'ngay_ket_thuc' => $ngay_ket_thuc,
                    'trang_thai' => $trang_thai
                ];
              
                $view = 'khuyenmai/edit';
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }
    



    public function deleteKhuyenMai()
    {
        $id = $_GET['id_khuyen_mai'];
        $qtv = $this->modelKhuyenMai->getDetailKhuyenMai($id);
        if ($qtv) {
            $this->modelKhuyenMai->deleteKhuyenMai($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=khuyenmai');
        exit();
    }
}
