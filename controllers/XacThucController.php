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
        require_once './views/xacthuc/dangnhap.php';
    }
    public function formDangKi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->login();
        }
        require_once './views/xacthuc/dangki.php';
        unset($_SESSION['errors']);
    }
    public function login()
    {
        $email = $_POST['email'];
        $mat_khau = $_POST['mat_khau'];

        $user = $this->modelXacThuc->getThongTinTaiKhoan($email, $mat_khau);

        if (empty($user)) {
            $_SESSION['error'] = 'Email hoặc password chưa đúng';

            header('Location:' . BASE_URL . '?act=dangnhap');
            exit();
        }
        $_SESSION['user'] = $user;
        header('Location:' . BASE_URL);
        exit();
    }
    public function taikhoancuatoi()
    {
        require_once './views/myaccount.php';
    }
    public function postDangKi()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ho_ten = $_POST['ho_ten'] ?? null;
            $ngay_sinh = $_POST['ngay_sinh'] ?? null;
            $email = $_POST['email'] ?? null;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $dia_chi = $_POST['dia_chi'] ?? null;
            $mat_khau = $_POST['mat_khau'] ?? null;
            $chuc_vu_id = 3;
            $trang_thai = 1;


            $anh_dai_dien = $_FILES['anh_dai_dien'];
            $file_thumb = uploadFile($anh_dai_dien, './uploads/');

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoai không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính không được để trống';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ không được để trống';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu không được bỏ trông';
            }
            $_SESSION['errors'] = $errors;

            if (empty($_SESSION['errors'])) {
                $check = $this->modelXacThuc->insertTaiKhoan(
                    $ho_ten,
                    $ngay_sinh,
                    $email,
                    $so_dien_thoai,
                    $gioi_tinh,
                    $dia_chi,
                    $mat_khau,
                    $chuc_vu_id,
                    $trang_thai,
                    $file_thumb
                );
                if ($check) {
                    $_SESSION['thongbao'] = [
                        'message' => "Đăng kí tài khoản thành công.",
                        'type' => "success"
                    ];
                    header('Location: ' . BASE_URL . '?act=dangnhap');
                    exit();
                } else {
                    $_SESSION['thongbao'] = [
                        'message' => "Lỗi đăng kí.",
                        'type' => "danger"
                    ];
                    header('Location: ' . BASE_URL . '?act=form-dangki');
                    exit();
                }
            } else {
                header('Location: ' . BASE_URL . '?act=form-dangki');
                exit();
            }
        }
    }


    public function logout()
    {
        if (!empty($_SESSION['user'])) {
            session_destroy();
        }
        header('Location:' . BASE_URL);
        exit();
    }
}
