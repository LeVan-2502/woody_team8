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
        $listTrangThai = $this->modelDonHang->getAllTrangThai();
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function formDetailDonHang()
    {
        $id_don_hang = $_GET['id_don_hang'];
        
        $trangThai = $this->modelDonHang->getAllTrangThai();
       
        $dh =$this->modelDonHang->getDonHang($id_don_hang);
       
       
        $sanPhamDonHang =$this->modelDonHang->getSanPhamDonHang($id_don_hang);
        
        $view = 'donhang/detail';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function locDonHang()
    {
        $trangThaiId = isset($_POST['trang_thai_id']) ? $_POST['trang_thai_id'] : '';
        if ($trangThaiId) {
            $listDonHang= $this->modelDonHang->getAllDonHangByTrangThai($trangThaiId);
        } else {
            $listDonHang= $this->modelDonHang->getAllDonHang();
        }
        $listTrangThai = $this->modelDonHang->getAllTrangThai();

        // Truyền dữ liệu đến view
        $view = 'donhang/index';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function thayDoiTrangThai()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['don_hang_id'] ?? null;
        $trang_thai_id = $_POST['trang_thai_id'] ?? null;

        $trangThaiHienTai = $this->modelDonHang->getTrangThaiHienTai($id);

        if ($trangThaiHienTai !== null && $this->modelDonHang->laChuyenDoiTrangThaiHopLe($trangThaiHienTai, $trang_thai_id)) {
            if ($this->modelDonHang->updateTrangThaiDonHang($id, $trang_thai_id)) {
                $_SESSION['thongbao'] = [
                    'message' => "Cập nhật trạng thái đơn hàng thành công.",
                    'type' => "success"
                ];
            } else {
                $_SESSION['thongbao'] = [
                    'message' => "Lỗi khi cập nhật trạng thái đơn hàng.",
                    'type' => "danger"
                ];
            }
        } else {
            $_SESSION['thongbao'] = [
                'message' => "Chuyển đổi trạng thái không hợp lệ.",
                'type' => "danger"
            ];
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=form-chitietdonhang&id_don_hang=' . $id);
        exit();
    }
}

    
    
    }
    

   
    

