<?php 

class BaiVietController
{
    public $modelBaiViet;
    public function __construct()
    {
        $this->modelBaiViet= new BaiViet();
    }
    public function listBaiViet(){
        $countSanPhamDanhMuc=$this->modelBaiViet->countSanPhamDanhMuc();
        $bonBaiVietGanDay =  $this->modelBaiViet->bonBaiVietGanDay();
        $listAllBaiViet = $this->modelBaiViet->getAllBaiViet();
        $listAllBaiViet = json_encode($listAllBaiViet);
        $listAllTag=$this->modelBaiViet->getAllTag();
        $listAllDanhMuc = $this->modelBaiViet->getAllDanhMuc();
        require_once './views/baiviet.php';
    }

    public function chiTietBaiViet(){

        $id=$_GET['id_bai_viet'];

        $listAllTag = $this->modelBaiViet->getAllTag();
        $listTagBV = $this->modelBaiViet->getTagBaiViet($id);
        $chiTietBaiViet=$this->modelBaiViet->getChiTietBaiViet($id);
        
        require_once './views/chitietbaiviet.php';
    }
}