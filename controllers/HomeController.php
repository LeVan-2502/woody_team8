<?php 

class HomeController
{
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham= new SanPham();
    }
   
    public function home(){
       
        require_once './views/nguoixem/home.php';
    }
    public function xacthuc(){
       
        require_once './views/nguoidung/home.php';
    }
    
 
}