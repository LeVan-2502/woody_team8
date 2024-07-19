<?php 

class HomeController
{
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham= new SanPham();
    }
   
    public function homeXem(){
       
        require_once './views/nguoixem/home.php';
    }
   
    
    public function homeDung(){
       
        require_once './views/nguoidung/home.php';
    }
   
   
    public function xacthuc(){
       
        require_once './views/nguoidung/home.php';
    }
    public function home(){

    }
 
}