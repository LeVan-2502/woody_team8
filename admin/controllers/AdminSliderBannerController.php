
<?php
class AdminSliderBannerController
{
    public $modelSLiderBanner;
    public function __construct()
    {
        $this->modelSLiderBanner = new AdminSliderBanner();
       
    }
    public function danhSachSlider()
    {
        $anh_he_thong = 'Slider';
        $view = 'sliderbanner/index';
        $listAnh = $this->modelSLiderBanner->getAllSlider();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    public function danhSachBanner()
    {
        $anh_he_thong = 'Banner';
        $view = 'sliderbanner/index';
        $listAnh = $this->modelSLiderBanner->getAllBanner();
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    
    public function formThemSliderBanner()
    {
        $view = 'sliderbanner/add';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        unset($_SESSION['errors']);
    }
    public function showSliderBanner()
    {
        require_once  './views/sliderbanner/show.php';
    }
    public function postThemSliderBanner()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $tieu_de = $_POST['tieu_de'] ?? null;
            $trang_thai = $_POST['trang_thai'] ?? null;
            $type = $_POST['type'] ?? null;
            $thu_tu_xuat_hien = $_POST['thu_tu_xuat_hien'] ?? null;

            $hinh_anh = $_FILES['hinh_anh'];
            $file_thumb = uploadFile($hinh_anh, './uploads/slidersbanners/');

            $_SESSION['errors']=[];
            if (empty($tieu_de)) {
                $_SESSION['errors']['tieu_de'] = 'Tiêu đề không được để trống';
            }
            if (empty($type)) {
                $_SESSION['errors']['type'] = 'Loại hình ảnh không được để trống';
            }
            if (empty($thu_tu_xuat_hien)) {
                $_SESSION['errors']['thu_tu_xuat_hien'] = 'Thứ tự xuất hiện không được để trống';
            }
            if (empty($trang_thai)) {
                $_SESSION['errors']['trang_thai'] = 'Trạng thái không được để trống';
            }
            if (empty($hinh_anh)) {
                $_SESSION['errors']['hinh_anh'] = 'Trạng thái không được để trống';
            }
            


            if (empty($_SESSION['errors'])) {
                $this->modelSLiderBanner->insertSliderBanner(
                    $tieu_de, $trang_thai, $type, $thu_tu_xuat_hien, $file_thumb
                );
                if($type==1){
                    $tenType = 'slider';
                }else{
                    $tenType = 'banner';
                }

                header('Location: ' . BASE_URL_ADMIN . '?act=list'.$tenType);
                exit();
            } else {
                
                $view = 'sliderbanner/add'; // Sửa tên view đúng cú pháp
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            }
        }
    }

    public function formSuaSliderBanner()
    {

        $id = $_GET['id_slider_banner'];
       
        $listAnh = $this->modelSLiderBanner->getDetailSliderBanner($id);
        if ($listAnh) {
            $view = 'sliderbanner/edit';
            require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
        } else {
            header('Location:' . BASE_URL_ADMIN . '?act=silderbanner');
            exit();
        }
        unset($_SESSION['errors']);
    }
   
    public function postSuaSliderBanner()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];

            $tieu_de = $_POST['tieu_de'] ?? null;
            $trang_thai = $_POST['trang_thai'] ?? null;
            $type = $_POST['type'] ?? null;
            $thu_tu_xuat_hien = $_POST['thu_tu_xuat_hien'] ?? null;

            
            $hinh_anh = $_FILES['hinh_anh'];
            $file_thumb = '';
            // Lấy thông tin sản phẩm hiện tại từ cơ sở dữ liệu
            $itemSliderBanner = $this->modelSLiderBanner->getDetailSliderBanner($id);
            $file=$itemSliderBanner['hinh_anh'];
            // Xử lý upload file mới
            if ($hinh_anh['error'] == UPLOAD_ERR_OK) {
                // Upload file mới và lấy tên file mới
                $file_thumb = uploadFile($hinh_anh, './uploads/slidersbanners/'); 
                // Xóa file cũ nếu tồn tại
                if (!empty($file)) {
                    deleteFile($file);
                }
            } else {
                // Nếu không có tệp mới tải lên, giữ lại tên tệp hiện tại
                $file_thumb = $file;
            }

            //Kiểm tra lỗi
            $_SESSION['errors']=[];
            if (empty($tieu_de)) {
                $_SESSION['errors']['tieu_de'] = 'Tiêu đề không được để trống';
            }
            if (empty($type)) {
                $_SESSION['errors']['type'] = 'Loại hình ảnh không được để trống';
            }
            if (empty($thu_tu_xuat_hien)) {
                $_SESSION['errors']['thu_tu_xuat_hien'] = 'Thứ tự xuất hiện không được để trống';
            }
            if (empty($trang_thai)) {
                $_SESSION['errors']['trang_thai'] = 'Trạng thái không được để trống';
            }
            if (empty($hinh_anh)) {
                $_SESSION['errors']['hinh_anh'] = 'Trạng thái không được để trống';
            }
            


            // Nếu không có lỗi, cập nhật sản phẩm và chuyển hướng về danh sách sản phẩm
            if (empty($_SESSION['errors'])) {
                $this->modelSLiderBanner->updateSliderBanner($id,$tieu_de, $trang_thai, $type, $thu_tu_xuat_hien, $file_thumb);

                if($type==1){
                    $tenType = 'slider';
                }else{
                    $tenType = 'banner';
                }

                 header('Location: ' . BASE_URL_ADMIN . '?act=list'.$tenType);
                exit();
            } else {
                // Nếu có lỗi, render lại form với thông tin sản phẩm và thông báo lỗi
                $listAnh = [
                    'id' => $id,
                    'tieu_de' => $tieu_de,
                    'trang_thai' => $trang_thai,
                    'type' => $type,
                    'thu_tu_xuat_hien' => $thu_tu_xuat_hien,
                    'hinh_anh' => $file_thumb,
                ];
                $view = 'sliderbanner/edit';
                require_once PATH_VIEW_ADMIN . 'layouts/master.php';
                
            }
        }
    }



    public function deleteSliderBanner()
    {
        $id = $_GET['id_tai_khoan'];
        $qtv = $this->modelSLiderBanner->getDetailSliderBanner($id);
        if ($qtv) {
            $this->modelSLiderBanner->deleteSliderBanner($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=quantrivien');
        exit();
    }
}
