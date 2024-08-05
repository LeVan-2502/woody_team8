<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
       
    }
    public function danhSachQuanTriVien()
    {
        $view = 'taikhoan/index';
        $chucvu = ' quản trị viên.';
        $listTaiKhoan = $this->modelTaiKhoan->getAllQuanTriVien();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function danhSachKhachHang()
    {
        $view = 'taikhoan/index';
        $chucvu = ' khách hàng.';
        $listTaiKhoan = $this->modelTaiKhoan->getAllKhachHang();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function formThemTaiKhoan()
    {
        $listChucVu = $this->modelTaiKhoan->getAllChucVu();
        $view = 'taikhoan/add';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function danhSachDonHang()
    {
        $id=$_GET['id_tai_khoan'];
        $dh=$this->modelTaiKhoan->getDetailTaiKhoan($id);
       
        $listDonHang =  $this->modelTaiKhoan->getAllDonHangTaiKhoan($id);
       
        $view = 'taikhoan/listdonhang';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function showTaiKhoan()
    {
        $admin = $_SESSION['admin'];
        $id=$admin['id'];
        $_SESSION['admin'] = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        $admin = $_SESSION['admin'];
        require_once  './views/taikhoan/show.php';
    }
    public function postThemTaiKhoan()
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
                $this->modelTaiKhoan->insertQuanTriVien(
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


                if($chuc_vu_id==2){
                    $chucVu = 'quantrivien';
                }else{
                    $chucVu = 'khachhang';
                }

                header('Location: ' . BASE_URL_ADMIN . '?act='.$chucVu);
                exit();
            } else {
                
                $view = 'taikhoan/add'; // Sửa tên view đúng cú pháp
                $listChucVu = $this->modelTaiKhoan->getAllChucVu();
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }

    public function formSuaTaiKhoan()
    {

        $id = $_GET['id_tai_khoan'];
        $listChucVu = $this->modelTaiKhoan->getAllChucVu();
        $taiKhoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        $chuc_vu_id = $taiKhoan['chuc_vu_id'];
        if ($taiKhoan) {
            if($chuc_vu_id==2){
                $chucvu = 'quản trị viên.';
            }else{
                $chucvu = 'khách hàng.';
            }

            $view = 'taikhoan/edit';
            require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        } else {

            if($chuc_vu_id==2){
                $chucVu = 'quantrivien';
            }else{
                $chucVu = 'khachhang';
            }

            header('Location: ' . BASE_URL_ADMIN . '?act=list'.$chucVu);
            exit();
        }
    }
   
    public function postSuaTaiKhoan()
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
           
            $trang_thai = $_POST['trang_thai'] ?? null;

            $taiKhoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
            $chuc_vu_id = $taiKhoan['chuc_vu_id'] ?? null;
            
            $anh_dai_dien = $_FILES['anh_dai_dien'];
            $file_thumb = '';
            // Lấy thông tin sản phẩm hiện tại từ cơ sở dữ liệu
           
            $file=$taiKhoan['anh_dai_dien'];
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
            // if (empty($gioi_tinh)) {
            //     $errors['gioi_tinh'] = 'Giới tính không được để trống';
            // }
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
                $this->modelTaiKhoan->updateTaiKhoan($id,$ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu_id, $trang_thai, $file_thumb);
                if($chuc_vu_id==2){
                    $chucVu = 'quantrivien';
                }else{
                    $chucVu = 'khachhang';
                }
    
                header('Location: ' . BASE_URL_ADMIN .'?act='.$chucVu);
                exit();
            } else {
                // Nếu có lỗi, render lại form với thông tin sản phẩm và thông báo lỗi
                $listChucVu = $this->modelTaiKhoan->getAllChucVu();
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
                $view = 'taikhoan/edit';
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
                
            }
        }
    }
    public function postCapNhatAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $admin=$_SESSION['admin'];
            $id = $admin['id'];
           
            $ho_ten = $_POST['ho_ten'] ?? null;
            $ngay_sinh = $_POST['ngay_sinh'] ?? null;
            $email = $_POST['email'] ?? null;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $dia_chi = $_POST['dia_chi'] ?? null;
            $mat_khau = $_POST['mat_khau'] ?? null;
            $trang_thai=$admin['trang_thai'];

            $taiKhoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
            $chuc_vu_id = $admin['chuc_vu_id'] ?? null;
            
            $anh_dai_dien = $_FILES['anh_dai_dien'];
            $file_thumb = '';
            // Lấy thông tin sản phẩm hiện tại từ cơ sở dữ liệu
           
            $file=$taiKhoan['anh_dai_dien'];
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
            // if (empty($gioi_tinh)) {
            //     $errors['gioi_tinh'] = 'Giới tính không được để trống';
            // }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ không được để trống';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu không được bỏ trông';
            }
            

            // Nếu không có lỗi, cập nhật sản phẩm và chuyển hướng về danh sách sản phẩm
            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan($id,$ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu_id, $trang_thai, $file_thumb);
                $_SESSION['thongbao'] = [
                    'message' => "Cập nhật thông tin thành công.",
                    'type' => "success"
                ];
    
                header('Location: ' . BASE_URL_ADMIN .'?act=chitiet-quantrivien');
                exit();
            } else {
                
                $listChucVu = $this->modelTaiKhoan->getAllChucVu();
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
                $view = 'taikhoan/edit';
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
                
            }
        }
    }



    public function deleteTaiKhoan()
    {
        $id = $_GET['id_tai_khoan'];
        $taiKhoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        $chuc_vu_id = $taiKhoan['chuc_vu_id'];
        if ($taiKhoan) {
            $this->modelTaiKhoan->deleteTaiKhoan($id);
        }
        if($chuc_vu_id==2){
            $chucVu = 'quantrivien';
        }else{
            $chucVu = 'khachhang';
        }

        header('Location: ' . BASE_URL_ADMIN . '?act='.$chucVu);
        exit();
    }
}
