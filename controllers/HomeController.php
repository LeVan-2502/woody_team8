<?php

class HomeController
{
    public $modelHome;
    public function __construct()
    {
        $this->modelHome = new Home();
    }

    public function home()
    {
       
        $listSlider = $this->modelHome->getAllSlider();
        $listBanner = $this->modelHome->getAllBanner();
        $top3BaiVietNoiBat = $this->modelHome->top3BaiVietNoiBat();
        $top8Moi = $this->modelHome->top8SanPhamMoi();
        $top8Xem = $this->modelHome->top8SanPhamXemNhieu();
        $top8BanChay = $this->modelHome->top8SanPhamBanChay();
        
        require_once './views/home/home.php';
    }
    public function lienHe()
    {
        require_once './views/lienhe.php';
    }
    public function postLienHe()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $tieu_de = $_POST['tieu_de'];
            $noi_dung = $_POST['noi_dung'];
            $ngay_dang = date('Y-m-d');
    
            $_SESSION['errors'] = [];  // Khởi tạo mảng errors
    
            if (empty($ho_ten)) {
                $_SESSION['errors']['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $_SESSION['errors']['email'] = 'Email không được để trống';
            }
            if (empty($tieu_de)) {
                $_SESSION['errors']['tieu_de'] = 'Tiêu đề không được để trống';
            }
            if (empty($noi_dung)) {
                $_SESSION['errors']['noi_dung'] = 'Nội dung không được để trống';
            }
    
            if (empty($_SESSION['errors'])) {
                $result = $this->modelHome->insertLienHe($ho_ten, $email, $ngay_dang, $tieu_de, $noi_dung);
    
                if ($result) {
                    $_SESSION['message'] = "Tin nhắn của bạn đã được gửi thành công!";
                    $_SESSION['message_type'] = "success";
                } else {
                    $_SESSION['message'] = "Gửi liên hệ thất bại. Vui lòng thử lại!";
                    $_SESSION['message_type'] = "error";
                }
    
                header('Location: ' . BASE_URL . '?act=lienhe');
                exit();
            } else {
                $_SESSION['message'] = "Có lỗi xảy ra. Vui lòng kiểm tra lại!";
                $_SESSION['message_type'] = "error";
                
               header('Location: ' . BASE_URL . '?act=lienhe');
                exit();
            }
        }
    }
    
}
