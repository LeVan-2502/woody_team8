<?php
class AdminXacThucController
{
    public $adminModelXacThuc;
    public function __construct()
    {
        $this->adminModelXacThuc = new AdminXacThuc();
    }
    public function formLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->login();
        }
        require_once PATH_VIEW_ADMIN . 'xacthuc/login.php';
    }
    public function login()
    {
        $admin = $this->adminModelXacThuc->getThongTinTaiKhoan($_POST['email'], $_POST['mat_khau']);

        if (empty($admin)) {
            $_SESSION['error'] = 'Email hoặc password chưa đúng';
            $view = 'xacthuc/login';
            header('Location:' . BASE_URL_ADMIN . '?act=dangnhap');
            exit();
        }
        $_SESSION['admin'] = $admin;
        header('Location:' . BASE_URL_ADMIN);
        exit();
    }
    public function logout()
    {
        if (!empty($_SESSION['admin'])) {
            session_destroy();
        }
        header('Location:' . BASE_URL_ADMIN . '?act=dangnhap');
        exit();
    }
}
