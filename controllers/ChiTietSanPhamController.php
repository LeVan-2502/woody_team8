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


        $sanPhamLienQuan = $this->modelChiTietSanPham->sanPhamLienQuan($danh_muc_id);
        require_once './views/nguoidung/chitietsanpham.php';
    }
    public function chiXem()
    {
        $id = $_GET['id_san_pham'];
        $chiTietSanPham = $this->modelChiTietSanPham->getChiTietSanPham($id);
        $listAnh =  $this->modelChiTietSanPham->getAlbumSanPham($id);

        $danh_muc_id = $chiTietSanPham['danh_muc_id'];
        $binhLuan = $this->modelChiTietSanPham->getAllBinhLuanSanPham($id);


        $sanPhamLienQuan = $this->modelChiTietSanPham->sanPhamLienQuan($danh_muc_id);
        require_once './views/nguoixem/chitietsanpham.php';
    }
    
}
