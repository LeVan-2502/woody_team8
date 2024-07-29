<?php
class AdminLienHeController
{
    public $adminModelLienHe;
    public function __construct()
    {
        $this->adminModelLienHe = new AdminLienHe();
    }
    public function danhSachLienHe()
    {
        $view = 'lienhe/index';
        $listLienHe = $this->adminModelLienHe->getAllLienHe();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
}