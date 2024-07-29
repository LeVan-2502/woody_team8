<?php
class AdminBaiVietController
{
    public $modelBaiViet;
    public function __construct()
    {
        $this->modelBaiViet = new AdminBaiViet();
    }
    public function danhSachBaiViet()
    {
        $view = 'baiviet/index';
        $listBaiViet = $this->modelBaiViet->getAllBaiViet();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        unset($_SESSION['errors']);
    }

    public function formThemBaiViet()
    {
        $listDanhMuc = $this->modelBaiViet->getAllDanhMuc();
        $listTag = $this->modelBaiViet->getAllTag();
        $view = 'baiviet/add';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function showBaiViet()
    {
        require_once  './views/baiviet/show.php';
    }
    public function postThemBaiViet()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (isset($_SESSION['admin'])) {
                $admin = $_SESSION['admin'];
            } else {
                // Nếu không có admin trong session, có thể chuyển hướng đến trang đăng nhập hoặc thông báo lỗi.
                header('Location: login.php');
                exit();
            }

            // Lấy dữ liệu từ form
            $tieu_de = $_POST['tieu_de'] ?? null;
            $ngay_dang = $_POST['ngay_dang'] ?? null;
            $danh_muc_id = $_POST['danh_muc_id'] ?? null;
            $luot_xem = $_POST['luot_xem'] ?? 0;
            $luot_binh_luan = $_POST['luot_binh_luan'] ?? 0;
            $noi_dung = $_POST['noi_dung'] ?? null; // Dữ liệu từ TinyMCE
            $tai_khoan_id = $admin['id'];
            $tags = $_POST['tag_id'] ?? [];
            $hinh_anh = $_FILES['hinh_anh'];
            $file_thumb = uploadFile($hinh_anh, './uploads/baiviets/');

            // Xử lý lỗi
            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Tiêu đề không được để trống';
            }
            if (empty($ngay_dang)) {
                $errors['ngay_dang'] = 'Ngày đăng không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục không được để trống';
            }
            if (!is_numeric($luot_xem)) {
                $errors['luot_xem'] = 'Lượt xem phải là số';
            }
            if (!is_numeric($luot_binh_luan)) {
                $errors['luot_binh_luan'] = 'Lượt bình luận phải là số';
            }

            $_SESSION['errors'] = $errors;

            // Nếu không có lỗi, lưu bài viết vào cơ sở dữ liệu
            if (empty($errors)) {
                $this->modelBaiViet->insertBaiViet(
                    $tieu_de,
                    $noi_dung, // Dữ liệu HTML thô từ TinyMCE
                    $ngay_dang,
                    $tai_khoan_id,
                    $danh_muc_id,
                    $file_thumb,
                    $luot_xem,
                    $luot_binh_luan
                );
                $bai_viet_id = $this->modelBaiViet->getBaiVietIDLast();

                // Gán các tag cho bài viết
                foreach ($tags as $tag_id) {
                    $this->modelBaiViet->insertTagBaiViet($bai_viet_id, $tag_id);
                }

                // Chuyển hướng đến trang quản lý bài viết
                header('Location: ' . BASE_URL_ADMIN . '?act=baiviet');
                exit();
            } else {
                // Nếu có lỗi, quay lại trang thêm bài viết
                $view = 'baiviet/add'; // Sửa tên view đúng cú pháp

                $listDanhMuc = $this->modelBaiViet->getAllDanhMuc();
                $listTag = $this->modelBaiViet->getAllTag();
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }

    public function formSuaBaiViet()
    {

        $id = $_GET['id_bai_viet'];
        $listDanhMuc = $this->modelBaiViet->getAllDanhMuc();
        $listTag = $this->modelBaiViet->getAllTag();

        $baiViet = $this->modelBaiViet->getDetailBaiViet($id);
        if ($baiViet) {
            $view = 'baiviet/edit';
            require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        } else {
            header('Location:' . BASE_URL_ADMIN . '?act=baiviet');
            exit();
        }
    }

    public function postSuaBaiViet()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_SESSION['admin'])) {
                $admin = $_SESSION['admin'];
            } else {
                // Nếu không có admin trong session, có thể chuyển hướng đến trang đăng nhập hoặc thông báo lỗi.
                header('Location: login.php');
                exit();
            }

            $id = $_POST['id'];
            

            $tieu_de = $_POST['tieu_de'] ?? null;
            $ngay_dang = $_POST['ngay_dang'] ?? null;
            $danh_muc_id = $_POST['danh_muc_id'] ?? null;
            $luot_xem = $_POST['luot_xem'] ?? 0;
            $luot_binh_luan = $_POST['luot_binh_luan'] ?? 0;
            $noi_dung = $_POST['noi_dung'] ?? null; // Dữ liệu từ TinyMCE
            $tai_khoan_id = $admin['id'];
            $tags = $_POST['tag_id'] ?? [];

            $hinh_anh = $_FILES['hinh_anh'];
            $file_thumb = '';
            // Lấy thông tin sản phẩm hiện tại từ cơ sở dữ liệu
            $quanTriVien = $this->modelBaiViet->getDetailBaiViet($id);
            $file = $quanTriVien['hinh_anh'];
            // Xử lý upload file mới
            if ($hinh_anh['error'] == UPLOAD_ERR_OK) {
                // Upload file mới và lấy tên file mới
                $file_thumb = uploadFile($hinh_anh, './uploads/baiviets/');
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
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Tiêu đề không được để trống';
            }
            if (empty($ngay_dang)) {
                $errors['ngay_dang'] = 'Ngày đăng không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục không được để trống';
            }
            if (!is_numeric($luot_xem)) {
                $errors['luot_xem'] = 'Lượt xem phải là số';
            }
            if (!is_numeric($luot_binh_luan)) {
                $errors['luot_binh_luan'] = 'Lượt bình luận phải là số';
            }

            $_SESSION['errors'] = $errors;


            // Nếu không có lỗi, cập nhật sản phẩm và chuyển hướng về danh sách sản phẩm
            if (empty($errors)) {

                $this->modelBaiViet->updateBaiViet($id, $tieu_de, $noi_dung, $ngay_dang, $tai_khoan_id, $danh_muc_id, $file_thumb);
                $this->modelBaiViet->deleteTagBaiViet($id);
                foreach ($tags as $tag_id) {
                    $this->modelBaiViet->insertTagBaiViet($id, $tag_id);
                }
                header('Location: ' . BASE_URL_ADMIN . '?act=baiviet');
                exit();
            } else {
                // Nếu có lỗi, render lại form với thông tin sản phẩm và thông báo lỗi
                $listDanhMuc = $this->modelBaiViet->getAllDanhMuc();
                $listTag = $this->modelBaiViet->getAllTag();
                $sanPham = [
                    'id' => $id,
                    'tieu_de' => $tieu_de,
                    'noi_dung' => $noi_dung,
                    'ngay_dang' => $ngay_dang,
                    'tai_khoan_id' => $tai_khoan_id,
                    'danh_muc_id' => $danh_muc_id,
                    'anh_dai_dien' => $file_thumb,
                ];
                $view = 'baiviet/edit';
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }



    public function deleteBaiViet()
    {
        $id = $_GET['id_bai_viet'];
        $qtv = $this->modelBaiViet->getDetailBaiViet($id);
        if ($qtv) {
            $this->modelBaiViet->deleteBaiViet($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=baiviet');
        exit();
    }
}
