<?php

class GioHangController
{
    public $modelGioHang;
    public $modelChiTietGioHang;
    public function __construct()
    {
        $this->modelGioHang = new GioHang();
    }

    public function themGioHang()
    {
        // Kiểm tra xem có sản phẩm với id kia không
        $san_pham_id = $_GET['san_pham_id'] ?? null; // Gán giá trị mặc định là null nếu không có
        $so_luong = $_GET['so_luong'] ?? 1; // Gán mặc định số lượng là 1 nếu không có giá trị

        // Kiểm tra id sản phẩm
        // if (!$san_pham_id) {
        //     echo 'Sản phẩm không được chỉ định.';
        //     return; // Kết thúc hàm nếu không có sản phẩm ID
        // }

        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $sanpham = $this->modelGioHang->showOneSanPham($san_pham_id);

        if (empty($sanpham)) {
            echo '404 Not Found';
            return; // Kết thúc hàm nếu sản phẩm không tồn tại
        }


        $cartItem =  $this->modelGioHang->getCartByUserID($_SESSION['admin']['id']);

        $gio_hang_id = $cartItem['id'];
       

        // Lấy ID giỏ hàng của người dùng

        $_SESSION['gio_hang_id'] = $gio_hang_id;
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (!isset($_SESSION['cart'][$san_pham_id])) {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm vào giỏ
            $_SESSION['cart'][$san_pham_id] = $sanpham;
            $_SESSION['cart'][$san_pham_id]['so_luong'] = $so_luong;

            // Thêm sản phẩm vào cơ sở dữ liệu
            $this->modelGioHang->insertCartItem($gio_hang_id, $san_pham_id, $so_luong);
        } else {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
            $qty = $_SESSION['cart'][$san_pham_id]['so_luong'] += $so_luong;
            $this->modelGioHang->updateSoLuongSanPhamGioHang($gio_hang_id, $san_pham_id, $qty);
        }
        
        // Cập nhật số lượng sản phẩm trong cơ sở dữ liệu
        header('Location:' . BASE_URL . '?act=list-giohang');

        exit(); // Kết thúc script để đảm bảo chuyển hướng hoạt động đúng
    }


    public function xacthuc()
    {

        require_once './views/nguoidung/home.php';
    }
    public function listGioHang()
    {
       
        $id = $this->modelGioHang->getCartID($_SESSION['admin']['id']);
        $listSPGioHang = $_SESSION['cart'] ?? [];
        
        $countSP = count($listSPGioHang);
        require_once './views/giohang/listgiohang.php';
    }

    public function xoaGioHang()
    {
        
        $san_pham_id = $_GET['san_pham_id'];

        $sanpham = $this->modelGioHang->showOneSanPham($san_pham_id);
        if (empty($sanpham)) {
            debug('404 Not Found');
        }
        // Xóa bản ghi trong ssesion và chitietdonhang

        if (isset($_SESSION['cart'][$san_pham_id])) {
            unset($_SESSION['cart'][$san_pham_id]);
        }
        $this->modelGioHang->deleteSanPhamGioHang($_SESSION['gio_hang_id'], $san_pham_id);
        header('Location:' . BASE_URL . '?act=list-giohang');
        exit();
    }
    public function capNhatGioHang()
{
    if (isset($_POST['update_cart'])) {
        $ids = $_POST['id'];
        $quantities = $_POST['so_luong'];
   
        for ($i = 0; $i < count($ids); $i++) {
            $id = $ids[$i];
            $so_luong = $quantities[$i];

            // Cập nhật số lượng trong SESSION
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['so_luong'] = $so_luong;
            }
            // Cập nhật số lượng trong CSDL
            $this->modelGioHang->capNhatSanPhamGioHang($id, $so_luong);
        }

        // Điều hướng người dùng trở lại trang giỏ hàng
        header('Location: ' . BASE_URL . '?act=list-giohang');
        exit();
    }
}
    public function formCheckoutGioHang()

    {   
        if (isset($_SESSION['admin']) && isset($_SESSION['admin']['id'])) {
            $tai_khoan_id = $_SESSION['admin']['id'];
        } else {
            $tai_khoan_id = null;
        }
        $to_tal=$_SESSION['to_tal'];
        $listPhuongThuc = $this->modelGioHang->getAllPhuongThuc();
        $id = $this->modelGioHang->getCartID($_SESSION['admin']['id']);
        $listSPGioHang = $_SESSION['cart'];
        require_once './views/giohang/checkout.php';
        unset($_SESSION['errors']);
        
    }

   
    public function checkoutSuccess()
{
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ POST request và kiểm tra tính hợp lệ
        $tai_khoan_id = $_SESSION['admin']['id'];
        $tong_tien = $_POST['tong_tien'] ?? null;
        $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? null;
        $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? null;
        $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? null;
        $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? null;
        $ngay_dat = $_POST['ngay_dat'] ?? null;
        $ghi_chu = $_POST['ghi_chu'] ?? null;
        $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'] ?? null;
        $trang_thai_id = 1; // Mặc định trạng thái đơn hàng là 1 (đã xử lý)

        // Kiểm tra và xác thực dữ liệu
        if (isset($_SESSION['admin']) && isset($_SESSION['admin']['id'])) {
            $tai_khoan_id = $_SESSION['admin']['id'];
        } else {
            $tai_khoan_id = null;
        }
        $errors = [];
        if (empty($ten_nguoi_nhan)) {
            $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
        }
        if (empty($email_nguoi_nhan) || !filter_var($email_nguoi_nhan, FILTER_VALIDATE_EMAIL)) {
            $errors['email_nguoi_nhan'] = 'Email người nhận không hợp lệ';
        }
        if (empty($sdt_nguoi_nhan) || !preg_match('/^\d{10,11}$/', $sdt_nguoi_nhan)) {
            $errors['sdt_nguoi_nhan'] = 'Số điện thoại không hợp lệ';
        }
        if (empty($dia_chi_nguoi_nhan)) {
            $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ không được để trống';
        }
        if (empty($ngay_dat) || !DateTime::createFromFormat('Y-m-d', $ngay_dat)) {
            $errors['ngay_dat'] = 'Ngày đặt không hợp lệ';
        }
        
        if (empty($phuong_thuc_thanh_toan_id)) {
            $errors['phuong_thuc_thanh_toan_id'] = 'Phương thức thanh toán không được để trống';
        }
        $_SESSION['errors'] = $errors;

        if (!empty($errors)) {
           
            // Trả lại thông báo lỗi cho người dùng
            header('Location: ' . BASE_URL . '?act=checkout-giohang');
            exit();
        }

        // Thực hiện chèn đơn hàng vào cơ sở dữ liệu
        $donHangId = $this->modelGioHang->insertDonHang(
            $tai_khoan_id,
            $ten_nguoi_nhan,
            $email_nguoi_nhan,
            $sdt_nguoi_nhan,
            $dia_chi_nguoi_nhan,
            $ngay_dat,
            $tong_tien,
            $ghi_chu,
            $phuong_thuc_thanh_toan_id,
            $trang_thai_id
        );

        // Thực hiện chèn chi tiết đơn hàng
        $gioHang = $_SESSION['cart'] ?? [];
        foreach ($gioHang as $item) {
            $sanPhamId = $item['id'];
            $soLuong = $item['so_luong'];
            $donGia = $item['gia_san_pham'];
            $thanhTien = $soLuong * $donGia;

            $this->modelGioHang->insertChiTietDonHang(
                $donHangId,
                $sanPhamId,
                $donGia,
                $soLuong,
                $thanhTien
            );
        }

        // Xóa giỏ hàng sau khi chèn đơn hàng thành công
        unset($_SESSION['cart']);
        unset($_SESSION['errors']); // Xóa thông báo lỗi nếu có

        // Chuyển hướng đến trang tài khoản người dùng sau khi chèn đơn hàng thành công
        header('Location: ' . BASE_URL . '?act=myaccount');
        exit();
    }
}


    function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
}
