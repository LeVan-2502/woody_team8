<?php

class TaiKhoanController
{
    public $modelTaiKhoan;
    public function __construct()
    {
        $this->modelTaiKhoan = new TaiKhoan();
    }

    public function taiKhoanCuaToi()
    {

        $id = $_SESSION['user']['id'];
        $donHang = $this->modelTaiKhoan-> getDonHangByTaiKhoanId($id);
        
        $taiKhoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        require_once './views/taikhoan/myaccount.php';
    }
   

    public function formCapNhatTaiKhoan()
    {
        $id = $_GET['id_tai_khoan'];

        $taiKhoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        require_once './views/taikhoan/capnhat.php';
        deleteSessionError();
    }
    public function postCapNhatTaiKhoan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ho_ten = $_POST['ho_ten'] ?? null;
            $ngay_sinh = $_POST['ngay_sinh'] ?? null;
            $email = $_POST['email'] ?? null;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $dia_chi = $_POST['dia_chi'] ?? null;
            $mat_khau = $_POST['mat_khau'] ?? null;


            $anh_dai_dien = $_FILES['anh_dai_dien'];

            // Lấy thông tin tài khoản hiện tại từ cơ sở dữ liệu
            $taiKhoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);


            $file = $taiKhoan['anh_dai_dien'];

            // Xử lý upload file
            $file_thumb = '';
            if ($anh_dai_dien['error'] == UPLOAD_ERR_OK) {
                $file_thumb = uploadFile($anh_dai_dien, './uploads/');
                if (!empty($file)) {
                    deleteFile($file);
                }
            } else {
                $file_thumb = $file;
            }

            // Validate các trường nhập
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
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính không được để trống';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ không được để trống';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            }

            // Lưu các lỗi vào session
            $_SESSION['errors'] = $errors;

            // Nếu không có lỗi, cập nhật tài khoản và chuyển hướng
            if (empty($errors)) {
                $result = $this->modelTaiKhoan->updateTaiKhoan($id, $ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $file_thumb);
                if ($result) {
                    $taiKhoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
                    $_SESSION['user'] = $taiKhoan;
                    header('Location: ' . BASE_URL . '?act=myaccount');
                    exit();
                }
            } else {
                // Nếu có lỗi, render lại form với dữ liệu nhập và thông báo lỗi
                $_SESSION['flash'] = true;
                $taiKhoan = [
                    'id' => $id,
                    'ho_ten' => $ho_ten,
                    'ngay_sinh' => $ngay_sinh,
                    'email' => $email,
                    'so_dien_thoai' => $so_dien_thoai,
                    'gioi_tinh' => $gioi_tinh,
                    'dia_chi' => $dia_chi,
                    'mat_khau' => $mat_khau,
                    'anh_dai_dien' => $file_thumb,
                ];

                // Truyền $errors để hiển thị lỗi trong form
                require_once 'views/taikhoan/capnhat.php';
            }
        }
    }
    public function chiTietDonHang()
    {   
        $user_id = $_SESSION['user']['id'];
        $id = $_GET['id_don_hang'];
        
        $donHang=$this->modelTaiKhoan->getThongTinĐonHang($id); 
        
        $chiTietDonHang = $this->modelTaiKhoan->getSanPhamDonHang($id);
        
       
        require_once './views/taikhoan/chitietdonhang.php';
       
    }
    public function huyDonHang()
{
        $id = $_GET['id_don_hang'] ?? null;
        $user_id = $_SESSION['user']['id'];
        $IDtrangThaiHienTai = $this->modelTaiKhoan->getTrangThaiHienTai($id);

        // Kiểm tra nếu trạng thái hiện tại là "Đang giao hàng"
        if ($IDtrangThaiHienTai == 2 || $IDtrangThaiHienTai==3) {
            $_SESSION['thongbao'] = [
                'message' => "Không thể hủy đơn hàng khi đơn hàng đang ở trạng thái Đang giao hàng.",
                'type' => "danger"
                
            ];
           
        } else {
                if ($this->modelTaiKhoan->updateTrangThaiDonHang($id, 4)) {
                    $_SESSION['thongbao'] = [
                        'message' => "Cập nhật trạng thái đơn hàng thành công.",
                        'type' => "success"
                    ];
                } else {
                    $_SESSION['thongbao'] = [
                        'message' => "Lỗi khi cập nhật trạng thái đơn hàng.",
                        'type' => "danger"
                    ];
                }
            
        }
        header('Location: ' . BASE_URL . '?act=myaccount&id_tai_khoan='.$user_id);
        exit();
    
}

   
}
