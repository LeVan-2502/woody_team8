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
        $countSP = count($listSanPham);
        $listSanPham = json_encode($listSanPham);
     
        require_once './views/listsanpham.php';
    }
    public function listXem(){
        $listSanPham= $this->modelListSanPham->getAllSanPham();
        $listSanPham = json_encode($listSanPham);
        require_once './views/nguoixem/listsanpham.php';
    }
    public function locSanPhamCaoThap(){
        $listSanPham= $this->modelListSanPham->getCaoThap(); 
          
        $countSP = count($listSanPham);
        $listSanPham = json_encode($listSanPham);
        require_once './views/listsanpham.php';
       

    }
    public function locSanPhamThapCao(){
        $listSanPham= $this->modelListSanPham->getThapCao();
        $countSP = count($listSanPham);
        $listSanPham = json_encode($listSanPham);
        require_once './views/listsanpham.php';

    }
    public function locSanPhamMoiNhat(){
        $listSanPham= $this->modelListSanPham->getMoiNhat();
        $countSP = count($listSanPham);
        $listSanPham = json_encode($listSanPham);
        require_once './views/listsanpham.php';
    }
    public function locSanPhamPhoBien(){
        $listSanPham= $this->modelListSanPham->getPhoBien();
        $countSP = count($listSanPham);
        $listSanPham = json_encode($listSanPham);
        require_once './views/listsanpham.php';

    }
    public function timKiemSanPham(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tuKhoa = $_POST['tu_khoa'];

        }
        
        $listSanPham= $this->modelListSanPham->getSanPhamTimKiem($tuKhoa);
        $countSP = count($listSanPham);
        $listSanPham = json_encode($listSanPham);
        require_once './views/listsanpham.php';

    }


    
}
