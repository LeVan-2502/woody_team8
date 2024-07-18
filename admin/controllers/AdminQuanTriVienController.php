<?php
class AdminQuanTriVienController
{
    public $modelQuantriVien;
    public function __construct()
    {
        $this->modelQuantriVien = new AdminQuanTriVien();
       
    }
    public function danhSachQuanTriVien()
    {
        $view = 'quantrivien/index';
        $listQuanTriVien = $this->modelQuantriVien->getAllQuanTriVien();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function formThemQuanTriVien()
    {
        $listChucVu = $this->modelQuantriVien->getAllChucVu();
        $view = 'quantrivien/add';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function showQuanTriVien()
    {
        require_once  './views/quantrivien/show.php';
    }
    public function postThemQuanTriVien()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ho_ten = $_POST['ho_ten'] ?? null;
            $ngay_sinh = $_POST['ngay_sinh'] ?? null;
            $email = $_POST['email'] ?? null;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $dia_chi = $_POST['dia_chi'] ?? null;
            $mat_khau = $_POST['mat_khau'] ?? null;
            $chuc_vu_id = $_POST['chuc_vu_id'] ?? null;
            $trang_thai = $_POST['trang_thai'] ?? null;


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
            if (empty($chuc_vu_id)) {
                $errors['chuc_vu_id'] = 'Vui lòng nhập chức vụ';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được bỏ trống';
            }

            if (empty($errors)) {
                $this->modelQuantriVien->insertQuanTriVien(
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
                header('Location: ' . BASE_URL_ADMIN . '?act=quantrivien');
                exit();
            } else {
                
                $view = 'quantrivien/add'; // Sửa tên view đúng cú pháp
                $listChucVu = $this->modelQuantriVien->getAllChucVu();
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }

    public function formSuaQuanTriVien()
    {

        $id = $_GET['id_tai_khoan'];
        $listChucVu = $this->modelQuantriVien->getAllChucVu();
        $quanTriVien = $this->modelQuantriVien->getDetailQuanTriVien($id);
        if ($quanTriVien) {
            $view = 'quantrivien/edit';
            require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        } else {
            header('Location:' . BASE_URL_ADMIN . '?act=sanpham');
            exit();
        }
    }
   
    public function postSuaQuanTriVien()
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
            $chuc_vu_id = $_POST['chuc_vu_id'] ?? null;
            $trang_thai = $_POST['trang_thai'] ?? null;
            
            $anh_dai_dien = $_FILES['anh_dai_dien'];
            $file_thumb = '';
            // Lấy thông tin sản phẩm hiện tại từ cơ sở dữ liệu
            $quanTriVien = $this->modelQuantriVien->getDetailQuanTriVien($id);
            $file=$quanTriVien['anh_dai_dien'];
            // Xử lý upload file mới
            if ($anh_dai_dien['error'] == UPLOAD_ERR_OK) {
                // Upload file mới và lấy tên file mới
                $file_thumb = uploadFile($anh_dai_dien, './uploads/'); 
                // Xóa file cũ nếu tồn tại
                if (!empty($file)) {
                    deleteFile($file);
                }
            } else {
                // Nếu không có tệp mới tải lên, giữ lại tên tệp hiện tại
                $file_thumb = $file;
            }

            //Kiểm tra lỗi
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
            if (empty($chuc_vu_id)) {
                $errors['chuc_vu_id'] = 'Vui lòng nhập chức vụ';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được bỏ trống';
            }


            // Nếu không có lỗi, cập nhật sản phẩm và chuyển hướng về danh sách sản phẩm
            if (empty($errors)) {
                $this->modelQuantriVien->updateQuanTriVien($id,$ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu_id, $trang_thai, $file_thumb);
                header('Location: ' . BASE_URL_ADMIN . '?act=quantrivien');
                exit();
            } else {
                // Nếu có lỗi, render lại form với thông tin sản phẩm và thông báo lỗi
                $listChucVu = $this->modelQuantriVien->getAllChucVu();
                $sanPham = [
                    'id' => $id,
                    'ho_ten' => $ho_ten,
                    'ngay_sinh' => $ngay_sinh,
                    'email' => $email,
                    'so_dien_thoai' => $so_dien_thoai,
                    'gioi_tinh' => $gioi_tinh,
                    'dia_chi' => $dia_chi,
                    'mat_khau' => $mat_khau,
                    'chuc_vu_id' => $chuc_vu_id,
                    'trang_thai' => $chuc_vu_id,
                    'anh_dai_dien' => $file_thumb,
                ];
                $view = 'quantrivien/edit';
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
                
            }
        }
    }



    public function deleteQuanTriVien()
    {
        $id = $_GET['id_tai_khoan'];
        $qtv = $this->modelQuantriVien->getDetailQuanTriVien($id);
        if ($qtv) {
            $this->modelQuantriVien->deleteQuanTriVien($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=quantrivien');
        exit();
    }
}
