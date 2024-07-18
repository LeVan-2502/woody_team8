<?php
class AdminDanhMucController
{
    public $adminModelDanhMuc;
    public function __construct()
    {
        $this->adminModelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc()
    {
        $view = 'danhmuc/index';
        $listDanhMuc = $this->adminModelDanhMuc->getAllDanhMuc();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function formThemDanhMuc()
    {
        $view = 'danhmuc/add';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function postThemDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Tên danh mục không được để trống';
            }
            if (empty($errors)) {
                $this->adminModelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header('Location: ' . BASE_URL_ADMIN . '?act=danhmuc');
                exit();
            } else {
                $view = 'danhmuc/add';
                require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
        
    }
    public function formSuaDanhMuc()
    {

        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->adminModelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            $view = 'danhmuc/edit';
            require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        } else {
            header('Location:' . BASE_URL_ADMIN . '?act=danhmuc');
            exit();
        }
    }
    public function postSuaDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Tên danh mục không được để trống';
            }
            if (empty($errors)) {
                $this->adminModelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header('Location: ' . BASE_URL_ADMIN . '?act=danhmuc');
                exit();
            } else {
                $view = 'danhmuc/edit';
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }


    public function deleteDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->adminModelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            $this->adminModelDanhMuc->deleteDanhMuc($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=danhmuc');
        exit();
    }
}
