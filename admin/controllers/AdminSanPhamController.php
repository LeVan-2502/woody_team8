<?php
class AdminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachSanPham()
    {
        $view = 'sanpham/index';
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function danhSachHetSanPham()
    {
        $view = 'sanpham/hethang';
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        $listSanPham = $this->modelSanPham->getAllSanPhamHetHang();

        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function formThemSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $view = 'sanpham/add';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function locSanPham()
    {
        $danhMucId = isset($_POST['danh_muc_id']) ? $_POST['danh_muc_id'] : '';
        if ($danhMucId) {
            $listSanPham = $this->modelSanPham->getAllSanPhamByDanhMuc($danhMucId);
        } else {
            $listSanPham = $this->modelSanPham->getAllSanPham();
        }
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        // Truyền dữ liệu đến view
        $view = 'sanpham/index';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }

    public function postThemSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten_san_pham = $_POST['ten_san_pham'] ?? null;
            $gia_san_pham = $_POST['gia_san_pham'] ?? null;
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? null;
            $so_luong = $_POST['so_luong'] ?? null;
            $ngay_nhap = $_POST['ngay_nhap'] ?? null;
            $danh_muc_id = $_POST['danh_muc_id'] ?? null;
            $trang_thai = $_POST['trang_thai'] ?? null;
            $mo_ta = $_POST['mo_ta'] ?? null;

            $hinh_anh = $_FILES['hinh_anh'];
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Loại danh mục không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả không được để trống';
            }

            if (empty($errors)) {
                $san_pham_id = $this->modelSanPham->insertSanPham(
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $file_thumb
                );
                $img_array = $_FILES['img_array'] ?? null;

                if (!empty($img_array['name'][0])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key],
                        ];

                        // Gỡ lỗi biến $file

                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumSanPham($san_pham_id, $link_hinh_anh);
                    }
                }


                header('Location: ' . BASE_URL_ADMIN . '?act=sanpham');
                exit();
            } else {
                $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
                $view = 'sanpham/add'; // Sửa tên view đúng cú pháp
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }

    public function formSuaSanPham()
    {

        $id = $_GET['id_san_pham'];
        $listAnh = $this->modelSanPham->getListAnhSanPham($id);

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        if ($sanPham) {
            $view = 'sanpham/update';
            require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        } else {
            header('Location:' . BASE_URL_ADMIN . '?act=sanpham');
            exit();
        }
    }
    public function postSuaSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];


            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $danh_muc_id = $_POST['danh_muc_id'];

            if($so_luong==1){
                $trang_thai =0; 
            }else{
                $trang_thai =1; 
            }
            
            $mo_ta = $_POST['mo_ta'];

            $hinh_anh = $_FILES['hinh_anh'];
            $file_thumb = '';

            // Lấy thông tin sản phẩm hiện tại từ cơ sở dữ liệu
            $sanPhamHienTai = $this->modelSanPham->getDetailSanPham($id);
            $file = $sanPhamHienTai['hinh_anh'];

            // Xử lý upload file mới
            if ($hinh_anh['error'] == UPLOAD_ERR_OK) {
                // Upload file mới và lấy tên file mới
                $file_thumb = uploadFile($hinh_anh, './uploads/');
                // Xóa file cũ nếu tồn tại
                if (!empty($file)) {
                    deleteFile($file);
                }
            } else {
                // Nếu không có tệp mới tải lên, giữ lại tên tệp hiện tại
                $file_thumb = $file;
            }

            // Kiểm tra lỗi
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Loại danh mục không được để trống';
            }
            
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả không được để trống';
            }

            // Nếu không có lỗi, cập nhật sản phẩm và chuyển hướng về danh sách sản phẩm
            if (empty($errors)) {
                $this->modelSanPham->updateSanPham(
                    $id,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $file_thumb
                );
                header('Location: ' . BASE_URL_ADMIN . '?act=sanpham');
                exit();
            } else {
                // Nếu có lỗi, render lại form với thông tin sản phẩm và thông báo lỗi
                $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
                $sanPham = [
                    'id' => $id,
                    'ten_san_pham' => $ten_san_pham,
                    'gia_san_pham' => $gia_san_pham,
                    'gia_khuyen_mai' => $gia_khuyen_mai,
                    'so_luong' => $so_luong,
                    'ngay_nhap' => $ngay_nhap,
                    'danh_muc_id' => $danh_muc_id,
                    'trang_thai' => $trang_thai,
                    'mo_ta' => $mo_ta,
                    'hinh_anh' => $file_thumb,
                ];
                $view = 'sanpham/update';
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }




    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];
        $danhMuc = $this->modelSanPham->getDetailSanPham($id);
        if ($danhMuc) {
            $this->modelSanPham->deleteSanPham($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=sanpham');
        exit();
    }
    public function formAlbumSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            // Lấy danh sách ảnh hiện tại của sản phẩm
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

            // Xử lý các ảnh được gửi từ form
            $img_array = $_FILES['img_array'] ?? null;

            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            // Khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cũ
            $upload_file = [];

            // Upload ảnh mới hoặc thay thế ảnh cũ
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }

            // Lưu ảnh mới vào db và xóa ảnh cũ nếu có
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

                    // Cập nhật ảnh cũ
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

                    // Xóa ảnh cũ
                    deleteFile($old_file);
                } else {
                    // Thêm ảnh mới
                    $this->modelSanPham->insertAlbumSanPham($san_pham_id, $file_info['file']);
                }
            }

            // Xóa các ảnh đã chọn từ danh sách hiện tại
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                // Xóa ảnh trong db
                if (in_array($anh_id, $img_delete)) {
                    $this->modelSanPham->destroyAnhSanPham($anh_id);

                    // Xóa file
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }

            // Chuyển hướng sau khi hoàn thành
            header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-sanpham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }
}
