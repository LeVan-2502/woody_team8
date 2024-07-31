<?php
class AdminDashboardController{
    public $adminModelDashBoard;
    public function __construct()
    {
        $this->adminModelDashBoard = new AdminDashBoard();
    }
    function doanhThuDashBoard() {

        $listSanPham = $this->adminModelDashBoard->getAllSanPhamDoanhThu();
        $listDoanhThuDanhMuc = $this->adminModelDashBoard->getAllDanhMucDoanhThu();
        $doanhThuNgay = $this->adminModelDashBoard->getDoanhThuNgay();
   
        $doanhThuTuan = $this->adminModelDashBoard->getDoanhThuTuan();
        $doanhThuThang = $this->adminModelDashBoard->getDoanhThuThang();
        $tongDoanhThu = $this->adminModelDashBoard->getTongDoanhThu();

        $categories = [];
        $totals = [];
    
        if (!empty($listDoanhThuDanhMuc)) {
            foreach ($listDoanhThuDanhMuc as $row) {
                $categories[] = $row['ten_danh_muc'];
                $totals[] = $row['tong_doanh_thu'];
            }
        }
    
        $view = 'dashboard/doanhthu';
        $script = 'dashboard';
        require_once  PATH_VIEW_ADMIN . 'layouts/dashboard.php';
    }
   
    
}