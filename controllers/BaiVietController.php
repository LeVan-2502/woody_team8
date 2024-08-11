<?php 

class BaiVietController
{
    public $modelBaiViet;
    public function __construct()
    {
        $this->modelBaiViet= new BaiViet();
    }
    public function listBaiViet(){
        $bonBaiVietGanDay = [];
        $title = '';
        $countSanPhamDanhMuc=$this->modelBaiViet->countSanPhamDanhMuc();
       
        $bonBaiVietGanDay =  $this->modelBaiViet->bonBaiVietGanDay();
        $listAllBaiViet = $this->modelBaiViet->getAllBaiViet();
        $listAllBaiViet = json_encode($listAllBaiViet);
        $listAllTag=$this->modelBaiViet->getAllTag();
        $listAllDanhMuc = $this->modelBaiViet->getAllDanhMuc();
        require_once './views/baiviet.php';
    }

    public function listBaiVietByDanhMuc(){
        $id=$_GET['id_danh_muc'];
        
        $danhmucItem=$this->modelBaiViet->getDetailDanhMuc($id);
        $listAllBaiViet = $this->modelBaiViet->getAllBaiVietByDanhMuc($id);
        $title = '>>'.$danhmucItem['ten_danh_muc'] ?? '';
        $countSanPhamDanhMuc=$this->modelBaiViet->countSanPhamDanhMuc();
        $bonBaiVietGanDay =  $this->modelBaiViet->bonBaiVietGanDay();
        
        $listAllBaiViet = json_encode($listAllBaiViet);
        $listAllTag=$this->modelBaiViet->getAllTag();
        $listAllDanhMuc = $this->modelBaiViet->getAllDanhMuc();
        require_once './views/baiviet.php';
    }
    public function listBaiVietByTag(){
        $id_tag=$_GET['id_tag'];
      
        $tagItem=$this->modelBaiViet->getDatailTag($id_tag);
        $listAllBaiViet = $this->modelBaiViet->getAllBaiVietByTag($id_tag);
        $title = '<button class="btn btn-info">' . htmlspecialchars('#' . ($tagItem['ten_tag'] ?? ''), ENT_QUOTES, 'UTF-8') . '</button>';
        $countSanPhamDanhMuc=$this->modelBaiViet->countSanPhamDanhMuc();
        $bonBaiVietGanDay =  $this->modelBaiViet->bonBaiVietGanDay();
        
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