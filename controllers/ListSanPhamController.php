<?php
class ListSanPhamController
{
    public $modelListSanPham;
    public function __construct()
    {
        $this->modelListSanPham = new ListSanPham();
    }
    public function listSanPham(){
        $listSanPham= $this->modelListSanPham->getAllSanPham();
        $listSanPham = json_encode($listSanPham);
     
        require_once './views/nguoidung/listsanpham.php';
    }
   
}
