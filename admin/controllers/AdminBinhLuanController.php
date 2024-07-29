<?php
class AdminBinhLuanController
{
    public $modelBinhLuan;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelBinhLuan = new AdminBinhLuan();
        $this->modelSanPham = new AdminSanPham();

    }
    public function danhSachBinhLuan()
    {
        $id=$_GET['id_san_pham'];
        $view = 'binhluan/index';

        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan($id);
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function formDetailBinhLuan()
    {
        $id = $_GET['id_binh_luan'];

        $trangThai = $this->modelBinhLuan->getAllTrangThai();
        $binhLuan=$this->modelBinhLuan->getDetailBinhLuan($id);

        $view = 'binhluan/detail';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function updateTrangThaiBinhLuan()
{
    $id = $_GET['id_binh_luan'];
    $binhLuan = $this->modelBinhLuan->getDetailBinhLuan($id);
    $trangThai = $binhLuan['trang_thai'];
    
    if ($trangThai == 0) {
        $trang_thai = 1;
    } else {
        $trang_thai = 0;
    }

    
    $this->modelBinhLuan->updateTrangThaiBinhLuan($id, $trang_thai);

    $binhLuan['trang_thai'] = $trang_thai;
    $id_sp=$binhLuan['san_pham_id'];
    header('Location: ' . BASE_URL_ADMIN . '?act=binhluan&id_san_pham='.$id_sp);
    exit();
}
    
    
}
