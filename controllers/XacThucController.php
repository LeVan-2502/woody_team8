<?php
class XacThucController
{
    public $modelXacThuc;
    public function __construct()
    {
        $this->modelXacThuc = new XacThuc();
    }
    public function formLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->login();
        }
        require_once './views/dangnhap.php';
    }
    public function login()
    {
        $email=$_POST['email'];
        $mat_khau = $_POST['mat_khau'];
        
        $admin = $this->modelXacThuc->getThongTinTaiKhoan($email,$mat_khau);

        if (empty($admin)) {
            $_SESSION['error'] = 'Email hoặc password chưa đúng';
            
            header('Location:' . BASE_URL . '?act=dangnhap');
            exit();
        }
        $_SESSION['admin'] = $admin;
        header('Location:' . BASE_URL . '?act=xacthuc&tai_khoan_id='.$admin['id']);
        exit();
    }
    public function taikhoancuatoi()
    {
        require_once './views/myaccount.php';
    }

    
    public function logout()
    {
        if (!empty($_SESSION['admin'])) {
            session_destroy();
        }
        header('Location:' . BASE_URL);
        exit();
    }
}
