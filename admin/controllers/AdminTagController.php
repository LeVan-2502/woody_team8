<?php
class AdminTagController
{
    public $adminModelTag;
    public function __construct()
    {
        $this->adminModelTag = new AdminTag();
    }
    public function danhSachTag()
    {
        $view = 'tag/index';
        $listTag = $this->adminModelTag->getAllTag();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        unset($_SESSION['errors']);
    }
    public function formThemTag()
    {
        $view = 'tag/add';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function postThemTag()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten_tag = $_POST['ten_tag'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_tag)) {
                $errors['ten_tag'] = 'Tên tag không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả không được để trống';
            }
            $_SESSION['errors']=$errors;

            if (empty($errors)) {
                $this->adminModelTag->insertTag($ten_tag, $mo_ta);
                header('Location: ' . BASE_URL_ADMIN . '?act=tag');
                exit();
            } else {
                $view = 'tag/add';
                require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
               
            }
        }
        
    }
    public function formSuaTag()
    {

        $id = $_GET['id_tag'];
        $Tag = $this->adminModelTag->getDetailTag($id);
        if ($Tag) {
            $view = 'tag/edit';
            require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        } else {
            header('Location:' . BASE_URL_ADMIN . '?act=tag');
            exit();
        }
    }
    public function postSuaTag()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'];
            $ten_tag = $_POST['ten_tag'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_tag)) {
                $errors['ten_tag'] = 'Tên danh mục không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Tên danh mục không được để trống';
            }

            $_SESSION['errors']= $errors;
            if (empty($errors)) {
                $this->adminModelTag->updateTag($id, $ten_tag, $mo_ta);
                header('Location: ' . BASE_URL_ADMIN . '?act=tag');
                exit();
            } else {
                $view = 'tag/edit';
                $Tag = ['id' => $id, 'ten_tag' => $ten_tag, 'mo_ta' => $mo_ta];
                require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }


    public function deleteTag()
    {
        $id = $_GET['id_tag'];
        $Tag = $this->adminModelTag->getDetailTag($id);
        if ($Tag) {
            $this->adminModelTag->deleteTag($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=tag');
        exit();
    }
}
